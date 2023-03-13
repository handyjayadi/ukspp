<?php 
class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('login/index',$data);
    }

    public function authpengguna()
    {
        $datauser = $this->model('pengguna_model')->selectpenggunalogin($_POST);
        $password = password_verify($_POST['password'],$datauser['password']);
        if ($datauser != null && $password) {
            if (isset($data['password'])) {
                unset($data['password']);
            }

            $_SESSION['user'] = $datauser;
            if ($_SESSION['user']['role'] == 2) {
                header('Location: '. BASEURL .'kelas');
            }elseif ($_SESSION['user']['role'] == 1) {
                header('Location: '. BASEURL .'home');
            }elseif ($_SESSION['user']['role'] == 3) {
                header('Location: '. BASEURL .'siswa');
            }
        
        }else {
            header('Location: '. BASEURL .'Login');
        }

    }

    public function logout()
    {
        $user = $_SESSION['user'];

        if($user != null){
            unset($_SESSION['user']);
            header('Location: '.BASEURL.'Login');
        }

    }
}
?>