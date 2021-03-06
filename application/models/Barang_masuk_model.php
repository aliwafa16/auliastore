<?php 
class Barang_masuk_model extends CI_Model{
    public function getAllBarangMasuk(){

        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang_masuk.id_barang=barang.id_barang');
        $this->db->join('tipe_barang','barang_masuk.id_tipe_barang=tipe_barang.id_tipe_barang');
        $this->db->order_by('barang_masuk.kode_barang_masuk', 'ASC');

        return $this->db->get()->result_array();
    
    }

    public function tambahBarangMasuk(){
        $data=[
            'kode_barang_masuk' => $this->input->post('kode_barang_masuk'),
            'tanggal_barang_masuk' => $this->input->post('tanggal_barang_masuk'),
            'jumlah_barang_masuk' => $this->input->post('jumlah_barang_masuk'),
            'harga_barang_masuk' => $this->input->post('harga_barang_masuk'),
            'id_barang' => $this->input->post('kode_barang'),
            'id_tipe_barang' => $this->input->post('tipe_barang')

        ];

        $this->db->insert('barang_masuk', $data);
    }

    public function hapusBarangMasuk($id_barang_masuk){
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->delete('barang_masuk');
    }

    public function cekQuantyBarangMasuk($id_barang_masuk){
        $this->db->select('jumlah_barang_masuk');
        return $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id_barang_masuk])->row_array();
    }

    public function getBarangMasukByID($id_barang_masuk){
        return $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id_barang_masuk])->row_array();
    }

    public function editBarangMasuk($id_barang_masuk){
        $data=[
            'id_barang_masuk' => $id_barang_masuk,
            'kode_barang_masuk' => $this->input->post('kode_barang_masuk'),
            'id_barang' => $this->input->post('kode_barang'),
            'jumlah_barang_masuk' => $this->input->post('jumlah_barang_masuk'),
            'id_tipe_barang' => $this->input->post('tipe_barang'),
            'harga_barang_masuk' => $this->input->post('harga_barang_masuk')
        ];

        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->update('barang_masuk', $data);
    }
}
?>
