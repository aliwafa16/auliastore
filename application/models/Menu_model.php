<?php 
class Menu_model extends CI_Model{
    public function getUserData(){
       return $this->db->get_where('user',['email_user' => $this->session->userdata('email_user')])->row_array();
    }

    public function getUserMenu(){
        $this->db->select('user_menu.id_menu,user_menu.nama_menu');
        $this->db->from('user_menu');
        $this->db->join('user_accessmenu', 'user_menu.id_menu = user_accessmenu.id_menu');
        $this->db->where('user_accessmenu.id_role', $this->session->userdata('id_role'));
        $this->db->order_by('user_accessmenu.id_menu', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllMenu(){
        return $this->db->get('user_menu')->result_array();
    }

    public function tambahMenu(){
        $data=[
            'nama_menu' => $this->input->post('nama_menu',true)
        ];
        $this->db->insert('user_menu', $data);
    }

    public function hapusMenu($id_menu){
        $this->db->where('id_menu',$id_menu);
        $this->db->delete('user_menu');
    }
}



?>