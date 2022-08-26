<?php

use application\controllers\AdminMainController;

class UserController extends AdminMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('user');
    }
    public function index()
    {
        $data = $this->user->showAll('DESC');
        $this->template('admin/user/index', 'User Data', $data);
    }

    public function add()
    {
        $this->template('admin/user/add', 'Tambah User Data');
    }

    public function insert()
    {
        $error = array();

        $data = array();
        $data['nama_perusahaan'] = $_POST['nama_company'];
        $data['nama_pemilik'] = $_POST['nama_pemilik'];
        $data['email'] = $_POST['email'];
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);

        if ($_POST['re_password'] != $_POST['password']) array_push($error, "Password dan Ulangi Password tidak sama");

        if (count($error) == 0) {
            $simpan = $this->user->insert($data);
            if ($simpan) $this->redirect('admin/user');
        } else {
            $this->template('admin/user/add', 'Tambah User Data', array('msg' => $error));
        }
    }

    public function edit($id)
    {
        $data = $this->user->show($id);
        $this->template('admin/user/edit', 'Edit User Data', $data);
    }

    public function update()
    {
        $error = array();

        $data = array();
        $data = array();
        $id = $_POST['id_user'];
        $data['nama_perusahaan'] = $_POST['nama_company'];
        $data['nama_pemilik'] = $_POST['nama_pemilik'];
        $data['email'] = $_POST['email'];

        if (!empty($_POST['old_password']) or !empty($_POST['password'])) {
            $data['password'] = md5($_POST['password']);

            if (md5($_POST['old_password']) != $_POST['old_password2']) array_push($error, "Password Lama Tidak Sesuai");

            if (empty($_POST['password'])) array_push($error, "Password Baru Tidak Boleh Kosong");
        }

        if (count($error) == 0) {
            $simpan = $this->user->update($data, $id);
            if ($simpan) $this->redirect('admin/user');
        } else {
            $data = $this->user->show($id);
            $this->template('admin/user/edit', 'Edit User Data', array('msg' => $error, 'data' => $data));
        }
    }

    public function delete($id)
    {
        $hapus = $this->user->delete($id);
        if ($hapus) $this->redirect('admin/user');
    }
}
