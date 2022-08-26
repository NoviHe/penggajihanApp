<?php

use application\controllers\AdminMainController;

class PenggajianController extends AdminMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('absensi');
    }
    public function index()
    {
        $this->model('potongan');
        $potongan = $this->potongan->showAll();

        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.*,user.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        INNER JOIN user ON absensi.user_id=user.id_user
        ORDER BY absensi.id_absensi DESC");
        $data = ['data' => $data, 'potongan' => $potongan];
        $this->template('admin/penggajian/index', 'Data absensi', $data);
    }
}
