<?php 
define('ROOT', dirname(__FILE__));
if($_SERVER['HTTPS']){
    define('PROTOCOL', 'https://');
}else{
    define('PROTOCOL', 'http://');
}
define('SITE', PROTOCOL.$_SERVER['SERVER_NAME']);

require_once ROOT.'/vendors/kosyk_art/base/Autoload.php';

(new vendors\kosyk_art\base\Application())->run();
