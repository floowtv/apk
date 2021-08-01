<?php
define("BASEPATH", dirname(dirname(__FILE__)));
define("BASEROOT", realpath($_SERVER['DOCUMENT_ROOT']));
define('BASE_DOMAIN', $_SERVER['HTTP_HOST']);
define("BASE_HOST", (isset($_SERVER['HTTPS']) ? "https" : "https") . "://".BASE_DOMAIN);
define('BASE_PAGE', basename($_SERVER['PHP_SELF']));
define('CURRENT_URL', BASE_HOST.$_SERVER['REQUEST_URI']);

/* ========= CUSTOMIZE YOUR DOMAIN USERNAME AND PASSWORD HERE ========= */

$config['base_url'] = 'https://servicoop.000webhostapp.com/embed';  // without slash Change with your domain 
$config['user_name'] = 'admin';  // Change with your username 
$config['pass_word'] = '7418296305';  // Change with your password
//$config['reff_domain'] = 'servicoop.000webhostapp.com,https://servicoop.000webhostapp.com'; // 
/* ========= POWERED BY ANCOKPLAYER ========= */
?>