<?php return [
    'admin_settings' => [
        'title' => [
            'admin_header' => 'Системные настройки',
            'system' => 'Система',
            'authorization' => 'Авторизация',
            'databases' => 'Базы данных',
            'what_is_this' => 'Что это?',
            'default_db' => 'БД по умолчанию',
            'debug' => 'Дебаг',
            'connections_dbs' => 'Подключения и БД',
            'connections' => 'Подключения',
            'in_short' => 'Короче',
            'dbs' => 'БД',
            'language' => 'Язык',
            'mail_server' => 'Почтовый сервер',
            'profile' => 'Профиль',
            'replenishment' => 'Пополнение',
            'summing_up' => 'Сколько-сколько...',
        ],
        'description' => [
            'system_settings_intro' => 'Рассмотрим, что за системные настройки и с чем их едят.',
            'system_settings_details' => 'В этом пункте вы можете изменить основные настройки движка. Изменение критически важных пунктов влечет существенное влияние, так что меняйте то, в чем точно уверены',
            'authorization_settings' => 'Тут вы можете изменять настройки для авторизации (время сессии и прочее). Думаю с этим все понятно',
            'databases_overview' => 'А вот базы данных мы рассмотрим подробнее',
            'database_principles' => 'Принцип баз данных в движке устроен немного нестандартно, давайте углубимся',
            'default_db_usage' => 'Этот пункт отвечает за БД, которая будет использоваться Flute. Желательно вообще никогда не трогать и не менять этот пункт',
            'debug_mode_info' => 'Этот пункт включает дебаг режим у БД. Рекомендуется использовать только разработчиками',
            'multiple_connections_dbs' => 'Во Flute используется система множества подключений и множества Баз Данных',
            'connections_info' => 'Подключения - это данные к подключению к БД (логин, пароль и пр.), когда сами БД - это данные, служащие для модулей и движка',
            'connections_dbs_summary' => 'Подключение может быть одно (если у вас все в одной БД). А БД может быть много. В общем вы все поймете позже',
            'managing_connections' => 'Этот пункт позволяет как раз манипулировать всеми подключениями во Flute',
            'setting_up_dbs' => 'В этом пункте уже происходит настройка и установка БД, которые используют подключения. Фух, выдохнули и идем дальше...',
            'language_settings' => 'В этом пункте идет выбор языка движка по умолчанию и кеширование переводов',
            'mail_server_settings' => 'В этом пункте вы будете настраивать почтовый сервер для отправки писем (для сброса пароля и пр.)',
            'profile_settings' => 'Тут вы сможете настроить разные параметры для пользователей в профиле. Зайдете и все поймете сами',
            'balance_replenishment_settings' => 'Этот пункт хранит в себе настройки, служащие для пополнения баланса. Будь то отображаемая валюта, или минимальная сумма пополнения.',
            'tour_ending' => 'Не верится, но мы закончили наш экскурс по основным пунктам. Знаю, надо переварить, но я в Вас верю, Вы обязательно справитесь!'
        ]
    ],
    'admin_stats' => [
        'title' => [
            'sidebar' => 'Сайдбар',
            'main_menu' => 'Основное меню',
            'additional_menu' => 'Дополнительное меню',
            'recent_menu' => 'Недавно посетили',
            'sidebar_complete' => 'Сайдбар все',
            'navbar' => 'Навбар',
            'search' => 'Поиск',
            'version' => 'Версия',
            'report_generation' => 'Формирование отчета',
            'final' => 'Вот и все!',
        ],
        'description' => [
            'sidebar' => 'Рассмотрим основную навигационную панель админ-панели. Что-ж, начнем!',
            'main_menu' => 'В этом меню расположены пункты, относящиеся к критически важным системным настройкам',
            'additional_menu' => 'В этом меню расположены пункты модулей и разных компонентов системы. Какой пункт за что отвечает вы разберетесь по ходу использования',
            'recent_menu' => 'В админ-панели снизу так же представлены те страницы, которые вы недавно посетили. Это может быть полезно, если вы часто заходите на одну страницу, и вам лень постоянно искать её.',
            'sidebar_complete' => 'С сайдбаром покончили, перейдем теперь к остальным компонентам',
            'navbar' => 'Рассмотрим верхнюю панель, что и как на ней представлено',
            'search' => 'Это поле ввода позволяет находить необходимые пункты или страницы по ключевым словам. Просто начните писать, и поиск выдаст вам желаемый результат!',
            'version' => 'Тут представлена версия установленного движка. Так же в будущем можно будет обновить движок прямо из админ-панели',
            'report_generation' => 'Эта кнопка позволяет формировать детальный отчет о системе. Если вам необходимо отправить кому-то информацию о системной ошибке, то этот архив должен быть вместе с сообщением',
            'final' => 'Я вам рассказал основные компоненты внутри админ-панели. На разных страницах вас ждут и другие подсказки. Удачи в использовании!'
        ]
    ],
    'home' => [
        'title' => [
            'editor_mode_title' => 'Режим редактирования',
            'editor_title' => 'Заголовок редактируемой страницы',
            'editor_area' => 'Область редактора',
            'editor_toolbar' => 'Инструменты редактора',
            'save_button' => 'Сохранение',
            'editor_course_completed' => 'Курс по редактору закончен',
        ],
        'description' => [
            'editor_mode' => 'В CMS существует режим редактирования каждой страницы, что позволяет делать нам полную кастомизацию.',
            'editor_title' => 'Здесь указано название страницы, которое будет редактироваться',
            'editor_area' => 'Тут можно создавать различные блоки, виджеты и текст, которые будут отображаться в редакторе',
            'editor_toolbar' => 'Слева можно добавлять или изменять уже существующий блок',
            'save_button' => 'После изменения данных, обязательно следует сохранить весь контент, нажав на эту кнопку',
            'editor_course_completed' => 'Это все, что требуется знать для базового понимания в редакторе. Чтобы узнать подробнее, смотрите официальную документацию',
        ],
    ]
];