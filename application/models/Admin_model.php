<?php
class Admin_model extends CI_Model{
    public function getUserData(){
        return $this->db->get_where('user',['email_user' => $this->session->userdata('email_user')])->row_array();
    }

}
?>