<?php

use application\controllers\DashboardMainController;

class JabatanController extends DashboardMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('jabatan');
    }
    public function index()
    {
        $id = $_SESSION['user']['user_id'];
        $data = $this->jabatan->showWhere(array('user_id' => $id));
        $this->template('dashboard/jabatan/index', 'Data Jabatan', $data);
    }

    public function add()
    {
        $this->template('dashboard/jabatan/add', 'Tambah Data Jabatan');
    }

    public function insert()
    {
        $error = array();
        $data = array();

        $data['user_id'] = $_POST['user_id'];
        $data['nama_jabatan'] = $_POST['nama_jabatan'];
        $data['gaji_pokok'] = $_POST['gaji_pokok'];
        $data['transport'] = $_POST['transport'];
        $data['uang_makan'] = $_POST['uang_makan'];

        if (count($error) == 0) {
            $simpan = $this->jabatan->insert($data);
            if ($simpan) $this->redirect('dashboard/jabatan');
        } else {
            $this->template('dashboard/jabatan/add', 'Tambah Data Jabatan', array('msg' => $error));
        }
    }

    public function edit($id)
    {
        $data = $this->jabatan->show($id);
        $this->template('dashboard/jabatan/edit', 'Edit Data Jabatan', $data);
    }

    public function update()
    {
        $error = array();
        $data = array();

        $id = $_POST['id_jabatan'];
        $data['nama_jabatan'] = $_POST['nama_jabatan'];
        $data['gaji_pokok'] = $_POST['gaji_pokok'];
        $data['transport'] = $_POST['transport'];
        $data['uang_makan'] = $_POST['uang_makan'];

        if (count($error) == 0) {
            $simpan = $this->jabatan->update($data, $id);
            if ($simpan) $this->redirect('dashboard/jabatan');
        } else {
            $data = $this->jabatan->show($id);
            $this->template('dashboard/jabatan/edit', 'Edit Data Jabatan', array('msg' => $error, 'data' => $data));
        }
    }

    public function delete($id)
    {
        $hapus = $this->jabatan->delete($id);
        if ($hapus) $this->redirect('dashboard/jabatan');
    }
}
