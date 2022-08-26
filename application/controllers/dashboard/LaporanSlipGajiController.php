<?php

use application\controllers\DashboardMainController;

class LaporanSlipGajiController extends DashboardMainController
{
    public function index()
    {
        $id = $_SESSION['user']['user_id'];
        $this->model('karyawan');
        $data = $this->karyawan->showWhere(array('user_id' => $id));
        $this->template('dashboard/laporan-slipgaji/index', 'Laporan Slip Gaji Karyawan', $data);
    }

    public function cetak()
    {
        $error = array();
        $id = $_SESSION['user']['user_id'];
        $id_karyawan = $_POST['id_karyawan'];
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
        if ($id_karyawan == '') {
            array_push($error, "Tolong Pilih Data Karyawan yang ingin di cetak.");
        } else {
            $this->model('potongan');
            $potongan = $this->potongan->showWhere(array('user_id' => $id));
            $this->model('absensi');
            $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
            INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
            INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
            WHERE absensi.user_id = $id AND bulan = '$bulantahun' AND karyawan.id_karyawan = $id_karyawan
            ORDER BY karyawan.nama_karyawan ASC");

            if (count($data) == 0)  array_push($error, "Data kosong, tidak ada data pada bulan dan tahun yang anda pihih.");

            $data = ['data' => $data, 'potongan' => $potongan[0]];
        }

        if (count($error) == 0) {
            $view = $this->view('dashboard/laporan-slipgaji/cetak');
            $view->bind('title', $title);
            $view->bind('data', $data);
            $view->bind('bulan', $bulan);
            $view->bind('tahun', $tahun);
        } else {
            $id = $_SESSION['user']['user_id'];
            $this->model('karyawan');
            $data = $this->karyawan->showWhere(array('user_id' => $id));
            $this->template('dashboard/laporan-slipgaji/index', 'Laporan Slip Gaji Karyawan', array('msg' => $error, 'data' => $data));
        }
    }
}
