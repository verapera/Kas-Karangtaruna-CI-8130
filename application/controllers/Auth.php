<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}
    public function login()
    {
       $username = $this->input->post('username'); 
       $password = md5($this->input->post('password')); 
       $this->db->from('user')->where('username',$username);
       $user = $this->db->get()->row();
       if($user==NULL){
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Username tidak ada
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        '); 
        redirect('auth');
       }else if($user->password==$password){
        $data = array(
            'username' => $user->username,
            'nama'     => $user->nama,
            'level'    => $user->level,
            'id_user'  => $user->id_user,
        );
        $this->session->set_userdata($data);
        redirect('home');
       }else{
        $this->session->set_flashdata('alert','
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Password salah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        '); 
        redirect('auth');
       }
    }
    public function logout(){
        session_start();
        session_destroy();
        redirect('auth');
    }
}
?>


