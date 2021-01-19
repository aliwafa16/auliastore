<?php 
class Barang_masuk extends CI_Controller{
    
    private $data=[];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Menu_model');
        $this->load->model('Barang_masuk_model');
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
        $this->Barang_masuk_model->tambahBarangMasuk();
        $this->session->set_flashdata('flashdata','Data barang masuk berhasil ditambahkan !');
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
        $tanggal_masuk=date('d/m/Y');
        echo json_encode($tanggal_masuk);

        
    }
}
?>