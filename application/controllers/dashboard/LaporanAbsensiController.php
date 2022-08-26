<?php

use application\controllers\DashboardMainController;

class LaporanAbsensiController extends DashboardMainController
{
    public function index()
    {
        $data = 0;
        $this->template('dashboard/laporan-absensi/index', 'Laporan Absensi Karyawan', $data);
    }

    public function cetak()
    {
        $error = array();
        $id = $_SESSION['user']['user_id'];
        $title = 'Data Gaji Karyawan';
        if ((isset($_POST['bulan']) && $_POST['bulan'] != '') && (isset($_POST['tahun']) && $_POST['tahun'] != '')) {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $this->model('absensi');
        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.user_id = $id AND bulan = '$bulantahun'
        ORDER BY karyawan.nama_karyawan ASC");

        array_push($error, "Data absensi kosong, tidak ada data pada bulan dan tahun yang anda pihih.");

        if (count($data) > 0) {
            $view = $this->view('dashboard/laporan-absensi/cetak');
            $view->bind('title', $title);
            $view->bind('data', $data);
            $view->bind('bulan', $bulan);
            $view->bind('tahun', $tahun);
        } else {
            $this->template('dashboard/laporan-absensi/index', 'Laporan Gaji Karyawan', array('msg' => $error));
        }
    }
}
