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

        if(isset($_POST['addBarang'])){
            $data = [
                'kode_transaksi' => $this->input->post('nomor_transaksi'),
                'id_barang' => $this->input->post('kode_barang'),
                'id_user' => $this->input->post('nama_pegawai'),
                'id_pembeli' => NULL,
                'jumlah_beli' => $this->input->post('jumlah_beli'),
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi')

            ];
            var_dump($data);
            die;
            redirect('form_transaksi');
        }
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $this->data);
            $this->load->view('templates/navbar', $this->data);
            $this->load->view('transaksi/index', $this->data, $data);

    }

}
?>