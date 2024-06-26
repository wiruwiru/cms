<?php

namespace Flute\Core\Modules\Actions;

use Flute\Core\Database\DatabaseConnection;
use Flute\Core\Database\Entities\Module;
use Flute\Core\Modules\Contracts\ModuleActionInterface;
use Flute\Core\Modules\Exceptions\DependencyException;
use Flute\Core\Modules\ModuleDependencies;
use Flute\Core\Modules\ModuleInformation;
use Flute\Core\Modules\ModuleManager;
use Flute\Core\Theme\ThemeManager;

class ModuleInstall implements ModuleActionInterface
{
    protected ModuleManager $moduleManager;
    protected ModuleDependencies $moduleDependencies;

    public function action(ModuleInformation &$module, ?ModuleManager $moduleManager = null): bool
    {
        $this->moduleManager = $moduleManager ?? app(ModuleManager::class);
        $this->moduleDependencies = $this->moduleManager->getModuleDependencies();

        $moduleGet = $this->moduleManager->getModule($module->key);

        $installerClassDir = sprintf('\Flute\\Modules\\%s\\Installer', $module->key);

        $moduleGet = $this->moduleManager->getModule($module->key);

        if (!$moduleGet)
            throw new \Exception("Module {$module->key} wasn't foun in the system");

        if ($moduleGet->status !== 'notinstalled')
            throw new \RuntimeException('Module already installed');

        $this->checkModuleDependencies($moduleGet);

        $directory = sprintf('app/Modules/%s/database/migrations', $module->key);

        if (fs()->exists(BASE_PATH . $directory)) {
            try {
                app(DatabaseConnection::class)->runMigrations($directory);
            } catch (\Exception $e) {
                app(DatabaseConnection::class)->rollbackMigrations($directory);

                throw $e;
            }
        }

        if (class_exists($installerClassDir)) {
            $installer = new $installerClassDir($module->key);

            if (!method_exists($installer, 'install'))
                throw new \RuntimeException("install method into {$installerClassDir} wasn't found");

            $install = $installer->install($module);

            if (!$install)
                return false;
        }

        $this->initDb($module);
        $this->e($module);

        return true;
    }

    protected function checkModuleDependencies(ModuleInformation $module)
    {
        try {
            /** @var ThemeManager $themeManager */
            $themeManager = app(ThemeManager::class);

            $this->moduleDependencies->checkDependencies($module->dependencies, $this->moduleManager->getActive(), $themeManager->getThemeInfo());
        } catch (DependencyException $e) {
            logs('modules')->emergency("Flute module \"" . $module->key . "\" dependency check failed - " . $e->getMessage());
            throw new DependencyException($e->getMessage());
        }
    }

    protected function initDb(ModuleInformation $moduleInformation): void
    {
        $module = rep(Module::class)->findOne([
            "key" => $moduleInformation->key,
        ]);

        $module->status = ModuleManager::DISABLED;
        $module->installedVersion = $moduleInformation->version;

        transaction($module)->run();

        logs('modules')->info("Module {$module->key} was installed in the Flute!");
    }

    protected function e(ModuleInformation $moduleInformation)
    {
        $event = new \Flute\Core\Modules\Events\ModuleInstall($moduleInformation->key, $moduleInformation);

        events()->dispatch($event, \Flute\Core\Modules\Events\ModuleInstall::NAME);
    }
}