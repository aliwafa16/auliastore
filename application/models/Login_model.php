<?php 
class Login_model extends CI_Model{

    public function userRegistrasi(){
        $data=[
            'nama_user' => $this->input->post('nama'),
            'email_user' => $this->input->post('email'),
            'password_user' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
            'image_user' => 'default.jpg',
            'id_role' => 2,
            'is_activate' => 1,
            'date' => time()
        ];
        $this->db->insert('user', $data);
    }

    public function userEmail($email){
        return $this->db->get_where('user',['email_user'=>$email])->row_array();
    }
}


?>