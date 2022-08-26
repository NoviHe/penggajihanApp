<?php

use application\controllers\DashboardMainController;

class DashboardsController extends DashboardMainController
{
    public function index()
    {
        // var_dump(isset($_SESSION['user']['kota']) == null);
        // die;
        $this->model('karyawan');
        $jlmkaryawan = $this->karyawan->getRowWhere(array('user_id' => $_SESSION['user']['user_id']));
        $datakaryawan = $this->karyawan->joinWhere(array('karyawan.id_karyawan' => $_SESSION['user']['id']));

        $this->model('jabatan');
        $jlmjabatan = $this->jabatan->getRowWhere(array('user_id' => $_SESSION['user']['user_id']));

        $this->model('absensi');
        $jlmabsensi = $this->absensi->getRowWhere(array('user_id' => $_SESSION['user']['user_id']));

        $role = $_SESSION['user']['role'];

        $data = ['data' => $datakaryawan, 'jlmkaryawan' => $jlmkaryawan, 'jlmjabatan' => $jlmjabatan, 'jlmabsensi' => $jlmabsensi];
        $this->template('dashboard/dashboard', "Dashboard $role", $data);
    }
}
