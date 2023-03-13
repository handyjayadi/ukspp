<?php 
class pengguna extends Controller{

    public function index(){

        $data['judul'] = 'pengguna';
        $data['user'] = $this->model('pengguna_model')->getPengguna();
        $this->view('template/sidebar');
        $this->view('template/header',$data);       
        $this->view('pengguna/index',$data);
        $this->view('template/footer');
    }

    public function tambahpengguna()
    {
        if ($this->model('pengguna_model')->tambahpengguna($_POST) > 0) {
            header('Location:'. BASEURL .'pengguna');
        }else{
            header('Location:'. BASEURL .'pengguna');
        }
    }

    public function hapususer($id)
    {
        if ($this->model('pengguna_model')->hapususer($id) > 0) {
            header('Location: '. BASEURL . 'pengguna');
        }else {
            header('Location: '. BASEURL . 'pengguna');
        }
    }

    public function editpengguna($id)
    {
        $user = $this->model('pengguna_model')->idpengguna($id);
        
        $data['judul'] = 'Ubah Pengguna'; 
        $data['user']= $user;

        $this->view('template/sidebar');
        $this->view('template/header',$data);
        $this->view('siswa/updateuser', $data);
        $this->view('template/footer');
    }

    public function updateuser()
    {
        
        $this->model('pengguna_model')->updateuser($_POST);

        header('Location:'.BASEURL.'pengguna');
        die;
    } 
}

?>