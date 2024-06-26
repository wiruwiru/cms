<?php

namespace Flute\Core\Admin\Http\Controllers\Views\Payments;

use Flute\Core\Admin\Http\Middlewares\HasPermissionMiddleware;
use Flute\Core\Database\Entities\PaymentGateway;
use Flute\Core\Database\Entities\PaymentInvoice;
use Flute\Core\Support\AbstractController;
use Flute\Core\Support\FluteRequest;
use Flute\Core\Table\TableColumn;
use Nette\Utils\Strings;
use Omnipay\Common\Helper;
use Symfony\Component\HttpFoundation\Response;

class PaymentsView extends AbstractController
{
    public function __construct()
    {
        HasPermissionMiddleware::permission('admin.gateways');
        $this->middleware(HasPermissionMiddleware::class);
    }

    public function payments()
    {
        $table = table();

        $data = rep(PaymentInvoice::class)->select()->load(['user', 'promoCode'])->fetchAll();

        foreach ($data as $item) {
            $item->user = $item->user->name;

            if ($item->promoCode) {
                $item->promoCode = $item->promoCode->code;
            }
        }

        $table->fromEntity($data);

        return view("Core/Admin/Http/Views/pages/payments/payments", [
            'payments' => $table->render()
        ]);
    }

    public function list(): Response
    {
        $table = table();
        $payments = rep(PaymentGateway::class)->findAll();

        $table->addColumns([
            (new TableColumn('id')),
            (new TableColumn('name', __('def.name')))->setType('text'),
            (new TableColumn('adapter', __('def.id')))->setType('text'),
            (new TableColumn('enabled', __('def.status')))->setRender(
                '{{ RENDER_STATUS }}',
                "function(data, type, full, meta) {
                    let div = make('div');
                    let status = data == 1 ? 'active' : 'disabled';
                    div.classList.add('table-status', status);
                    div.innerHTML = translate(`def.`+status)
                    return div;
                }"
            ),
            (new TableColumn())->setOrderable(false)
        ]);

        $table->addColumnDef([
            "targets" => -1,
            "data" => null,
            "render" => [
                'key' => '{{ PAYMENTS_BUTTONS }}',
                'js' => '
                function(data, type, full, meta) {
                    let status = data[3] == 1 ? "active" : "disabled";
    
                    let btnContainer = make("div");
                    btnContainer.classList.add("payment-action-buttons");

                    let deleteDiv = make("div");
                    deleteDiv.classList.add("action-button", "delete");
                    deleteDiv.setAttribute("data-tooltip", translate("admin.payments.delete"));
                    deleteDiv.setAttribute("data-deletepayment", data[0]);
                    let deleteIcon = make("i");
                    deleteIcon.classList.add("ph-bold", "ph-trash");
                    deleteDiv.appendChild(deleteIcon);
                    btnContainer.appendChild(deleteDiv);

                    let changeDiv = make("a");
                    changeDiv.classList.add("action-button", "change");
                    changeDiv.setAttribute("data-tooltip", translate("admin.payments.change"));
                    changeDiv.setAttribute("href", u(`admin/payments/edit/${data[0]}`));
                    let changeIcon = make("i");
                    changeIcon.classList.add("ph", "ph-pencil");
                    changeDiv.appendChild(changeIcon);
                    btnContainer.appendChild(changeDiv);

                    if (status === "active") {
                        let disableDiv = make("div");
                        disableDiv.classList.add("action-button", "disable");
                        disableDiv.setAttribute("data-tooltip", translate("admin.payments.disable_payment"));
                        disableDiv.setAttribute("data-disablepayment", data[0]);
                        let disableIcon = make("i");
                        disableIcon.classList.add("ph-bold", "ph-power");
                        disableDiv.appendChild(disableIcon);
                        btnContainer.appendChild(disableDiv);
                    }
        
                    // Включить модуль
                    if (status === "disabled") {
                        let activeDiv = make("div");
                        activeDiv.classList.add("action-button", "activate");
                        activeDiv.setAttribute("data-tooltip", translate("admin.payments.enable_payment"));
                        activeDiv.setAttribute("data-activatepayment", data[0]);
                        let activeIcon = make("i");
                        activeIcon.classList.add("ph-bold", "ph-power");
                        activeDiv.appendChild(activeIcon);
                        btnContainer.appendChild(activeDiv);
                    }
    
                    return btnContainer.outerHTML;
                }
                '
            ]
        ]);

        $table->setData($payments);

        return view("Core/Admin/Http/Views/pages/payments/list", [
            "payments" => $table->render()
        ]);
    }

    public function add(FluteRequest $request): Response
    {
        return view("Core/Admin/Http/Views/pages/payments/add", [
            'drivers' => $this->getAllDrivers()
        ]);
    }

    public function edit(FluteRequest $request, string $id): Response
    {
        $payment = $this->getPaymentGateway((int) $id);

        if (!$payment)
            return $this->error(__('admin.payments.not_found'), 404);

        return view("Core/Admin/Http/Views/pages/payments/edit", [
            'gateway' => $payment,
            'additional' => \Nette\Utils\Json::decode($payment->additional),
            'drivers' => $this->getAllDrivers()
        ]);
    }

    protected function getAllDrivers()
    {
        $namespaceMap = app()->getLoader()->getPrefixesPsr4();
        $result = [];

        foreach ($namespaceMap as $namespace => $paths) {
            foreach ($paths as $path) {
                if (strpos($namespace, 'Omnipay\\') !== 0) {
                    // Skip non-Omnipay namespaces
                    continue;
                }

                $fullPath = realpath($path);
                if ($fullPath && is_dir($fullPath)) {
                    // Scan the Omnipay directory for gateway classes
                    $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($fullPath));
                    foreach ($files as $file) {
                        if ($file->isFile() && $file->getExtension() == 'php') {
                            $filename = $file->getFilename();
                            // Check if the file name ends with 'Gateway.php'
                            if (substr($filename, -11) == 'Gateway.php') {
                                $gatewayClassShortName = substr($filename, 0, -4);
                                $gatewayClass = $namespace . $gatewayClassShortName;

                                if (payments()->gatewayExists($gatewayClass) && !Strings::startsWith($gatewayClassShortName, 'Abstract')) {
                                    $gatewayInstance = new $gatewayClass();

                                    if (is_callable([$gatewayInstance, 'getName'])) {
                                        $result[Helper::getGatewayShortName($gatewayClass)] = $gatewayInstance->getName();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $classMap = app()->getLoader()->getClassMap();
        foreach ($classMap as $class => $path) {
            if (substr($path, -11) == 'Gateway.php') {
                if (payments()->gatewayExists($class) && !Strings::contains($class, 'Abstract')) {
                    $gatewayInstance = new $class();

                    if (is_callable([$gatewayInstance, 'getName'])) {
                        $result[Helper::getGatewayShortName($class)] = $gatewayInstance->getName();
                    }
                }
            }
        }

        return $result;
    }

    protected function getPaymentGateway(int $id): ?PaymentGateway
    {
        return rep(PaymentGateway::class)->findByPK($id);
    }
}