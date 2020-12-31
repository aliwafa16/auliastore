<?php
class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model');
    }
    public function index(){
        $data['judul']='Auliastore - Halaman admin';
        $data['user'] = $this->Admin_model->getUserData();
        $this->load->view('templates/admin_header',$data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar',$data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    
    }
}
?>