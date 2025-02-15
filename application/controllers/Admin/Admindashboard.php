<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('AsramaModel'); // Load model AsramaModel
		if($this->session->logged!==true){
	      redirect('admin/auth');
	    }
	}

	public function index()
	{
		$datacontent['total_asrama'] = $this->AsramaModel->get_total_asrama();
        $datacontent['asrama_by_provinsi'] = $this->AsramaModel->get_asrama_by_provinsi();
		$datacontent['title']='Halaman Beranda';
		$data['content']=$this->load->view('admin/dashboardView',$datacontent,TRUE);
		$data['title']='Selamat Datang di Beranda';
		$this->load->view('admin/layout/html',$data);
	}
}
