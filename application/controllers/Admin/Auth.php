<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$datacontent['title']='Form Login';
		$this->load->view('admin/loginView',$datacontent);
	}
	public function check(){
		if($this->input->post()){
			$username=$this->input->post('username');
		    $password=$this->input->post('password');
		    $this->db->where("username",$username);
		    $data=$this->db->get("users");
		    if($data->num_rows()>0){
		      // jika username ada
		      $row=$data->row();
		      $hash = $row->password;
		      if (password_verify($password, $hash)) {
		          $this->session->set_userdata("logged",true);
		          $this->session->set_userdata("username",$row->username);
		          $this->session->set_userdata("id_pengguna",$row->id_user);
		          $this->session->set_userdata("power",$row->power);
		          $this->session->set_flashdata("info",'<div class="alert alert-success alert-dismissible">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                    <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Selamat Datang <b>'.$row->username.'</b> di Halaman Utama Aplikasi
		                  </div>');
		          redirect("admin/admindashboard");
		      } else {
		         $this->session->set_userdata("logged",false);
		         $this->session->set_flashdata("info",'<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-ban"></i> Error!</h4> Nama Pengguna atau Kata Sandi Salah
		              </div>');
		        redirect("admin/auth");
		      }
		    }
		    else{
		      $this->session->set_userdata("logged",false);
	    	  $this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-ban"></i> Error!</h4> Nama Pengguna atau Kata Sandi Salah
		              </div>');
		      redirect("admin/auth");
		    }
		}
		else{
			redirect("admin/auth");
		}
	}
	public function out(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Berhasil!</h4> Anda telah keluar dari aplikasi.
		</div>'); 
		redirect("admin/auth");
	}
}
