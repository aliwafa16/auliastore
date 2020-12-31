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
        $this->load->view('templates/pegawai_header', $data);
        $this->load->view('templates/pegawai_sidebar');
        $this->load->view('templates/pegawai_navbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/pegawai_footer');
    }
}
?>