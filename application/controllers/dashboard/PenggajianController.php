<?php

use application\controllers\DashboardMainController;

class PenggajianController extends DashboardMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('absensi');
    }
    public function index()
    {
        $id = $_SESSION['user']['user_id'];

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $this->model('potongan');
        $potongan = $this->potongan->showWhere(array('user_id' => $id));

        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.user_id = $id AND bulan = '$bulantahun'
        ORDER BY karyawan.nama_karyawan ASC");
        $data = ['data' => $data, 'potongan' => $potongan[0]];
        $this->template('dashboard/penggajian/index', 'Data Gaji Karyawan', $data);
    }

    public function cetak()
    {
        $id = $_SESSION['user']['user_id'];
        $title = 'Data Gaji Karyawan';
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $this->model('potongan');
        $potongan = $this->potongan->showWhere(array('user_id' => $id));

        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.user_id = $id AND bulan = '$bulantahun'
        ORDER BY karyawan.nama_karyawan ASC");
        $data = ['data' => $data, 'potongan' => $potongan[0]];

        $view = $this->view('dashboard/penggajian/cetak');
        $view->bind('title', $title);
        $view->bind('data', $data);
    }
}
