<?php
class LoginController extends Controller
{
    function __construct()
    {
        $this->model('admin');
    }

    public function index()
    {
        $this->view('admin/login');
    }

    public function check()
    {
        $username = $this->validate($_POST['username']);
        $password = md5($this->validate($_POST['password']));

        $query = $this->admin->selectWhere(array('username' => $username, 'password' => $password));
        $data = $this->admin->getResult($query);
        $jlm = $this->admin->getRows($query);

        if ($jlm > 0) {
            $data = $data[0];
            $super_admin = [
                'id' => $data['id'],
                'nama' => $data['nama_legkap'],
                'username' => $data['username'],
                'password' => $data['password']
            ];
            $_SESSION['super_admin'] = $super_admin;

            $this->redirect('admin');
        } else {
            $view = $this->view('admin/login');
            $view->bind('msg', 'Username atau Password salah!');
        }
    }
}
