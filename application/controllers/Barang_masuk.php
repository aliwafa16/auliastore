<?php 
class Barang_masuk extends CI_Controller{
    
    private $data=[];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Menu_model');
        $this->load->model('Barang_masuk_model');
        $this->load->model('Barang_model');
        $this->load->library('form_validation');

        $this->data['user']=$this->Menu_model->getUserData();
        $this->data['menu']=$this->Menu_model->getUserMenu();
    }

    public function index(){
        $data['judul']='Barang masuk';
        $data['barang_masuk']=$this->Barang_masuk_model->getAllBarangMasuk();
        $data['kode_barang']=$this->Barang_masuk_model->getAllKodeBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/navbar', $this->data);
        $this->load->view('barang_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $id_barang = $this->input->post('kode_barang');
        intval($quanty = $this->input->post('jumlah_barang_masuk'));
        intval($stok_now = $this->Barang_model->cekStokByID($id_barang));
        intval($stok_total = $quanty + $stok_now);
        
        $this->Barang_model->updateStokIN($id_barang, $stok_total);
        $this->Barang_masuk_model->tambahBarangMasuk();
        
        $this->session->set_flashdata('flashdata','Data barang masuk berhasil ditambahkan !');

var_dump($stok_total);
die;
        redirect('barang_masuk');

    }

    public function hapus($id_barang_masuk){
        $this->Barang_masuk_model->hapusBarangMasuk($id_barang_masuk);
        $this->session->set_flashdata('flashdata', 'Data barang masuk berhasil dihapus !');
        redirect('barang_masuk');
    }

    public function getEditBarangMasuk(){
        $id_barang_masuk = $this->input->post('id_barang_masuk');
       echo json_encode($this->Barang_masuk_model->getBarangMasukByID($id_barang_masuk)) ;
    }

    public function getTanggalBarangMasuk(){
        $this->input->post('id_barang_masuk');
        $tanggal_barang_masuk=date('d/m/Y');
        echo json_encode($tanggal_barang_masuk);
    }

    public function edit(){
        $id_barang_masuk = $this->input->post('id_barang_masuk');

        $this->Barang_masuk_model->editBarangMasuk($id_barang_masuk);
        $this->session->set_flashdata('flashdata', 'Data barang masuk berhasil diedit !');
        redirect('barang_masuk');
    }
}
?>