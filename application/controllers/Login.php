<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index(){
        $this->load->view('berita/login');
    }

    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (!$this->form_validation->run()){
            redirect('/login');
        }
        else{
            $cek = $this->Login_model->cek_login($username, $password);
            if($cek->num_rows() == 1){
                foreach($cek->result() as $row){
                    $sess_data['username'] = $row->username;

                    $this->session->set_userdata($sess_data);
                }

                redirect('/berita/berita_');
            }else{
                redirect('/login');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/login');
    }
}
