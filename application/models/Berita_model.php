<?php

class Berita_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function daftar(){
        $query = $this->db->query('SELECT a.id_barang, a.barang, a.harga_barang, b.kategori FROM barang as a INNER JOIN kategori as b on a.id_kategori = b.id_kategori');
        return $query->result();
    }

    public function daftarKategori(){
        $query = $this->db->get('kategori');
        return $query->result();
    }
 
    public function tambah($data){
        $this->db->insert('barang', $data);
    }

    public function hapus($id){
        $this->db->where('id_barang', $id);
        $this->db->delete('barang'); 
    }

    public function edit($id, $data){
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }
    public function tambahKategori($data) {
        $this->db->insert('kategori', $data);
    }
}