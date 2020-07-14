<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Dhaka');

/*==================================== MI SESSION STARTS =======================================*/
define('MI_SESSION', true);
/*==================================== MI SESSION ENDS =======================================*/

/*==================================== MI BASE URL =========================================*/

define('MI_BASE_URL', 'http://localhost/Mi_tailor/');

/*==================================== MI BASE URL END =========================================*/

/*==================================== MI DB CONFIGURATION ======================================*/
define('MI_DB_HOST', 'localhost');
define('MI_DB_NAME', 'custom_shirt_design');
define('MI_DB_USER', 'root');
define('MI_DB_PASS', '');
/*==================================== MI DB CONFIGURATION END ==================================*/

/*==================================== MI SMTP MAIL CONFIGURATION ======================================*/
define('MI_MAIL_HOST', 'mail.geniusit.net');
define('MI_MAIL_USER', 'webadmin@geniusit.net');
define('MI_MAIL_PASS', 'Admin@777');
define('MI_MAIL_LAYER', 'tls');
define('MI_MAIL_LAYER_CODE', '587');
define('MI_MAIL_FROM_NAME', 'Prothom Proneta Limited');
define('MI_MAIL_FROM_EMAIL', 'support@prothomproneta.com');
/*==================================== MI SMTP MAIL CONFIGURATION END ==================================*/
