<?php
class Menu extends CI_Controller
{
    private $data = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Menu_model');
        $this->load->library('form_validation');

        $this->data['user'] = $this->Menu_model->getUserData();
        $this->data['menu'] = $this->Menu_model->getUserMenu();
        $this->data['user_menu'] = $this->Menu_model->getAllMenu();
    }

    public function index()
    {
        $data['judul'] = 'Menu management';
        // $data['user'] = $this->Menu_model->getUserData();
        // $data['menu'] = $this->Menu_model->getUserMenu();
        // $data['user_menu'] = $this->Menu_model->getAllMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/navbar', $this->data);
        $this->load->view('menu/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function tambahMenu()
    {
        $data['judul'] = 'Menu management';
        // $data['user'] = $this->Menu_model->getUserData();
        // $data['menu'] = $this->Menu_model->getUserMenu();
        // $data['user_menu'] = $this->Menu_model->getAllMenu();


        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|is_unique[user_menu.nama_menu]', [
            'is_unique' => 'Menu sudah ada !',
            'required' => 'Nama Menu wajib diisi !'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $this->data);
            $this->load->view('templates/navbar', $this->data);
            $this->load->view('menu/index', $this->data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->tambahMenu();
            $this->session->set_flashdata('flashdata', 'Menu berhasil ditambahkan !');
            redirect('menu');
        }
    }

    public function hapus($id_menu)
    {
        $this->Menu_model->hapusMenu($id_menu);
        $this->session->set_flashdata('flashdata', 'Menu berhasil dihapus !');
        redirect('menu');
    }

    public function getEditMenu()
    {
        $id_menu = $this->input->post('id');
        echo json_encode($this->Menu_model->getMenuByID($id_menu));
    }

    public function edit()
    {
        $data['judul'] = 'Menu management';

        $this->form_validation->set_rules('nama_menu', 'Nama menu', 'required', [
            'required' => 'Nama menu wajib diisi !'
        ]);

        $id_menu = $this->input->post('id_menu');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flashdata', 'Menu gagal diedit');
            redirect('menu');
        } else {
            $this->Menu_model->editMenu($id_menu);
            $this->session->set_flashdata('flashdata', 'Menu berhasil diedit !');
            redirect('menu');

            // var_dump($id_menu);
            // die;
        }
    }
}
