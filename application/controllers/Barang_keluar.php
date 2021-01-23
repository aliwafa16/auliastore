<?php
class Barang_keluar extends CI_Controller{

    private $data=[];
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Barang_model');
        $this->load->model('Barang_keluar_model');
        $this->load->model('Menu_model');
        $this->load->library('form_validation');

        $this->data['menu']=$this->Menu_model->getUserMenu();
        $this->data['user']=$this->Menu_model->getUserData();
    }

    public function index(){
        $data['judul'] = 'Barang keluar';
        $data['barang_keluar'] = $this->Barang_keluar_model->getAllBarangKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/navbar', $this->data);
        $this->load->view('barang_keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $data['judul'] = 'Form Tambah Barang Keluar';
        $data['kode_barang'] = $this->Barang_model->getAllKodeBarang();

        $this->form_validation->set_rules('tanggal_barang_keluar', 'Tanggal', 'required|trim',[
            'required' => 'Tanggal barang keluar wajib diisi !'
        ]);
        $this->form_validation->set_rules('kode_barang_keluar', 'Kode Barang', 'required|trim',[
            'required' => 'Kode barang wajib diisi !'
        ]);
        $this->form_validation->set_rules('jumlah_barang_keluar', 'Jumlah Barang', 'required|trim',[
            'required' => 'Jumlah barang wajib diisi !'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim',[
            'required' => 'Keterangan wajib pilih !'
        ]);

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $this->data);
            $this->load->view('templates/navbar', $this->data);
            $this->load->view('barang_keluar/tambah', $data);
            $this->load->view('templates/footer');
        }else{
           $id_barang=$this->input->post('kode_barang');
           $quanty = $this->input->post('jumlah_barang_keluar');
           $stok_now = $this->Barang_model->cekStokByID($id_barang);

           $stok_total = intval($stok_now['stok_barang'])-intval($quanty);
           $this->Barang_model->updateStokIN($id_barang, $stok_total);

            $this->Barang_keluar_model->tambahBarangKeluar();
            $this->session->set_flashdata('flashdata', 'Data barang keluar berhasil ditambahkan !');

            redirect('barang_keluar');
        }
        
    }

    public function hapus($id_barang_keluar, $id_barang){
        $id_barang=$this->uri->segment(4);
        $quanty_klr = $this->Barang_keluar_model->cekQuantyBarangKeluar($id_barang_keluar);
        $stok_now = $this->Barang_model->cekStokByID($id_barang);

        $stok_total = intval($stok_now['stok_barang'])+intval($quanty_klr['jumlah_barang_keluar']);
        $this->Barang_model->updateStokIN($id_barang, $stok_total);

        $this->Barang_keluar_model->hapusBarangKeluar($id_barang_keluar);
        $this->session->set_flashdata('flashdata', 'Data barang keluar berhasil dihapus !');
        redirect('barang_keluar');

    }


}

?>