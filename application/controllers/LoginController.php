<?php
class LoginController extends Controller
{
    function __construct()
    {
        $this->model('user');
    }

    public function index()
    {
        $this->view('dashboard/login');
    }

    public function check()
    {
        $username = $this->validate($_POST['username']);
        $password = $this->validate($_POST['password']);

        $query = $this->user->selectWhere(array('username' => $username, 'password' => md5($password)));
        $data = $this->user->getResult($query);
        $jlm = $this->user->getRows($query);

        $this->model('karyawan');
        $query2 = $this->karyawan->selectWhere(array('username' => $username, 'password' => $password));
        $data2 = $this->karyawan->getResult($query2);
        $jlm2 = $this->karyawan->getRows($query2);

        if ($jlm > 0) {
            $data = $data[0];
            $user = [
                'id' => $data['id_user'],
                'user_id' => $data['id_user'],
                'nama_perusahaan' => $data['nama_perusahaan'],
                'nama' => $data['nama_pemilik'],
                'kota' => $data['kota'],
                'username' => $data['username'],
                'password' => $data['password'],
                'role' => 'Pimpinan'
            ];
            $_SESSION['user'] = $user;

            $this->redirect('dashboard');
        } elseif ($jlm2 > 0) {
            $data = $data2[0];
            $pt = $this->user->showWhere(array('id_user' => $data['user_id']));

            $user = [
                'id' => $data['id_karyawan'],
                'user_id' => $data['user_id'],
                'nama_perusahaan' => $pt[0]['nama_perusahaan'],
                'nama' => $data['nama_karyawan'],
                'kota' => $pt[0]['kota'],
                'username' => $data['username'],
                'password' => $data['password'],
                'role' => $data['role'],
                'photo' => $data['photo']
            ];

            $_SESSION['user'] = $user;

            $this->redirect('dashboard');
        } else {
            $view = $this->view('dashboard/login');
            $view->bind('msg', 'Username atau Password salah!');
        }
    }
}
