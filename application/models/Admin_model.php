<?php
class Admin_model extends CI_Model{
    public function getUserData(){
        return $this->db->get_where('user',['email_user' => $this->session->userdata('email_user')])->row_array();
    }

    public function getUserMenu(){
        $this->db->select('user_menu.id_menu,user_menu.nama_menu');
        $this->db->from('user_menu');
        $this->db->join('user_accessmenu','user_menu.id_menu = user_accessmenu.id_menu');
        $this->db->where('user_accessmenu.id_role', $this->session->userdata('id_role'));
        $this->db->order_by('user_accessmenu.id_menu','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function getUserSubmenu(){
    //     $this->db->select('*');
    //     $this->db->from('user_submenu');
    //     $this->db->join('user_menu','user_menu.id_menu = user_submenu.id_menu');
    //     $this->db->where('user_submenu.id_menu');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

}
?>