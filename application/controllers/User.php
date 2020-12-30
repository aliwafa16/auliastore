<?php
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
    }
    public function index(){
        $data['judul']='Auliastore - Halaman admin';
        $data['user'] = $this->User_model->getUserData();
        $this->load->view('user/index',$data);
    }
}
?>