<?php

use application\controllers\AdminMainController;

class SettingController extends AdminMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('admin');
    }

    public function index()
    {

        $data = $this->admin->showAll();
        $this->template('admin/setting', 'Setting User Data', $data);
    }

    public function update()
    {
        $error = array();
        $data = array();

        $id = $_POST['id'];

        if ($_POST['username'] != $_POST['old_username']) {
            $data['username'] = $_POST['username'];
            $validasi_username = $this->admin->validasiUsername($_POST['username']);
            if ($validasi_username >= 1) array_push($error, "Username sudah ada, coba lagi");
        }

        if (!empty($_POST['old_password']) or !empty($_POST['password'])) {
            $data['password'] = md5($_POST['password']);

            if (md5($_POST['old_password']) !=  $_POST['old_password2']) array_push($error, "Password Lama Tidak Sesuai");
            if (empty($_POST['password'])) array_push($error, "Password Baru Tidak Boleh Kosong");
        }

        if (count($error) == 0) {
            $simpan = $this->admin->update($data, $id);
            if ($simpan) {
                $this->redirect('admin');
                $_SESSION['super_admin']['username'] = $_POST['username'];
                $_SESSION['super_admin']['password'] = $_POST['password'];
            }
        } else {
            $data = $this->admin->showAll();
            $this->template('admin/setting', 'Setting User Data', array('msg' => $error, 'data' => $data));
        }
    }
}
