<?php

use application\controllers\DashboardMainController;

class SettingController extends DashboardMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('user');
    }

    public function index()
    {
        $id = $_SESSION['user']['id'];
        if ($_SESSION['user']['role'] == 'Pimpinan') {
            $data = $this->user->show($id);
        } else {
            $this->model('karyawan');
            $data = $this->karyawan->show($id);
        }
        $this->template('dashboard/setting', 'Setting User Data', $data);
    }

    public function updateUser()
    {
        $data = array();
        $id = $_POST['id_user'];
        $data['alamat'] = $_POST['alamat'];
        $data['kota'] = $_POST['kota'];

        $simpan = $this->user->update($data, $id);
        if ($simpan) :
            $this->redirect('dashboard');
            $_SESSION['user']['kota'] = $_POST['kota'];
        endif;
    }

    public function update()
    {
        $error = array();
        $data = array();

        $id = $_POST['id_user'];
        $data['nama_perusahaan'] = $_POST['nama_company'];
        $data['nama_pemilik'] = $_POST['nama_pemilik'];
        $data['email'] = $_POST['email'];
        $data['alamat'] = $_POST['alamat'];
        $data['kota'] = $_POST['kota'];

        if (count($error) == 0) {
            $simpan = $this->user->update($data, $id);
            if ($simpan) :
                $this->redirect('dashboard');
                $_SESSION['user']['nama_perusahaan'] = $_POST['nama_company'];
                $_SESSION['user']['nama'] = $_POST['nama_pemilik'];
                $_SESSION['user']['kota'] = $_POST['kota'];
            endif;
        } else {
            $data = $this->user->show($id);
            $this->template('dashboard/setting', 'Setting User Data', array('msg' => $error, 'data' => $data));
        }
    }

    public function updatePassword()
    {
        $this->model('user');

        $error = array();
        $data = array();

        $id = $_POST['id_user'];

        if ($_POST['username'] != $_POST['old_username']) {
            $data['username'] = $_POST['username'];
            $validasi_username = $this->user->validasiUsername($_POST['username']);
            if ($validasi_username >= 1) array_push($error, "Username sudah ada, coba lagi");
        }

        if (!empty($_POST['old_password']) or !empty($_POST['password'])) {
            $data['password'] = md5($_POST['password']);

            if (md5($_POST['old_password']) !=  $_POST['old_password2']) array_push($error, "Password Lama Tidak Sesuai");
            if (empty($_POST['password'])) array_push($error, "Password Baru Tidak Boleh Kosong");
        }

        if (count($error) == 0) {
            $simpan = $this->user->update($data, $id);
            if ($simpan) {
                $this->redirect('dashboard');
                $_SESSION['user']['username'] = $_POST['username'];
                $_SESSION['user']['password'] = $_POST['password'];
            }
        } else {
            $data = $this->user->show($id);
            $this->template('dashboard/setting', 'Setting User Data', array('msg' => $error, 'data' => $data));
        }
    }

    public function update2()
    {
        $this->model('karyawan');
        $error = array();
        $data = array();

        $data['nama_karyawan'] = $_POST['nama_karyawan'];
        $data['nik'] = $_POST['nik'];
        $data['jenis_kelamin'] = $_POST['jenis_kelamin'];

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
            if (count($error) == 0) {
                $moved = move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/penggajihan/public/img/' . $photoName);
                if ($moved) $_SESSION['user']['photo'] = $photoName;
            }
        }

        $id = $_POST['id_karyawan'];

        if (count($error) == 0) {
            $simpan = $this->karyawan->update($data, $id);
            if ($simpan) $this->redirect('dashboard');
            if ($simpan) $_SESSION['user']['nama'] = $_POST['nama_karyawan'];
        } else {
            $data = $this->karyawan->show($id);
            $this->template('dashboard/setting', 'Setting User Data', array('msg' => $error, 'data' => $data));
        }
    }

    public function updatePassword2()
    {
        $this->model('karyawan');

        $error = array();
        $data = array();

        $id = $_POST['id_karyawan'];

        if ($_POST['username'] != $_POST['old_username']) {
            $data['username'] = $_POST['username'];
            $validasi_username = $this->karyawan->validasiUsername($_POST['username']);
            if ($validasi_username >= 1) array_push($error, "Username sudah ada, coba lagi");
        }

        if (!empty($_POST['old_password']) or !empty($_POST['password'])) {
            $data['password'] = $_POST['password'];

            if ($_POST['old_password'] != $_POST['old_password2']) array_push($error, "Password Lama Tidak Sesuai");
            if (empty($_POST['password'])) array_push($error, "Password Baru Tidak Boleh Kosong");
        }

        if (count($error) == 0) {
            $simpan = $this->karyawan->update($data, $id);
            if ($simpan) {
                $this->redirect('dashboard');
                $_SESSION['user']['username'] = $_POST['username'];
                $_SESSION['user']['password'] = $_POST['password'];
            }
        } else {
            $data = $this->karyawan->show($id);
            $this->template('dashboard/setting', 'Setting User Data', array('msg' => $error, 'data' => $data));
        }
    }
}
