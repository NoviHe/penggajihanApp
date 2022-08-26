<?php

use application\controllers\AdminMainController;

class JabatanController extends AdminMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('jabatan');
    }
    public function index()
    {
        $data = $this->jabatan->showJoin();
        $this->template('admin/jabatan/index', 'Data Jabatan', $data);
    }

    public function edit($id)
    {
        $data = $this->jabatan->show($id);
        $this->model('user');
        $company = $this->user->showAll();
        $data = ['perusahaan' => $company, 'data' => $data[0]];
        $this->template('admin/jabatan/edit', 'Edit Data Jabatan', $data);
    }

    public function update()
    {
        $error = array();

        $data = array();
        $data = array();
        $id = $_POST['id_jabatan'];
        $data['user_id'] = $_POST['user_id'];
        $data['nama_jabatan'] = $_POST['nama_jabatan'];
        $data['gaji_pokok'] = $_POST['gaji_pokok'];
        $data['transport'] = $_POST['transport'];
        $data['uang_makan'] = $_POST['uang_makan'];

        if (count($error) == 0) {
            $simpan = $this->jabatan->update($data, $id);
            if ($simpan) $this->redirect('admin/jabatan');
        } else {
            $data = $this->jabatan->show($id);
            $this->template('admin/jabatan/edit', 'Edit Data Jabatan', array('msg' => $error, 'data' => $data));
        }
    }

    public function delete($id)
    {
        $hapus = $this->jabatan->delete($id);
        if ($hapus) $this->redirect('admin/jabatan');
    }
}
