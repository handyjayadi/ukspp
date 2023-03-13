<?php 
class kelas extends Controller{

    public function index()
    {
        if(! isset($_SESSION['user'])){
            header('Location: '.BASEURL. 'Login');
        }

        $data['judul'] = 'Kelas';
        $data['kelas'] = $this->model('kelasmodel')->getallkelas();
        $this->view('template/sidebar');
        $this->view('template/header',$data);       
        $this->view('kelas/kelas',$data);
        $this->view('template/footer');
    }

    public function insertkelas()
    {
        if(! isset($_SESSION['user'])){
            header('Location: '.BASEURL. 'Login');
        }
        
        $data['judul'] = 'Insert Kelas';
        $this->view('template/sidebar');
        $this->view('template/header',$data);       
        $this->view('kelas/insertkelas',$data);
        $this->view('template/footer');


    }

    public function editkelas($id)
    {
        if(! isset($_SESSION['user'])){
            header('Location: '.BASEURL. 'Login');
        }
        
        $data['judul'] = 'Edit Kelas';
        $data['kelas'] = $this->model('kelasmodel')->idkelas($id);
        $this->view('template/sidebar');
        $this->view('template/header',$data);       
        $this->view('kelas/editkelas',$data);
        $this->view('template/footer');


    }

    public function storekelas()
    {
        if ($this->model('modelsiswa')->insertkelas($_POST) > 0) {
            header('Location: '.BASEURL.'kelas/insertkelas');
        }
    }

    public function hapuskelas($id)
    {
        if ($this->model('kelasmodel')->hapuskelas($id) > 0) {
            header('Location: '. BASEURL .'kelas');
        }
    }

    public function editkelass()
    {
        if ($this->model('kelasmodel')->editkelas($_POST)) {
            header('Location: '. BASEURL .'kelas');
        }
    }

}

?>