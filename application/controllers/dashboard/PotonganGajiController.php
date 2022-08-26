<?php

use application\controllers\DashboardMainController;

class PotonganGajiController extends DashboardMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('potongan');
    }
    public function index()
    {
        $id = $_SESSION['user']['user_id'];
        $data = $this->potongan->showWhere(array('user_id' => $id));
        $this->template('dashboard/potongan/index', 'Data Potongan', $data);
    }

    public function add()
    {
        $this->template('dashboard/potongan/add', 'Tambah Data Potongan');
    }

    public function insert()
    {
        $error = array();
        $data = array();

        $data['user_id'] = $_POST['user_id'];
        $data['alpha'] = $_POST['alpha'];
        $data['izin'] = $_POST['izin'];
        $data['sakit'] = $_POST['sakit'];

        if (count($error) == 0) {
            $simpan = $this->potongan->insert($data);
            if ($simpan) $this->redirect('dashboard/potongan');
        } else {
            $this->template('dashboard/potongan/add', 'Tambah Data potongan', array('msg' => $error));
        }
    }

    public function edit($id)
    {
        $data = $this->potongan->show($id);
        $this->template('dashboard/potongan/edit', 'Edit Data Potongan', $data);
    }

    public function update()
    {
        $error = array();
        $data = array();

        $id = $_POST['id_potongan'];
        $data['alpha'] = $_POST['alpha'];
        $data['izin'] = $_POST['izin'];
        $data['sakit'] = $_POST['sakit'];

        if (count($error) == 0) {
            $simpan = $this->potongan->update($data, $id);
            if ($simpan) $this->redirect('dashboard/potongan');
        } else {
            $data = $this->potongan->show($id);
            $this->template('dashboard/potongan/edit', 'Edit Data potongan', array('msg' => $error, 'data' => $data));
        }
    }

    public function delete($id)
    {
        $hapus = $this->potongan->delete($id);
        if ($hapus) $this->redirect('dashboard/potongan');
    }
}
