<?php

use application\controllers\DashboardMainController;

class AbsensiController extends DashboardMainController
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
        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.user_id = $id AND bulan = '$bulantahun'
        ORDER BY karyawan.nama_karyawan ASC");
        $this->template('dashboard/absensi/index', 'Data absensi', $data);
    }

    public function add()
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
        $data = $this->absensi->CustomQuery("SELECT karyawan.*,jabatan.* FROM karyawan 
        INNER JOIN jabatan ON karyawan.jabatan_id=jabatan.id_jabatan
        WHERE NOT EXISTS(SELECT * FROM absensi 
        WHERE bulan = '$bulantahun' AND karyawan.id_karyawan=absensi.karyawan_id) 
        AND karyawan.user_id = $id
        ORDER BY karyawan.nama_karyawan ASC");
        $this->template('dashboard/absensi/add', 'Tambah Data absensi', $data);
    }

    public function insert()
    {
        $error = array();
        $user_id = $_POST['user_id'];
        $karyawan_id = $_POST['karyawan_id'];
        $jabatan_id = $_POST['jabatan_id'];
        $bulan = $_POST['bulan'];
        $hadir = $_POST['hadir'];
        $sakit = $_POST['sakit'];
        $alpha = $_POST['alpha'];
        $izin = $_POST['izin'];

        $x = 0;
        foreach ($karyawan_id as $kar) {
            $data = array();
            $data['user_id'] = $user_id[$x];
            $data['karyawan_id'] = $kar;
            $data['jabatan_id'] = $jabatan_id[$x];
            $data['bulan'] = $bulan[$x];
            $data['hadir'] = $hadir[$x];
            $data['sakit'] = $sakit[$x];
            $data['alpha'] = $alpha[$x];
            $data['izin'] = $izin[$x];
            $this->absensi->insert($data);
            $x++;
        }
        $this->redirect('dashboard/absensi');
    }

    public function edit()
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
        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        WHERE absensi.user_id = $id AND bulan = '$bulantahun'
        ORDER BY karyawan.nama_karyawan ASC");
        $this->template('dashboard/absensi/edit', 'Edit Data Absensi', $data);
    }

    public function update()
    {
        $id_absensi = $_POST['id_absensi'];
        $hadir = $_POST['hadir'];
        $sakit = $_POST['sakit'];
        $alpha = $_POST['alpha'];
        $izin = $_POST['izin'];

        $x = 0;
        foreach ($id_absensi as $absen) {
            $data = array();
            $id = $absen;
            $data['hadir'] = $hadir[$x];
            $data['sakit'] = $sakit[$x];
            $data['alpha'] = $alpha[$x];
            $data['izin'] = $izin[$x];
            $x++;
            $this->absensi->update($data, $id);
        }
        $this->redirect('dashboard/absensi');
    }
}
