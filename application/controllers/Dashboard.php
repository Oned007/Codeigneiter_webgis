<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('AsramaModel','Model');
		$this->load->model('ProvinsiModel');
		$this->load->model('JenisAsramaModel');
		$this->load->model('FasilitasUserInputModel');
		$this->load->model('UserInputModel');
		$this->load->model('FasilitasModel');
		$this->load->model('UserInputModel');
		$this->load->model('KapasitasModel');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: session');
	}
	
	public function index()
	{
		$datacontent['title']='Halaman Beranda';
		$datacontent['datatable'] = $this->Model->get_all();
		$data['content']=$this->load->view('user/homepage',$datacontent,TRUE);
		$data['js']=$this->load->view('user/map/mapJs',$datacontent,TRUE);
		$data['title']='Selamat Datang di Beranda';
		$this->load->view('user/layouts/html',$data);
	}
	public function detail($id)
	{
		$datacontent['fasilitas'] = $this->Model->get_fasilitas_detail($id);
		$selected = $this->Model->get_fasilitas($id);
		$asrama = $this->Model->get_by_id($id);
		$datacontent['asrama'] = $asrama;
		$datacontent['id']=$id;
		$datacontent['title']='Detail asrama';
		$datacontent['datatable'] = $this->Model->get_by_id($id);
		$datacontent['fotos'] = explode(',', $asrama->foto_asrama);
		$data['content']=$this->load->view('user/detail',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('user/layouts/html',$data);
		$selected = $this->Model->get_fasilitas($id);
    	$datacontent['selected_fasilitas'] = array_column($selected, 'id_fasilitas');
	}
	public function tampil()
    {
	$datauser = $this->UserInputModel->get_all();
	$datacontent['datauser'] = $datauser;
    $datacontent['url']='dashboard';
    $datacontent['title']='Halaman asrama';
    $datacontent['datatable']=$this->UserInputModel->get_all();
    $data['content']=$this->load->view('user/datauser', $datacontent, TRUE);
    $data['title']=$datacontent['title'];
    $this->load->view('user/layouts/html', $data);
    }
	
	public function form($parameter='',$id='')
	{
		$datacontent['url']='dashboard';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form Pengajuan Asrama';
		$this->load->model('FasilitasModel');
		$datacontent['fasilitass'] = $this->FasilitasModel->get()->result();
		$selected = $this->UserInputModel->get_fasilitas($id);
    	$datacontent['selected_fasilitas'] = array_column($selected, 'id_fasilitas');
   		$data['content']=$this->load->view('user/formuserinput',$datacontent,TRUE);
    	$data['title']=$datacontent['title'];
    	$this->load->view('user/layouts/html',$data);
		
	}

	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'nama_asrama' => $this->input->post('nama_asrama'),
				'alamat_asrama' => $this->input->post('alamat_asrama'),
				'id_provinsi' => $this->input->post('id_provinsi'),
				'id_kapasitas' => $this->input->post('id_kapasitas'),
				'kapasitas_asrama' => $this->input->post('kapasitas_asrama'),
				'telephone' => $this->input->post('telephone'),
				'instagram' => $this->input->post('instagram'),
				'id_jenis' => $this->input->post('id_jenis'),
				'deskripsi' => $this->input->post('deskripsi'),
				'jumlah_kamar' => $this->input->post('jumlah_kamar'),
				'harga_sewa' => $this->input->post('harga_sewa'),
				'latt_asrama' => $this->input->post('latt_asrama'),
				'long_asrama' => $this->input->post('long_asrama'),
				'created_at' => date('Y-m-d H:i:s'),
            	'updated_at' => date('Y-m-d H:i:s')
			];
	
			$upload_path = FCPATH . 'admin/foto_asrama/';
	
			// Pastikan folder ada
			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, true);
			}
	
			// Jika ada file yang diunggah
			if (!empty($_FILES['foto_asrama']['name'][0])) {
				$foto_names = [];
	
				// Loop melalui semua file yang diunggah
				foreach ($_FILES['foto_asrama']['tmp_name'] as $key => $tmp_name) {
					$file_name = time() . '_' . $_FILES['foto_asrama']['name'][$key];
					$file_tmp = $_FILES['foto_asrama']['tmp_name'][$key];
					$destination = $upload_path . $file_name;
	
					if (move_uploaded_file($file_tmp, $destination)) {
						$foto_names[] = $file_name;
					} else {
						$info = '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Error!</h4> Gagal mengunggah file: ' . $_FILES['foto_asrama']['name'][$key] . ' </div>';
						$this->session->set_flashdata('info', $info);
						redirect('admin/asrama');
						exit();
					}
				}
	
				// Hapus foto lama jika ada
				$foto_lama = $this->input->post('foto_asrama_lama');
				if (!empty($foto_lama)) {
					$foto_lama_array = explode(',', $foto_lama);
					foreach ($foto_lama_array as $foto) {
						if (file_exists($upload_path . $foto)) {
							unlink($upload_path . $foto);
						}
					}
				}
	
				// Simpan nama file baru ke database
				$data['foto_asrama'] = implode(',', $foto_names);
			} else {
				// Jika tidak ada file yang diunggah, gunakan foto lama
				$data['foto_asrama'] = $this->input->post('foto_asrama_lama');
			}
	
			if ($_POST['parameter'] == "tambah") {
            $this->UserInputModel->insert($data);
            $id_input = $this->db->insert_id();
        } else {
			$data['updated_at'] = date('Y-m-d H:i:s');
            $id_input = $this->input->post('id_input');
            $this->UserInputModel->update($data, ['id_input' => $id_input]);
        }
		$fasilitas = $this->input->post('fasilitas');
        $this->Model->save_fasilitas($id_input, $fasilitas);
			redirect('admin/asrama');
		}
	}
}
