<?php 
class Menu extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Menu management';
        $data['user'] = $this->Menu_model->getUserData();
        $data['menu'] = $this->Menu_model->getUserMenu();
        $data['user_menu'] = $this->Menu_model->getAllMenu();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar',$data);
        $this->load->view('menu/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambahMenu(){
        $data['judul'] = 'Menu management';
        $data['user'] = $this->Menu_model->getUserData();
        $data['menu'] = $this->Menu_model->getUserMenu();
        $data['user_menu'] = $this->Menu_model->getAllMenu();


        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|is_unique[user_menu.nama_menu]',[
            'is_unique' => 'Menu sudah ada !'
        ]);

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Menu_model->tambahMenu();
            $this->session->set_flashdata('flashdata','Menu berhasil ditambahkan !');
            redirect('menu');
        }
    }

    public function hapus($id_menu){

        $this->Menu_model->hapusMenu($id_menu);
        $this->session->set_flashdata('flashdata', 'Menu berhasil dihapus !');
        redirect('menu');

    }

}
?>