<?php
class RegisterController extends Controller
{
    function __construct()
    {
        $this->model('user');
    }

    public function index()
    {
        $this->view('dashboard/register');
    }

    public function check()
    {
        $error = array();

        $data = array();
        $data['nama_perusahaan'] = $_POST['nama_perusahaan'];
        $data['nama_pemilik'] = $_POST['nama_pemilik'];
        $data['email'] = $_POST['email'];
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);

        $validasi_username = $this->user->validasiUsername($_POST['username']);
        if ($validasi_username >= 1) array_push($error, "Username sudah ada, coba lagi");
        if ($_POST['RepeatPassword'] != $_POST['password']) array_push($error, "Password dan Repeat Password tidak sama");

        if (count($error) == 0) {
            $simpan = $this->user->insert($data);
            if ($simpan) :
                $view = $this->view('dashboard/login');
                $view->bind('msgplus', 'Akun Pimpinan / Pemilik Berhasil Dibuat, Silahkan Login!');
            endif;
        } else {
            $view = $this->view('dashboard/register');
            $view->bind('data', array('msg' => $error));
        }
    }
}
