<?php 
class List_barang extends CI_Controller{
    private $data = [];

    public function __construct()
    {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('Menu_model');
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->data['user'] = $this->Menu_model->getUserData();
        $this->data['menu'] = $this->Menu_model->getUserMenu();
        
    }

    public function index(){
        $data['judul']='List barang';
        
        // config pagination
        // $config['base_url'] = base_url('list_barang').'/index/';
        // $config['total_rows'] = $this->Barang_model->countAllBarang();
        // $config['per_page'] = 10;
        // $data['data_start'] = $this->uri->segment(3);
        $data['barang'] = $this->Barang_model->getAllBarang();

        // style pagination
        // $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        // $config['full_tag_close'] = '</ul></nav>';

        // $config['first_link'] = 'First';
        // $config['first_tag_open'] = '<li class="page-item">';
        // $config['first_tag_close'] = '</li>';
        
        // $config['last_link'] = 'Last';
        // $config['last_tag_open'] = '<li class="page-item">';
        // $config['last_tag_close'] = '</li>';

        // $config['next_link'] = '&raquo';
        // $config['next_tag_open'] = '<li class="page-item">';
        // $config['next_tag_close'] = '</li>';

        // $config['prev_link'] = '&laquo';
        // $config['prev_tag_open'] = '<li class="page-item">';
        // $config['prev_tag_close'] = '</li>';
        
        // $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        // $config['cur_tag_close'] = '</a></li>';

        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';

        // $config['attributes'] = array('class' => 'page-link');



        // // inisialisasi pagination
        // $this->pagination->initialize($config);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/navbar', $this->data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function getKodeBarang(){
        $cek_kode = $this->Barang_model->cekKodeBarang();
        $nourut = intval(substr($cek_kode['kode_barang'], 3));
        $data['kode_barang'] = $nourut + 1;
        echo json_encode($data);
    }

    public function tambah(){
        $this->Barang_model->tambahBarang();
        $this->session->set_flashdata('flashdata','Data barang berhasil ditambahkan !');
        redirect('list_barang');
    }

    public function hapus($id_barang){
        $this->Barang_model->hapusBarang($id_barang);
        $this->session->set_flashdata('flashdata', 'Data barang berhasil dihapus !');
        redirect('list_barang');
    }

    public function getEditBarang(){
        $id_barang = $this->input->post('id_barang');
        echo json_encode($this->Barang_model->getBarangByID($id_barang));
    }

    public function edit(){

        $id_barang = $this->input->post('id_barang');
        $this->Barang_model->editBarang($id_barang);
        $this->session->set_flashdata('flashdata', 'Data barang berhasil diedit !');
        redirect('list_barang');
    }

}
?>