<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */

define('DB_NAME', 'autismre_kredit');

/** Имя пользователя MySQL */
define('DB_USER', 'user');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'user');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'J7FE1yI=}lLC5}I1|v4vl1G-DCN(|Y_EHfH#P})jxPuP{k@|Kw*4qDz.Smw|=qDg');
define('SECURE_AUTH_KEY',  'OS[VXQsQyKP:K;;?M1w>*2uG,0P`+uCPba2#erp@/Qri}/+c[m{} {>w2KZa6@t5');
define('LOGGED_IN_KEY',    '*Y&D4ZDgScS374x4q:&m/ZrV#o056N{%6mX#jkZUrr?Gkw4AXswq]03p{1v{kC&U');
define('NONCE_KEY',        'mY4k;XAvoql<%moR1|Z M_sJ79vy3te,z6pnQd+:xAY9;sO}2*#-,xJk4_T/dCfy');
define('AUTH_SALT',        'GoZ}:nbB1H>VEL5k~)R|Sai5mGds&t}UDXkaf0aMbBQm%:8h91nh|[f;*>^p1H!7');
define('SECURE_AUTH_SALT', 'otRp)Z3<+V+I89hIa_E6%,aKH(c6.~uqlnBd:HBe6NMn2UI<a>m6EfQz:u_G:7r0');
define('LOGGED_IN_SALT',   '6b?u}*LlYRoU7zD8[WP?lA$KR-}*4c51taD,(|b5U/^:fzAfd7g~C4op(K`4}EQ-');
define('NONCE_SALT',       '`vp{Em[Nc`RZ*;2;lS0%Z~#d;M3G5j6N#,tqVG$>VaxJ:ju]2<9M=SdvMx$7-DGP');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
