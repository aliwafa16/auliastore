<?php

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_model');
        $this->load->library('session');
    }

    public function index(){
        $data['judul']='Halaman Form Login';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function registrasi(){
        $data['judul']='Halaman Form Registrasi';

        $this->form_validation->set_rules('nama','Nama', 'required|trim',[
            'required' => 'Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email_user]',[
            'required' => 'Email wajib diisi!',
            'valid_email' => 'Format email salah!',
            'is_unique' => 'Email sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password wajib diisi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('admin/registrasi');
            $this->load->view('templates/footer');
        }else{
            $this->Login_model->userRegistrasi();
            $this->session->set_flashdata('flashdata', 'berhasil');
            redirect('login');
        }
        
    }

}


?>