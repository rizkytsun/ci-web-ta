<?php

class Login_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function cek_login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }
}