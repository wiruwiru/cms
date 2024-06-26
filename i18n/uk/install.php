<?php

return [
    "back" => "Назад",
    "next" => "Далі",
    "last_step_required" => "Для переходу далі, потрібно пройти попередній етап!",
    "finish" => "Завершити установку!",
    '1' => [
        'card_head' => 'Вибір мови',
        "title" => "Flute :: Вибір мови",
        'Несуществующий язык' => 'Схоже ви вибрали якусь загадкову мову :0'
    ],
    '2' => [
        "title" => "Flute :: Перевірка вимог",
        'card_head' => "Сумісність",
        'card_head_desc' => "На цій сторінці потрібно перевірити відповідність всіх вимог, і якщо все добре, то продовжувати установку",
        'req_not_completed' => "Вимоги не виконано",
        'need_to_install' => "Потрібно встановити",
        'may_installed' => "Рекомендується встановити",
        'installed' => "Встановлено",
        'all_good' => "Все добре!",
        'may_unstable' => "Може нестабільно працювати",
        'min_php_7' => "Мінімальна версія PHP 7.4!",
        'php_exts' => "Розширення PHP",
        'other' => 'Інше'
    ],
    '3' => [
        "title" => "Flute :: Введення даних від БД",
        'card_head' => "Дані від БД",
        'card_head_desc' => "Тут потрібно буде вказати дані для таблиць нашого двигуна",
        "driver" => "Виберіть драйвер БД",
        "ip" => "Введіть хост (IP) БД",
        "port" => "Введіть порт підключення до БД",
        "db" => "Введіть назву БД",
        "user" => "Введіть ім'я користувача БД",
        "pass" => "Введіть пароль від БД",
        'db_error' => "Сталася помилка при підключенні: <br>%error%",
        'data_invalid' => "Дані введено невірно!"
    ],
    '4' => [
        "title" => "Flute :: Реєстрація власника",
        'card_head' => "Реєстрація власника",
        'card_head_desc' => "Створюємо адміністратора, того, хто буде відповідати за всю роботу сайту і мати до всього доступ.",
        'login' => 'Логін',
        'login_placeholder' => 'Введіть логін',
        'name' => 'Нікнейм',
        'name_placeholder' => 'Введіть відображуване ім’я',
        'email' => 'Email',
        'email_placeholder' => 'Введіть Email',
        'password' => 'Пароль',
        'password_placeholder' => 'Введіть пароль',
        'repassword' => 'Повторний ввід пароля',
        'repassword_placeholder' => 'Введіть пароль ще раз',
        'login_length' => 'Мінімальна довжина логіну 2 літери!',
        'name_length' => 'Мінімальна довжина нікнейма 2 літери!',
        'pass_length' => 'Мінімальна довжина пароля 4 символи!',
        'invalid_email' => 'Введіть email коректно!',
        'pass_diff' => 'Введені паролі відрізняються!',
        'error_create_user' => 'Помилка при створенні користувача!',
    ],
    '5' => [
        "title" => "Flute :: Увімкнені чи підказки?",
        'card_head' => "Увімкнення підказок",
        'card_head_desc' => "Потрібні чи в двигуні вспливаючі підказки, щоб зрозуміти, як користуватися тим чи іншим функціоналом?",
        'yes' => 'Так, увімкнемо! 🔥',
        'no' => 'Ні, я експерт 😎'
    ],
    '6' => [
        "title" => "Flute :: Звіт про помилки",
        'card_head' => "Увімкнення звіту про помилки",
        'card_head_desc' => "У випадку якихось перебоїв у роботі двигуна, ваші помилки будуть надіслані на наш сервер для обробки. З часом може вийти оновлення з виправленням, а ви про це навіть могли не говорити 💀",
        'yes' => 'Давайте. Я хочу допомогти досягти максимально стабільної роботи! 👽',
        'no' => 'Ні, я жадібний! 👺'
    ],
];