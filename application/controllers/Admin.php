<?php
class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model');
    }
    public function index(){
        $data['judul']='Dashboard';
        $data['user'] = $this->Admin_model->getUserData();
        $data['menu'] = $this->Admin_model->getUserMenu();
        // $data['submenu'] = $this->Admin_model->getUserSubmenu();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar',$data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
?>