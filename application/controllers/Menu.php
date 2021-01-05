<?php 
class Menu extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Menu_model');    
    }

    public function index(){
        $data['judul'] = 'Menu management';
        $data['user'] = $this->Menu_model->getUserData();
        $data['menu'] = $this->Menu_model->getUserMenu();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar',$data);
        $this->load->view('menu/index');
        $this->load->view('templates/footer');
    }
}
?>