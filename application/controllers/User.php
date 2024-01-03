<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        // memanggil function user_model dan menjalankan fungsinya meskipun fungsi lain di jalankan, karena fungsi itu sudah pasti dijalankan
        if($this->session->userdata('level')!='Admin'){
			redirect('home');
		}
    }
	public function index()
	{
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user','DESC');
        $hasil = $this->db->get()->result_array();
        // $hasil : variable untuk menampung query di atasnya
        $data = array('hasil' => $hasil);
        // hasil : variable untuk menampung variable hasil yang ada di atasnya
		$this->template->load('layout/template','user_index',$data);
	}
	public function tambah(){
		$this->template->load('layout/template','user_tambah');
    }
    public function hapus($id){
        $where = array('id_user' => $id); 
        $this->db->delete('user',$where); 
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Data berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        '); 
        redirect('user');
    }
    public function edit($id){
        $this->db->select('*')->from('user');
        $this->db->where('id_user',$id);
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
		$this->template->load('layout/template','user_edit',$data);
    }
	public function simpan(){
        $this->User_model->simpan();
        // memanggil nama model dan functionnya
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> User berhasil di tambahkan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('user');
    }
    public function update(){
        $this->User_model->update();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Data berhasil diedit!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('user');
    }
}


