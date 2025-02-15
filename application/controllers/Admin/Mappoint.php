<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mappoint extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AsramaModel');
		$this->load->model('ProvinsiModel');
	}

	public function index()
	{
		$datacontent['url']='admin/mappoint';
		$datacontent['title']='Halaman Maps Point';
		// $datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/mappoint/mapView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/mappoint/js/mapsjs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layout/html',$data);
	}
}
