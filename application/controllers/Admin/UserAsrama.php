<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAsrama extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('UserAsramaModel','Model');
		$this->load->model('ProvinsiModel');
		$this->load->model('KapasitasModel');
		$this->load->model('JenisAsramaModel');
		$this->load->model('FasilitasUserInputModel');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: session');

        // Cek apakah pengguna sudah login, jika tidak redirect ke halaman login
        if (!$this->session->userdata('logged')) {
            $this->session->set_flashdata('info', '<div class="alert alert-danger">Silakan login terlebih dahulu!</div>');
            redirect('admin/auth');
        }
	}

	public function index()
	{
		$datacontent['url']='admin/asrama';
		$datacontent['title']='Halaman asrama';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/asrama/asramaView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/asrama/asramaViewJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layout/html',$data);
	}
	public function form($parameter='',$id='')
	{
		
		$datacontent['url']='admin/asrama';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form asrama';
		$this->load->model('FasilitasModel');
		$datacontent['fasilitass'] = $this->FasilitasModel->get()->result();
		$selected = $this->Model->get_fasilitas($id);
    	$datacontent['selected_fasilitas'] = array_column($selected, 'id_fasilitas');
   		$data['content']=$this->load->view('admin/asrama/form',$datacontent,TRUE);
    	$data['title']=$datacontent['title'];
    	$this->load->view('admin/layout/html',$data);
		
	}

	public function detail($id)
	{
		$asrama = $this->Model->get_by_id($id);
		$datacontent['asrama'] = $asrama;
		$datacontent['id']=$id;
		$datacontent['title']='Detail asrama';
		$datacontent['datatable'] = $this->Model->get_by_id($id);
		$datacontent['fotos'] = explode(',', $asrama->foto_asrama);
		$data['content']=$this->load->view('user/detail',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layout/html',$data);
	}
	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'id_input' => $this->input->post('id_input'),
				'nama_asrama' => $this->input->post('nama_asrama'),
				'alamat_asrama' => $this->input->post('alamat_asrama'),
				'id_provinsi' => $this->input->post('id_provinsi'),
				'id_kapasitas' => $this->input->post('id_kapasitas'),
				'kapasitas_asrama' => $this->input->post('kapasitas_asrama'),
				'telephone' => $this->input->post('telephone'),
				'id_jenis' => $this->input->post('id_jenis'),
				'deskripsi' => $this->input->post('deskripsi'),
				'jumlah_kamar' => $this->input->post('jumlah_kamar'),
				'harga_sewa' => $this->input->post('harga_sewa'),
				'latt_asrama' => $this->input->post('latt_asrama'),
				'long_asrama' => $this->input->post('long_asrama'),
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
            $this->Model->insert($data);
            $id_input = $this->db->insert_id();
        } else {
            $id_input = $this->input->post('id_input');
            $this->Model->update($data, ['id_input' => $id_input]);
        }
		$fasilitas = $this->input->post('fasilitas');
        $this->Model->save_fasilitas($id_input, $fasilitas);
			redirect('admin/asrama');
		}
	}

	public function hapus($id=''){
		$this->db->where('id_input',$id);
		$get=$this->Model->get()->row();
		$this->Model->delete(["id_input"=>$id]);
		redirect('admin/asrama');
	}
	public function datatable(){
		header('Content-Type: application/json');
		$url = 'admin/asrama';
		$kolom =['nama_asrama','alamat_asrama','nama_provinsi','telephone','latt_asrama','long_asrama'];

		if ( $this->input->get('sSearch')){
			$this->db->group_start();
			for ( $i=0 ; $i<count($kolom) ; $i++ )
			{
		    	$this->db->or_like($kolom[$i],$this->input->get('sSearch',TRUE));
			}
			$this->db->group_end();
		}
		//order
		if ( $this->input->get('iSortCol_0') ){
			for ( $i=0 ; $i<intval( $this->input->get('iSortingCols',TRUE) ) ; $i++ )
			{
			    if ( $this->input->get( 'bSortable_'.intval($_GET['iSortCol_'.$i]),TRUE) == "true" )
			    {
			        $this->db->order_by($kolom[intval( $this->input->get('iSortCol_'.$i,TRUE))],$this->input->get('sSortDir_'.$i,TRUE) );
			    }
			}
		}

      	if($this->input->get('iDisplayLength',TRUE)!="-1"){
	        $this->db->limit($this->input->get('iDisplayLength',TRUE),$this->input->get('iDisplayStart'));
		}

		$dataTable = $this->Model->get();
		$iTotalDisplayRecords=$this->Model->get()->num_rows();
		$iTotalRecords=$dataTable->num_rows();
		$output = [
		  "sEcho" => intval($this->input->get('sEcho')),
		  "iTotalRecords" => $iTotalRecords,
		  "iTotalDisplayRecords" => $iTotalDisplayRecords,
		  "aaData" => array()
		];
		$no=1;
		foreach ($dataTable->result() as $row) {
			
			$r = null;
			$r[] = $no++;
			$r[] = $row->nama_asrama;
			$r[] = $row->alamat_asrama;
			$r[] = $row->nama_provinsi;
			$r[] = $row->telephone;

			$r[] = '<div class="btn-group">
								<a href="'.site_url($url.'/form/ubah/'.$row->id_input).'" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
								<a href="'.site_url($url.'/detail/'.$row->id_input).'" class="btn btn-success"><i class="fa fa-edit"></i> Detail</a>
								<a href="'.site_url($url.'/hapus/'.$row->id_input).'" class="btn btn-danger" onclick="return confirm(\'Hapus data?\')"><i class="fa fa-trash"></i> Hapus</a>
							</div>';
			$output['aaData'][] = $r;				
		}
		echo json_encode($output,JSON_PRETTY_PRINT);

	}
	
	
}
