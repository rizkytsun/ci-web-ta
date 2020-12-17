<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->library('session');

        if(!$this->session->userdata('username')){
            redirect('/login');
        }
    }

	public function index(){
        $this->load->view('me');        
    }

    public function tambah_data(){
        $this->form_validation->set_rules('Barang', 'Barang', 'required');
        $this->form_validation->set_rules('Harga', 'Harga', 'required');
        
        if (!$this->form_validation->run()){
            redirect('/berita/berita_');
        }
        else{
            $barang = $this->input->post('Barang');
            $harga = $this->input->post('Harga');
            $kategori = $this->input->post('Kategori');

            $data = array(
                'barang'     => $barang,
                'harga_barang'   => $harga,
                'id_kategori'  => $kategori
            );

            $this->Berita_model->tambah($data);

            redirect('/berita/berita_');
        }
    }
    
    
    public function berita_() {
        $data = array(
            'title'     => 'Tugas Akhir Pemrograman WEB 2',
            'heading'   => 'Mohamad Rizky Reynaldy - 181116056',
            'message'   => 'List Berita',
            'konten'    => $this->Berita_model->daftar(),
            'kategori'  => $this->Berita_model->daftarKategori()
        );

        $this->load->view('templates/index.php', $data);
    }

    public function hapus_berita() {
        $id = $this->input->get('id');
        $this->Berita_model->hapus($id);

        redirect('/berita/berita_');
    }

    public function edit_berita() {
        $data = array(
            'id'     => $this->input->get('id'),
            'kategori'  => $this->Berita_model->daftarKategori()
        );

        $this->load->view('berita/view_edit', $data);
    }

    public function edit_berita_proses() {
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        
        if (!$this->form_validation->run()){
            redirect('/berita/berita_');
        }
        else{
            $id = $this->input->post('id');
            $barang = $this->input->post('barang');
            $harga = $this->input->post('harga');
            $kategori = $this->input->post('kategori');

            $data = array(
                'barang'     => $barang,
                'harga_barang'   => $harga,
                'id_kategori'  => $kategori
            );

            $this->Berita_model->edit($id, $data);

            redirect('/berita/berita_');
        }
    }

    public function tambahKategori() {
        $this->load->view('berita/tambahKategori'); 
    }

    public function tambahKategoriProses() {
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required');
        
        if (!$this->form_validation->run()){
            
            redirect('/berita/tambahKategori');
        }
        else{
            $kategori = $this->input->post('Kategori');

            $data = array(
                'kategori'     => $kategori,
            );

            $this->Berita_model->tambahKategori($data);

            redirect('/berita/berita_');
        }
    }
}
