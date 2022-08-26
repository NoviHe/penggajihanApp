<?php

use application\controllers\DashboardMainController;

class GajiController extends DashboardMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('absensi');
    }
    public function index()
    {
        $id = $_SESSION['user']['user_id'];
        $id_karyawan = $_SESSION['user']['id'];

        $this->model('potongan');
        $potongan = $this->potongan->showWhere(array('user_id' => $id));

        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.karyawan_id = $id_karyawan
        ORDER BY absensi.bulan ASC");

        $data = ['data' => $data, 'potongan' => $potongan[0]];
        $this->template('dashboard/gaji/index', 'Data Gaji Karyawan', $data);
    }

    public function cetak($id_absensi)
    {
        $id = $_SESSION['user']['user_id'];
        $title = 'Data Gaji Karyawan';

        $this->model('potongan');
        $potongan = $this->potongan->showWhere(array('user_id' => $id));

        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.id_absensi = $id_absensi
        ORDER BY absensi.bulan ASC");
        $data = ['data' => $data, 'potongan' => $potongan[0]];

        $view = $this->view('dashboard/gaji/cetak');
        $view->bind('title', $title);
        $view->bind('data', $data);
    }
}
