<?php 
class Form_transaksi extends CI_Controller{
    private $data=[];
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        // $this->load->model('Form_transaksi_model');
        $this->load->model('Barang_model');
        $this->load->model('Menu_model');

        $this->data['user']=$this->Menu_model->getUserData();
        $this->data['menu']=$this->Menu_model->getUserMenu();
    }

    public function index(){
        $data['judul']='Form transaksi';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/navbar', $this->data);
        $this->load->view('transaksi/index');
        $this->load->view('templates/footer');
    }

}
?>