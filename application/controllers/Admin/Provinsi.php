<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ProvinsiModel','Model');
	}

	public function index()
	{
		$datacontent['url']='admin/provinsi';
		$datacontent['title']='Halaman provinsi';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/provinsi/dataView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layout/html',$data);
	}
	public function form($parameter='',$id='')
	{
		$datacontent['url']='admin/provinsi';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form provinsi';
		$data['content']=$this->load->view('admin/provinsi/form',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layout/html',$data);
	}
	public function simpan()
	{
		if($this->input->post()){

			// cek validasi
			$validation=null;
			// cek kode apakah sudah ada
			if($this->input->post('id_provinsi')!=""){
				$this->db->where('id_provinsi !='.$this->input->post('id_provinsi'));
			}
			$this->db->where('kd_prov',$this->input->post('kd_prov'));
			$check=$this->db->get('provinsi');
			if($check->num_rows()>0){
				$validation[]='Kode provinsi Sudah Ada';
			}
			//tidak boleh kosong
			if($this->input->post('nm_prov')==''){
				$validation[]='Nama Provinsi Tidak Boleh Kosong';
			}


			if(count($validation)>0){
				$this->session->set_flashdata('error_validation',$validation);
				$this->session->set_flashdata('error_value',$_POST);
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}

			$data=[
				'kd_prov'=>$this->input->post('kd_prov'),
				'nm_prov'=>$this->input->post('nm_prov'),
			];

			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_provinsi'=>$this->input->post('id_provinsi')]);
			}

		}

		redirect('admin/provinsi');
	}

	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_provinsi',$id);
		$get=$this->Model->get()->row();

		// end hapus file di dalam folder
		$this->Model->delete(["id_provinsi"=>$id]);
		redirect('admin/provinsi');
	}
}
