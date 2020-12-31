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
        $this->form_validation->set_rules('email','Email','required|trim|valid_email',[
            'required' => 'Email wajib diisi!',
            'valid_email' => 'Format email salah!'
        ]);
        $this->form_validation->set_rules('password', 'Password','required|trim',[
            'required' => 'Password wajib diisi!',
        ]);

        if($this->form_validation->run()==FALSE){
            $data['judul']='Halaman Form Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/footer');
        }else{
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Login_model->userEmail($email);

        if($user){
            if($user['is_activate']==1){
                if(password_verify($password, $user['password_user'])){
                    $data=[
                        'email_user' => $user['email_user'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    if($user['id_role']==1){
                        redirect('admin');
                    }
                    redirect('pegawai');
                }else{
                    $this->session->set_flashdata('flashdata', 'Password salah');
                    redirect('login');
                }
            }else{
                $this->session->set_flashdata('flashdata', 'Email belum diaktivasi');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('flashdata', 'Email belum terdaftar');
            redirect('login');
        }

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
            $this->load->view('auth/registrasi');
            $this->load->view('templates/footer');
        }else{
            $this->Login_model->userRegistrasi();
            $this->session->set_flashdata('flashdata', 'Registrasi berhasil. Silahkan Login!');
            redirect('login');
        }
        
    }

    public function logout(){
        $this->session->unset_userdata('email_user');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('flashdata', 'Logout berhasil');
        redirect('login');
    }

}


?>