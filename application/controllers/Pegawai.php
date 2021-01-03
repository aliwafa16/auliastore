<?php
class Pegawai extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Pegawai_model');
    }

    public function index(){
        $data['judul'] = 'Auliastore - Halaman pegawai';
        $data['user'] = $this->Pegawai_model->getUserData();
        $data['menu'] = $this->Pegawai_model->getUserMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }
}
?>