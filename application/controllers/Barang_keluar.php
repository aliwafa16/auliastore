<?php
class Barang_keluar extends CI_Controller{

    private $data=[];
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Barang_model');
        $this->load->model('Barang_keluar_model');
        $this->load->model('Menu_model');
        $this->load->library('form_validation');

        $this->data['menu']=$this->Menu_model->getUserMenu();
        $this->data['user']=$this->Menu_model->getUserData();
    }

    public function index(){
        $data['judul'] = 'Barang keluar';

        $data['barang_keluar'] = $this->Barang_keluar_model->getAllBarangKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/navbar', $this->data);
        $this->load->view('barang_keluar/index', $data);
        $this->load->view('templates/footer');
    }
}

?>