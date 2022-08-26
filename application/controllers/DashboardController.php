<?php
class DashboardController extends Controller
{
    private function getController($controller, $action = '', $parameter = '')
    {
        $controllerPath = ROOT . '/application/controllers/dashboard/' . ucfirst($controller) . 'Controller.php';
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerName = ucfirst($controller) . "Controller";
            $object = new $controllerName();

            $act = ($action != '') ? $action : 'index';
            $param = array($parameter);

            if (method_exists($controllerName, $act)) {
                call_user_func_array(array($object, $act), $param);
            } else die('Action not Found');
        } else die('Controller Dashboard not Found');
    }

    public function index()
    {
        $this->getController('dashboards');
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
    public function potongan($action = '', $parameter = '')
    {
        $this->getController('potongangaji', $action, $parameter);
    }
    public function penggajian($action = '', $parameter = '')
    {
        $this->getController('penggajian', $action, $parameter);
    }
    public function laporangaji($action = '', $parameter = '')
    {
        $this->getController('laporangaji', $action, $parameter);
    }
    public function laporanabsensi($action = '', $parameter = '')
    {
        $this->getController('laporanabsensi', $action, $parameter);
    }
    public function slipgaji($action = '', $parameter = '')
    {
        $this->getController('laporanslipgaji', $action, $parameter);
    }
    public function gaji($action = '', $parameter = '')
    {
        $this->getController('gaji', $action, $parameter);
    }
    public function setting($action = '', $parameter = '')
    {
        $this->getController('setting', $action, $parameter);
    }
    public function login($action = '')
    {
        $this->getController('loginp', $action);
    }
    public function logout()
    {
        session_destroy();
        $this->redirect('login');
    }
}
