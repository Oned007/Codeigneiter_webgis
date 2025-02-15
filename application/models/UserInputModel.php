<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInputModel extends CI_Model{
	function get(){
		$data=$this->db->select('*')
					->from('user_input_asrama a')
					->join('provinsi b','a.id_provinsi=b.id_provinsi','LEFT')
					->join('jenis_asrama c','a.id_jenis=c.id_jenis','LEFT')
					->join('kapasitas_asrama d','a.id_kapasitas=d.id_kapasitas','LEFT')
					->where('a.status', 'pending')
					->get();
		return $data;
	}
	function get_all(){
		$data=$this->db->select('*')
					->from('user_input_asrama a')
					->join('provinsi b','a.id_provinsi=b.id_provinsi','LEFT')
					->join('jenis_asrama c','a.id_jenis=c.id_jenis','LEFT')
					->join('kapasitas_asrama d','a.id_kapasitas=d.id_kapasitas','LEFT')
					->get();
					return $data->result();
	}
	function get_by_id($id_input){
		$data = $this->db->select('*')
					->from('user_input_asrama a')
					->join('provinsi b', 'a.id_provinsi = b.id_provinsi', 'LEFT')
					->join('jenis_asrama c', 'a.id_jenis = c.id_jenis', 'LEFT')
					->join('kapasitas_asrama d','a.id_kapasitas=d.id_kapasitas','LEFT')
					->where('a.id_input', $id_input)
					->get();
		return $data->row();
	}
	function insert($data=array()){
		$this->db->insert('user_input_asrama',$data);
        return $this->db->insert_id();
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function insert_batch($data=array()){
		$this->db->insert_batch('user_input_asrama',$data);
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function update($data=array(),$where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->update('user_input_asrama',$data);
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function delete($where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->delete('user_input_asrama');
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
	}
	    // Method untuk mengambil jumlah total asrama
		public function get_total_asrama()
	{
			return $this->db->count_all('user_input_asrama');
	}
	
		// Method untuk mengambil jumlah asrama berdasarkan provinsi
		public function get_asrama_by_provinsi()
	{
			$this->db->select('provinsi.nama_provinsi, COUNT(user_input_asrama.id_input) as total');
			$this->db->from('user_input_asrama');
			$this->db->join('provinsi', 'provinsi.id_provinsi = asrama.id_provinsi', 'left');
			$this->db->group_by('provinsi.id_provinsi');
			return $this->db->get()->result_array();
	}
	public function save_fasilitas($id_input, $fasilitas) {
		// Hapus relasi lama
		$this->db->where('id_input', $id_input);
		$this->db->delete('fasilitas_user_input');
		
		// Simpan relasi baru
		if(!empty($fasilitas)) {
			$data = [];
			foreach($fasilitas as $f) {
				$data[] = [
					'id_input' => $id_input,
					'id_fasilitas' => $f
				];
			}
			$this->db->insert_batch('fasilitas_user_input', $data);
		}
	}
	
	public function get_with_fasilitas($id_input) {
		$this->db->select('*');
		$this->db->join('fasilitas_user_input', 'fasilitas_user_input.id_input = asrama.id_input', 'left');
		$this->db->join('fasilitas', 'fasilitas.id_fasilitas = fasilitas_user_input.id_fasilitas', 'left');
		$this->db->where('asrama.id_input', $id_input);
		return $this->db->get('asrama')->result_array();
	}
	public function get_fasilitas_detail($id_input) {
		$this->db->select('f.nama_fasilitas');
		$this->db->from('fasilitas_user_input fa'); // Pastikan nama tabel pivot benar
		$this->db->join('fasilitas f', 'fa.id_fasilitas = f.id_fasilitas');
		$this->db->where('fa.id_input', $id_input);
		return $this->db->get()->result();
	}
	public function get_fasilitas($id_input) {
		$this->db->select('id_fasilitas');
		$this->db->where('id_input', $id_input);
		return $this->db->get('fasilitas_user_input')->result_array();
	}
	
}
