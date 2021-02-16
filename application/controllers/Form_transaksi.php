<?php 
class Form_transaksi extends CI_Controller{
    private $data=[];
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Form_transaksi_model');
        $this->load->model('Barang_model');
        $this->load->model('Menu_model');

        $this->data['user']=$this->Menu_model->getUserData();
        $this->data['menu']=$this->Menu_model->getUserMenu();
    }

    public function index(){
        $data['judul']='Form transaksi';
        $data['kode_barang'] = $this->Barang_model->getAllKodeBarang();
        $data['transaksi'] = $this->Form_transaksi_model->getDataSale();
        $data['tanggal_now'] = date('j F Y');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/navbar', $this->data);
        $this->load->view('transaksi/index', $this->data, $data);
        $this->load->view('templates/footer');

                // if($this->input->get('addBarang')){
        //     $data = [
        //         'kode_transaksi' => $this->input->get('nomor_transaksi'),
        //         'id_barang' => $this->input->get('kode_barang'),
        //         'id_user' => $this->input->get('id_pegawai'),
        //         'id_pembeli' => NULL,
        //         'jumlah_beli' => $this->input->get('jumlah_beli'),
        //         'tanggal_transaksi' => $this->input->get('tanggal_transaksi')

        //     ];

        //     $data['transaksi'] = $this->Form_transaksi_model->addBarangtoTable($data);

        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $this->data);
        //     $this->load->view('templates/navbar', $this->data);
        //     $this->load->view('transaksi/index', $this->data, $data);
        //     $this->load->view('templates/footer');
        // }

    }

    public function addSaleToDB(){
        $this->Form_transaksi_model->addSaleToDB();
        redirect('form_transaksi');
    }

    public function hapus($id){
        $this->Form_transaksi_model->hapusDataSale($id);
        redirect('form_transaksi');
    }

    public function getEditSaleTransaksi(){
        $id_sale_transaksi = $this->input->post('id_sale_transaksi');
        $data = $this->Form_transaksi_model->getSaleTransaksiByID($id_sale_transaksi);
        echo json_encode($data);
    }

    public function edit(){
        $diskon=0;
        $id = $this->input->post('id_sale_transaksi');
        $diskon = $this->input->post('diskon_modal');

        $this->Form_transaksi_model->editSaleTransaksi($id, $diskon);
        redirect('form_transaksi');

    }

    public function hapusSaleTransaksi(){
        $this->Form_transaksi_model->deleteAllDataSale();
        redirect('form_transaksi');
    }

    public function prosesTransaksi(){
        $data['bayar'] = $this->Form_transaksi_model->getDataSale();
        $this->load->view('transaksi/struk', $data);
    }

}
?>