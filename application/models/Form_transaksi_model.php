<?php 
class Form_transaksi_model extends CI_Model{

    // public function addBarangtoTable($data){
    //     return $this->db->get_where('barang',['id_barang'=>$data['id_barang']])->row_array();
    // }

    public function addSaleToDB(){
        $data=[
            'nomor_transaksi' => $this->input->post('nomor_transaksi'),
            'id_barang' => $this->input->post('kode_barang'),
            'id_user' => $this->input->post('id_pegawai'),
            'id_pembeli' => 0,
            'quantity' => $this->input->post('jumlah_beli'),
            'diskon' => 0,
            'tanggal' => $this->input->post('tanggal_transaksi')
        ];

        $this->db->insert('sale_transaksi', $data);
    }

    public function getDataSale(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('sale_transaksi', 'barang.id_barang=sale_transaksi.id_barang');
        $this->db->join('user', 'user.id_user=sale_transaksi.id_user');
        $this->db->order_by('sale_transaksi.id_sale_transaksi', 'ASC');

        return $this->db->get()->result_array();

    }

    public function hapusDataSale($id){
        $this->db->where('id_sale_transaksi', $id);
        $this->db->delete('sale_transaksi');
    }

    public function getSaleTransaksiByID($id){
        return $this->db->get_where('sale_transaksi',['id_sale_transaksi' => $id ])->row_array();
    }

    public function editSaleTransaksi($id, $diskon){
        $data=[
            'id_sale_transaksi' => $id,
            'nomor_transaksi' => $this->input->post('nomor_transaksi_modal'),
            'id_barang' => $this->input->post('kode_barang_modal'),
            'id_user' => $this->input->post('id_user_modal'),
            'id_pembeli' => $this->input->post('id_user_modal'),
            'quantity' => $this->input->post('quantity_modal'),
            'diskon' => $diskon,
            'tanggal' => $this->input->post('tanggal_modal')

        ];
        $this->db->where('id_sale_transaksi', $id);
        $this->db->update('sale_transaksi', $data);
    }

    public function deleteAllDataSale(){
        $this->db->empty_table('sale_transaksi');
    }

}
?>