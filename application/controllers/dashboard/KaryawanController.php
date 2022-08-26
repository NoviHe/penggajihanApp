<?php

use application\controllers\DashboardMainController;

class KaryawanController extends DashboardMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('karyawan');
    }
    public function index()
    {
        $data = $this->karyawan->joinWhere(array('karyawan.user_id' => $_SESSION['user']['user_id']));
        $this->template('dashboard/karyawan/index', 'Data Karyawan', $data);
    }

    public function add()
    {
        $this->model('jabatan');
        $jabatan = $this->jabatan->showWhere(array('user_id' => $_SESSION['user']['user_id']));
        $data = ['jabatan' => $jabatan];
        $this->template('dashboard/karyawan/add', 'Tambah Data Karyawan', $data);
    }

    public function insert()
    {
        $error = array();
        $data = array();
        $valid_extensi = array('png', 'jpg');
        $x = explode('.', $_FILES['foto']['name']);
        $extensi = strtolower(end($x));
        $photoName = "karyawan_$_POST[user_id]_" . time() . "." . $extensi;
        $size = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];

        $validasi_username = $this->karyawan->validasiUsername($_POST['username']);
        if ($validasi_username >= 1) array_push($error, "Username sudah ada, coba lagi");
        if (in_array($extensi, $valid_extensi) == false) array_push($error, "Ektensi Gambar harus PNG atau JPG");
        if ($size > 1044070) array_push($error, "Ukuran Gambar Terlalu Besar, Harus dibawah 1Mb");

        $data['user_id'] = $_POST['user_id'];
        $data['nama_karyawan'] = $_POST['nama_karyawan'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['nik'] = $_POST['nik'];
        $data['jenis_kelamin'] = $_POST['jenis_kelamin'];
        $data['jabatan_id'] = $_POST['jabatan_id'];
        $data['tanggal_masuk'] = $_POST['tanggal_masuk'];
        $data['status'] = $_POST['status'];
        $data['photo'] = $photoName;
        $data['role'] = $_POST['role'];

        if (count($error) == 0) {
            $moved = move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/penggajihan/public/img/' . $photoName);
            if ($moved) $simpan = $this->karyawan->insert($data);
            if ($simpan) $this->redirect('dashboard/karyawan');
        } else {
            $this->model('jabatan');
            $jabatan = $this->jabatan->showWhere(array('user_id' => $_SESSION['user']['user_id']));
            $data = ['jabatan' => $jabatan];
            $this->template('dashboard/karyawan/add', 'Tambah Data Karyawan', array('msg' => $error, 'data' => $data));
        }
    }

    public function show($id)
    {
        // $data = $this->karyawan->showJoin(array('id_karyawan' => $id));
        // $data = $this->karyawan->show($id);
        $data = $this->karyawan->joinWhere(array('id_karyawan' => $id));
        $this->template('dashboard/karyawan/show', 'Tampil Data Karyawan', $data);
    }

    public function edit($id)
    {
        $karyawan = $this->karyawan->show($id);
        $this->model('jabatan');
        $jabatan = $this->jabatan->showWhere(array('user_id' => $_SESSION['user']['user_id']));
        $data = ['data' => $karyawan[0], 'jabatan' => $jabatan];
        $this->template('dashboard/karyawan/edit', 'Edit Data Karyawan', $data);
    }

    public function update()
    {
        $error = array();
        $data = array();

        $data['user_id'] = $_POST['user_id'];
        $data['nama_karyawan'] = $_POST['nama_karyawan'];
        $data['password'] = $_POST['password'];
        $data['nik'] = $_POST['nik'];
        $data['jenis_kelamin'] = $_POST['jenis_kelamin'];
        $data['jabatan_id'] = $_POST['jabatan_id'];
        $data['tanggal_masuk'] = $_POST['tanggal_masuk'];
        $data['status'] = $_POST['status'];
        $data['role'] = $_POST['role'];

        if ($_POST['username'] != $_POST['old_username']) {
            $data['username'] = $_POST['username'];
            $validasi_username = $this->karyawan->validasiUsername($_POST['username']);
            if ($validasi_username >= 1) array_push($error, "Username sudah ada, coba lagi");
        }

        if ($_FILES['foto']['name'] != null) {
            $valid_extensi = array('png', 'jpg');
            $x = explode('.', $_FILES['foto']['name']);
            $extensi = strtolower(end($x));
            $photoName = "karyawan_$_POST[user_id]_" . time() . "." . $extensi;
            $size = $_FILES['foto']['size'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            if (in_array($extensi, $valid_extensi) == false) array_push($error, "Ektensi Gambar harus PNG atau JPG");
            if ($size > 1044070) array_push($error, "Ukuran Gambar Terlalu Besar, Harus dibawah 1Mb");

            $data['photo'] = $photoName;
            move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/penggajihan/public/img/' . $photoName);
        }

        $id = $_POST['id_karyawan'];

        if (count($error) == 0) {
            $simpan = $this->karyawan->update($data, $id);
            if ($simpan) $this->redirect('dashboard/karyawan');
        } else {
            $data = $this->karyawan->show($id);
            $this->model('jabatan');
            $jabatan = $this->jabatan->showWhere(array('user_id' => $_SESSION['user']['user_id']));
            $data = ['data' => $data[0], 'jabatan' => $jabatan];
            $this->template('dashboard/karyawan/edit', 'Edit Data Karyawan', array('msg' => $error, 'data' => $data));
        }
    }

    public function delete($id)
    {
        $hapus = $this->karyawan->delete($id);
        if ($hapus) $this->redirect('dashboard/karyawan');
    }
}
