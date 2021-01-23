<?php 
class Barang_keluar_model extends CI_Model{
    public function getAllBarangKeluar(){
        $this->db->order_by('barang_keluar', 'ASC');
        return $this->db->get('barang_keluar')->result_array();
    }
}
?>