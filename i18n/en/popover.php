<?php return [
    'admin_settings' => [
        'title' => [
            'admin_header' => 'System Settings',
            'system' => 'System',
            'authorization' => 'Authorization',
            'databases' => 'Databases',
            'what_is_this' => 'What is this?',
            'default_db' => 'Default DB',
            'debug' => 'Debug',
            'connections_dbs' => 'Connections and DBs',
            'connections' => 'Connections',
            'in_short' => 'In Short',
            'dbs' => 'DBs',
            'language' => 'Language',
            'mail_server' => 'Mail Server',
            'profile' => 'Profile',
            'replenishment' => 'Replenishment',
            'summing_up' => 'Summing Up',
        ],
        'description' => [
            'system_settings_intro' => 'Let\'s consider what system settings are and how to deal with them.',
            'system_settings_details' => 'In this section, you can change the basic engine settings. Changing critical points has a significant impact, so only modify what you are sure about.',
            'authorization_settings' => 'Here you can change settings for authorization (session time and more). I think it\'s clear enough.',
            'databases_overview' => 'Now let\'s take a closer look at databases.',
            'database_principles' => 'The principle of databases in the engine is arranged somewhat non-standard, let\'s delve deeper.',
            'default_db_usage' => 'This section is responsible for the DB that Flute will use. It\'s advisable never to touch or change this section at all.',
            'debug_mode_info' => 'This section enables debug mode for the DB. It is recommended to be used only by developers.',
            'multiple_connections_dbs' => 'Flute uses a system of multiple connections and multiple databases.',
            'connections_info' => 'Connections are the data to connect to the DB (login, password, etc.), while the databases themselves are the data used for modules and the engine.',
            'connections_dbs_summary' => 'There can be one connection (if everything is in one DB). And there can be many databases. In general, you will understand everything later.',
            'managing_connections' => 'This section allows you to manipulate all connections in Flute.',
            'setting_up_dbs' => 'In this section, the setup and installation of databases that use connections take place. Phew, take a breath and let\'s move on...',
            'language_settings' => 'In this section, you choose the default engine language and cache translations.',
            'mail_server_settings' => 'In this section, you will configure the mail server for sending emails (for password reset, etc.).',
            'profile_settings' => 'Here you can configure various parameters for users in the profile. Just visit and you\'ll understand everything yourself.',
            'balance_replenishment_settings' => 'This section contains settings used for balance replenishment. Whether it\'s the displayed currency or the minimum replenishment amount.',
            'tour_ending' => 'Unbelievable, but we have finished our tour of the main points. I know, you need to digest it, but I believe in you, you will definitely cope!'
        ]
    ],
    'admin_stats' => [
        'title' => [
            'sidebar' => 'Sidebar',
            'main_menu' => 'Main Menu',
            'additional_menu' => 'Additional Menu',
            'recent_menu' => 'Recently Visited',
            'sidebar_complete' => 'Sidebar Complete',
            'navbar' => 'Navbar',
            'search' => 'Search',
            'version' => 'Version',
            'report_generation' => 'Report Generation',
            'final' => 'That\'s All!',
        ],
        'description' => [
            'sidebar' => 'Let\'s consider the main navigation panel of the admin panel. Well, let\'s start!',
            'main_menu' => 'This menu contains items related to critical system settings.',
            'additional_menu' => 'This menu contains items of modules and various system components. You will understand which item is responsible for what as you use it.',
            'recent_menu' => 'At the bottom of the admin panel, the pages you recently visited are also presented. This can be useful if you often visit one page and don\'t want to constantly search for it.',
            'sidebar_complete' => 'We\'ve finished with the sidebar, now let\'s move on to the other components.',
            'navbar' => 'Let\'s look at the top panel, what is presented there and how.',
            'search' => 'This input field allows you to find necessary items or pages by keywords. Just start typing, and the search will give you the desired result!',
            'version' => 'Here the version of the installed engine is presented. Also, in the future, it will be possible to update the engine directly from the admin panel.',
            'report_generation' => 'This button allows you to generate a detailed report on the system. If you need to send someone information about a system error, this archive should accompany the message.',
            'final' => 'I have told you about the main components inside the admin panel. On different pages, you will find other tips. Good luck using it!'
        ]
    ],
    'home' => [
        'title' => [
            'editor_mode_title' => 'Editor Mode',
            'editor_title' => 'Title of Editable Page',
            'editor_area' => 'Editor Area',
            'editor_toolbar' => 'Editor Tools',
            'save_button' => 'Save',
            'editor_course_completed' => 'Editor Course Completed',
        ],
        'description' => [
            'editor_mode' => 'CMS has an editing mode for each page, allowing us to fully customize it.',
            'editor_title' => 'Here is the title of the page that will be edited.',
            'editor_area' => 'Here you can create various blocks, widgets, and text that will be displayed in the editor.',
            'editor_toolbar' => 'On the left, you can add or modify existing blocks.',
            'save_button' => 'After modifying data, be sure to save all content by clicking this button.',
            'editor_course_completed' => 'That\'s all you need to know for a basic understanding in the editor. For more details, see the official documentation.',
        ],
    ]
];