<?php

use application\controllers\AdminMainController;

class DashboardController extends AdminMainController
{
    public function index()
    {
        $this->model('user');
        $jlmperusahaan = $this->user->getRow();

        $this->model('karyawan');
        $jlmkaryawan = $this->karyawan->getRow();

        $this->model('jabatan');
        $jlmjabatan = $this->jabatan->getRow();

        $this->model('absensi');
        $jlmabsensi = $this->absensi->getRow();

        $data = ['jlmperusahaan' => $jlmperusahaan, 'jlmkaryawan' => $jlmkaryawan, 'jlmjabatan' => $jlmjabatan, 'jlmabsensi' => $jlmabsensi];
        $this->template('admin/dashboard', 'Dashboard', $data);
    }
}
