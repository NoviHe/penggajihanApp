<?php

use application\controllers\DashboardMainController;

class LaporanGajiController extends DashboardMainController
{
    public function index()
    {
        $data = 0;
        $this->template('dashboard/laporan-gaji/index', 'Laporan Gaji Karyawan', $data);
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

        $this->model('potongan');
        $potongan = $this->potongan->showWhere(array('user_id' => $id));
        $this->model('absensi');
        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.user_id = $id AND bulan = '$bulantahun'
        ORDER BY karyawan.nama_karyawan ASC");

        $data = ['data' => $data, 'potongan' => $potongan[0]];

        array_push($error, "Data gaji kosong, tidak ada data pada bulan dan tahun yang anda pihih.");

        if (count($data['data']) > 0) {
            $view = $this->view('dashboard/laporan-gaji/cetak');
            $view->bind('title', $title);
            $view->bind('data', $data);
            $view->bind('bulan', $bulan);
            $view->bind('tahun', $tahun);
        } else {
            $this->template('dashboard/laporan-gaji/index', 'Laporan Gaji Karyawan', array('msg' => $error));
        }
    }
}
