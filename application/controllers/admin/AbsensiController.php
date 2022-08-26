<?php

use application\controllers\AdminMainController;

class AbsensiController extends AdminMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('absensi');
    }
    public function index()
    {
        $data = $this->absensi->CustomQuery("SELECT absensi.*,karyawan.*,jabatan.*,user.* FROM absensi 
        INNER JOIN karyawan ON absensi.karyawan_id=karyawan.id_karyawan
        INNER JOIN jabatan ON absensi.jabatan_id=jabatan.id_jabatan
        INNER JOIN user ON absensi.user_id=user.id_user
        ORDER BY absensi.id_absensi DESC");
        $this->template('admin/absensi/index', 'Data absensi', $data);
    }
}
