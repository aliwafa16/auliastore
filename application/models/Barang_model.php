<?php 
class Barang_model extends CI_Model{
    public function getAllBarang(){

        return $this->db->get('barang')->result_array();
    }

    // public function countAllBarang(){
    //     return $this->db->count_all('barang');
    // }

    public function tambahBarang(){
        $data=[
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'stok_barang' => $this->input->post('stok_barang'),
            'harga_barang' => $this->input->post('harga_barang')
        ];

        $this->db->insert('barang',$data);
    }

    public function cekKodeBarang(){
        $this->db->select_max('kode_barang');
        return $this->db->get('barang')->row_array();
    }

    public function hapusBarang($id_barang){
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
    }

    public function getBarangByID($id_barang){
        return $this->db->get_where('barang', ['id_barang'=>$id_barang])->row_array();
    }

    public function editBarang($id_barang){


        $data=[
            'id_barang' => $this->input->post('id_barang', true),
            'kode_barang' => $this->input->post('kode_barang', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'stok_barang' => $this->input->post('stok_barang', true),
            'harga_barang' => $this->input->post('harga_barang', true)
        ];
        $this->db->where('id_barang',$id_barang);
        $this->db->update('barang', $data);
    }
}
?>