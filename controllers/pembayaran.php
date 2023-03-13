<?php 
class pembayaran extends Controller{

    public function index()
    {
        $data['pembayaran'] = $this->model('pembayaran_model')->getallpembayaran();
        $data['judul'] = 'Pembayaran';
        $this->view('template/sidebar');
        $this->view('template/header',$data);
        $this->view('pembayaran/index',$data);
        $this->view('template/footer');

    }

    public function createpembayaranhal()
    {
        $data['judul'] = 'Tambah Pembayaran';
        $this->view('template/sidebar');
        $this->view('template/header',$data);
        $this->view('pembayaran/createpembayaran');
        $this->view('template/footer');

    }


    public function editpembayaranhal($id)
    {
        $data['judul'] = 'Edit Pembayaran';
        $data['id'] = $this->model('pembayaran_model')->getidpembayaran($id);
        $this->view('template/sidebar');
        $this->view('template/header',$data);
        $this->view('pembayaran/editpembayaran',$data);
        $this->view('template/footer');
    }

    public function createpembayaran()
    {
        if ($this->model('pembayaran_model')->createpembayaran($_POST) > 0 ) {
            header('Location: '.BASEURL.'pembayaran');
            # code...
        }else{
            header('Location: '.BASEURL.'pembayaran');
        }
    }

    public function editpembayaran()
    {
        if ($this->model('pembayaran_model')->editpembayaran($_POST) > 0 ) {
            header('Location: '.BASEURL.'pembayaran');
            # code...
        }else{
            header('Location: '.BASEURL.'pembayaran');
        }
    }
    
    public function hapuspembayaran($id)
    {
        if ($this->model('pembayaran_model')->hapuspembayaran($id) > 0 ) {
            header('Location: '.BASEURL.'pembayaran');
            # code...
        }else{
            header('Location: '.BASEURL.'pembayaran');
        }
    }

}

?>