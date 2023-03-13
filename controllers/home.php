<?php 
class Home extends Controller{

    

    public function index(){

        if(! isset($_SESSION['user'])){
            header('Location: '.BASEURL. 'Login');
        }

        $data['judul'] = 'Dashboard';
        $this->view('template/sidebar');
        $this->view('template/header',$data);       
        $this->view('home/index',$data);
        $this->view('template/footer');
    }
}

?>