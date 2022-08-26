<?php
class AdminController extends Controller
{
    private function getController($controller, $action = '', $parameter = '')
    {
        $controllerPath = ROOT . '/application/controllers/admin/' . ucfirst($controller) . 'Controller.php';
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerName = ucfirst($controller) . "Controller";
            $object = new $controllerName();

            $act = ($action != '') ? $action : 'index';
            $param = array($parameter);

            if (method_exists($controllerName, $act)) {
                call_user_func_array(array($object, $act), $param);
            } else die('Action not Found');
        } else die('Controller Admin not Found');
    }

    public function index()
    {
        $this->getController('dashboard');
    }
    public function user($action = '', $parameter = '')
    {
        $this->getController('user', $action, $parameter);
    }
    public function karyawan($action = '', $parameter = '')
    {
        $this->getController('karyawan', $action, $parameter);
    }
    public function jabatan($action = '', $parameter = '')
    {
        $this->getController('jabatan', $action, $parameter);
    }
    public function absensi($action = '', $parameter = '')
    {
        $this->getController('absensi', $action, $parameter);
    }
    public function penggajian($action = '', $parameter = '')
    {
        $this->getController('penggajian', $action, $parameter);
    }
    public function setting($action = '', $parameter = '')
    {
        $this->getController('setting', $action, $parameter);
    }
    public function login($action = '')
    {
        $this->getController('login', $action);
    }
    public function logout()
    {
        session_destroy();
        $this->redirect('admin/login');
    }
}
