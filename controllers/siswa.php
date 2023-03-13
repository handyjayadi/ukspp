<?php 
class siswa extends Controller
{
    public function index()
    {
        $data['judul']= 'Siswa';
        $data['siswa']= $this->model('modelsiswa')->getallsiswa();
        $this->view('template/sidebar');
        $this->view('template/header',$data);       
        $this->view('siswa/index',$data);
        $this->view('template/footer');
    }

    public function insertsiswa()
    {
        $data['judul']= 'Insert Siswa';
        $data['kelas']= $this->model('kelasmodel')->getallkelas();
        $this->view('template/sidebar');
        $this->view('template/header',$data);       
        $this->view('siswa/insertsiswa',$data);
        $this->view('template/footer');
    }


}

?>