<?php 
class Barang_keluar_model extends CI_Model{
    public function getAllBarangKeluar(){
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang_keluar.id_barang=barang.id_barang');
        $this->db->order_by('barang_keluar.kode_barang_keluar', 'ASC');
        return $this->db->get()->result_array();
    }

    public function tambahBarangKeluar(){
        $data=[
            'tanggal_barang_keluar' => $this->input->post('tanggal_barang_keluar'),
            'kode_barang_keluar' => $this->input->post('kode_barang_keluar'),
            'id_barang' => $this->input->post('kode_barang'),
            'jumlah_barang_keluar' => $this->input->post('jumlah_barang_keluar'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('barang_keluar', $data);
    }

    public function cekQuantyBarangKeluar($id_barang_keluar){
        $this->db->select('jumlah_barang_keluar');
        return $this->db->get_where('barang_keluar', ['id_barang_keluar'=>$id_barang_keluar])->row_array();
    }

    public function hapusBarangKeluar($id_barang_keluar){
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->delete('barang_keluar');
    }
}
?>