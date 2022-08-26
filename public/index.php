<?php
session_start();

//konstanta ROOT
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);

//menyimpan data url 
$url = isset($_GET['url']) ? $_GET['url'] : '';

//memanggil file config
require_once(ROOT . '/config/config.php');
require_once(ROOT . '/library/controller.class.php');
require_once(ROOT . '/library/model.class.php');
require_once(ROOT . '/library/view.class.php');

//membuat function autoload
spl_autoload_register(function ($className) {
    $dir = ROOT . DS . str_replace("\\", DS, $className) . ".php";
    if (file_exists($dir)) require_once($dir);
});
// spl_autoload_register('__autoload');

//function pesan error
function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('errors_log', ROOT . '/tmp/log/error.log');
    }
}

//function memanggil controller sesuai nilai url
function callHook()
{
    global $url;
    $urlArray = explode("/", $url);

    $controller = (!empty($urlArray[0])) ? $urlArray[0] : DEFAULT_CONTROLLER;

    $controllerPath = ROOT . '/application/controllers/' . ucfirst($controller) . 'Controller.php';

    if (file_exists($controllerPath)) {
        array_shift($urlArray);
        $action = (!empty($urlArray[0])) ? $urlArray[0] : "index";
        array_shift($urlArray);
        $parameter = $urlArray;

        require_once $controllerPath;
        $controllerName = ucfirst($controller) . "Controller";
        $object = new $controllerName();
        if (method_exists($controllerName, $action)) {
            call_user_func_array(array($object, $action), $parameter);
        } else die('Action not Found');
    } else die('Controller not Found');
}

setReporting();
callHook();
