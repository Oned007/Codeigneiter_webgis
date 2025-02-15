<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asrama extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('AsramaModel','Model');
        $this->load->model('ProvinsiModel');
        $this->load->model('KapasitasModel');
        $this->load->model('JenisAsramaModel');
        $this->load->model('UserInputModel');
        $this->load->model('FasilitasModel');
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
    $datacontent['url'] = 'admin/asrama';
    $datacontent['title'] = 'Halaman asrama';
    $datacontent['datatable'] = $this->Model->get();
    $data['content'] = $this->load->view('admin/asrama/asramaView', $datacontent, TRUE);
    $data['js'] = $this->load->view('admin/asrama/asramaViewJs', $datacontent, TRUE);
    $data['title'] = $datacontent['title'];
    $this->load->view('admin/layout/html', $data);
    }

    public function pending()
    {
    $datacontent['url'] = 'admin/asrama';
    $datacontent['title'] = 'Halaman asrama';
    $datacontent['datatable'] = $this->UserInputModel->get();
    $data['content'] = $this->load->view('admin/asrama/pending', $datacontent, TRUE);
    $data['js'] = $this->load->view('admin/asrama/pendingViewJs', $datacontent, TRUE);
    $data['title'] = $datacontent['title'];
    $this->load->view('admin/layout/html', $data);
    }

    public function form($parameter='',$id='')
    {
    $datacontent['url']= 'admin/asrama';
    $datacontent['parameter']= $parameter;
    $datacontent['id']= $id;
    $datacontent['title'] = 'Form asrama';
    $this->load->model('FasilitasModel');
    $datacontent['fasilitass'] = $this->FasilitasModel->get()->result();
    $selected = $this->Model->get_fasilitas($id);
    $datacontent['selected_fasilitas'] = array_column($selected, 'id_fasilitas');
    $data['content'] = $this->load->view('admin/asrama/form', $datacontent, TRUE);
    $data['title'] = $datacontent['title'];
    $this->load->view('admin/layout/html', $data);
    }

    public function detail($id)
    {
    $asrama = $this->Model->get_by_id($id);
    $datacontent['asrama'] = $asrama;
    $datacontent['id'] = $id;
    $datacontent['title'] = 'Detail asrama';
    $datacontent['datatable'] = $this->Model->get_by_id($id);
    $datacontent['fotos'] = explode(',', $asrama->foto_asrama);
    $data['content'] = $this->load->view('user/detail', $datacontent, TRUE);
    $data['title'] = $datacontent['title'];
    $this->load->view('admin/layout/html', $data);
    }

    public function simpan()
    {
    if ($this->input->post()) {
    $data = [
    'id_asrama' => $this->input->post('id_asrama'),
    'nama_asrama' => $this->input->post('nama_asrama'),
    'alamat_asrama' => $this->input->post('alamat_asrama'),
    'id_provinsi' => $this->input->post('id_provinsi'),
    'id_kapasitas' => $this->input->post('id_kapasitas'),
    'kapasitas_asrama'=> $this->input->post('kapasitas_asrama'),
    'telephone' => $this->input->post('telephone'),
    'id_jenis' => $this->input->post('id_jenis'),
    'deskripsi' => $this->input->post('deskripsi'),
    'jumlah_kamar' => $this->input->post('jumlah_kamar'),
    'harga_sewa' => $this->input->post('harga_sewa'),
    'latt_asrama' => $this->input->post('latt_asrama'),
    'long_asrama' => $this->input->post('long_asrama'),
	'instagram' => $this->input->post('instagram'),
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
                foreach ($_FILES['foto_asrama']['tmp_name'] as $key => $tmp_name) {
                    $file_name   = time() . '_' . $_FILES['foto_asrama']['name'][$key];
                    $file_tmp    = $_FILES['foto_asrama']['tmp_name'][$key];
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

            if ($this->input->post('parameter') == "tambah") {
                $this->Model->insert($data);
                $id_asrama = $this->db->insert_id();
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $id_asrama = $this->input->post('id_asrama');
                $this->Model->update($data, ['id_asrama' => $id_asrama]);
            }
            $fasilitas = $this->input->post('fasilitas');
            $this->Model->save_fasilitas($id_asrama, $fasilitas);
            redirect('admin/asrama');
        }
    }

    public function hapus($id=''){
           // Mulai transaction
    $this->db->trans_start();
    try {
        // 1. Hapus fasilitas terlebih dahulu
        $this->db->where('id_asrama', $id);
        $this->db->delete('fasilitas_asrama');
        // 2. Hapus data asrama
        $this->Model->delete(["id_asrama" => $id]);
        // 3. Hapus foto jika ada
        $asrama = $this->Model->get_by_id($id);
        if (!empty($asrama->foto_asrama)) {
            $upload_path = FCPATH . 'admin/foto_asrama/';
            $foto_array = explode(',', $asrama->foto_asrama);
            foreach ($foto_array as $foto) {
                if (file_exists($upload_path . $foto)) {
                    unlink($upload_path . $foto);
                }
            }
        }
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            throw new Exception('Gagal menghapus data');
        }
        
        $this->session->set_flashdata('info', '<div class="alert alert-success">Data berhasil dihapus!</div>');
    } catch (Exception $e) {
        $this->session->set_flashdata('info', '<div class="alert alert-danger">'.$e->getMessage().'</div>');
    }
    
    redirect('admin/asrama');
    }

    // Method DataTables menggunakan data dari AsramaModel (tabel asrama)
    public function datatable(){
        // Nonaktifkan error reporting agar output bersih
        error_reporting(0);
        ini_set('display_errors', 0);

        header('Content-Type: application/json');
        $url = 'admin/asrama';
        $kolom = ['nama_asrama', 'alamat_asrama', 'nama_provinsi', 'telephone', 'latt_asrama', 'long_asrama'];

        // Pencarian (filter)
        if ($this->input->get('sSearch')) {
            $this->db->group_start();
            foreach ($kolom as $column) {
                $this->db->or_like($column, $this->input->get('sSearch', TRUE));
            }
            $this->db->group_end();
        }

        // Pengurutan (sorting)
        if ($this->input->get('iSortCol_0')) {
            $sortingCols = intval($this->input->get('iSortingCols', TRUE));
            for ($i = 0; $i < $sortingCols; $i++) {
                $sortColIndex = intval($this->input->get('iSortCol_' . $i, TRUE));
                if ($this->input->get('bSortable_' . $sortColIndex, TRUE) === "true") {
                    $sortDir = $this->input->get('sSortDir_' . $i, TRUE);
                    $this->db->order_by($kolom[$sortColIndex], $sortDir);
                }
            }
        }

        // Pembatasan data (paging)
        $displayLength = intval($this->input->get('iDisplayLength', TRUE));
        if ($displayLength != -1) {
            $displayStart = intval($this->input->get('iDisplayStart', TRUE));
            $this->db->limit($displayLength, $displayStart);
        }

        // Mengambil data dari AsramaModel
        $dataTable = $this->Model->get();
        $iTotalRecords = $dataTable->num_rows();
        // Jika ada filter, sebaiknya hitung ulang total display records (disini disamakan)
        $iTotalDisplayRecords = $iTotalRecords;

        $output = [
            "sEcho" => intval($this->input->get('sEcho')),
            "iTotalRecords" => $iTotalRecords,
            "iTotalDisplayRecords" => $iTotalDisplayRecords,
            "aaData" => []
        ];

        $no = 1;
        foreach ($dataTable->result() as $row) {
            $r = [];
            $r[] = $no++;
            $r[] = $row->nama_asrama;
            $r[] = $row->alamat_asrama;
            $r[] = $row->nama_provinsi;
            $r[] = $row->telephone;
            $r[] = '<div class="btn-group">
                        <a href="' . site_url($url . '/form/ubah/' . $row->id_asrama) . '" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="' . site_url($url . '/detail/' . $row->id_asrama) . '" class="btn btn-success"><i class="fa fa-edit"></i> Detail</a>
                        <a href="' . site_url($url . '/hapus/' . $row->id_asrama) . '" class="btn btn-danger" onclick="return confirm(\'Hapus data?\')"><i class="fa fa-trash"></i> Hapus</a>
                    </div>';
            $output['aaData'][] = $r;
        }
        echo json_encode($output, JSON_PRETTY_PRINT);
    }

    // Method DataTables menggunakan data dari UserInputModel (misalnya untuk pending)
    public function datatablee(){
        // Nonaktifkan error reporting agar output bersih
        error_reporting(0);
        ini_set('display_errors', 0);

        header('Content-Type: application/json');
        $url = 'admin/asrama';
        $kolom = ['nama_asrama', 'alamat_asrama', 'nama_provinsi', 'telephone', 'latt_asrama', 'long_asrama'];

        // Pencarian (filter)
        if ($this->input->get('sSearch')) {
            $this->db->group_start();
            foreach ($kolom as $column) {
                $this->db->or_like($column, $this->input->get('sSearch', TRUE));
            }
            $this->db->group_end();
        }

        // Pengurutan (sorting)
        if ($this->input->get('iSortCol_0')) {
            $sortingCols = intval($this->input->get('iSortingCols', TRUE));
            for ($i = 0; $i < $sortingCols; $i++) {
                $sortColIndex = intval($this->input->get('iSortCol_' . $i, TRUE));
                if ($this->input->get('bSortable_' . $sortColIndex, TRUE) === "true") {
                    $sortDir = $this->input->get('sSortDir_' . $i, TRUE);
                    $this->db->order_by($kolom[$sortColIndex], $sortDir);
                }
            }
        }

        // Pembatasan data (paging)
        $displayLength = intval($this->input->get('iDisplayLength', TRUE));
        if ($displayLength != -1) {
            $displayStart = intval($this->input->get('iDisplayStart', TRUE));
            $this->db->limit($displayLength, $displayStart);
        }

        // Mengambil data dari UserInputModel
        $dataTable = $this->UserInputModel->get();
        $iTotalRecords = $dataTable->num_rows();
        $iTotalDisplayRecords = $iTotalRecords;

        $output = [
            "sEcho" => intval($this->input->get('sEcho')),
            "iTotalRecords" => $iTotalRecords,
            "iTotalDisplayRecords" => $iTotalDisplayRecords,
            "aaData" => []
        ];

        $no = 1;
        foreach ($dataTable->result() as $row) {
            $r = [];
            $r[] = $no++;
            $r[] = $row->nama_asrama;
            $r[] = $row->alamat_asrama;
            $r[] = $row->nama_provinsi;
            $r[] = $row->status;
            $r[] = '<div class="btn-group">
                        <a href="' . site_url($url . '/form/review/' . $row->id_input) . '" class="btn btn-success" onclick="return confirm(\'Review data ini?\')"><i class="fa fa-edit"></i>Review</a>
                        <a href="' . site_url($url . '/reject/' . $row->id_input) . '" class="btn btn-danger" onclick="return confirm(\'Hapus data?\')"><i class="fa fa-times"></i> Reject </a>
                    </div>';
            $output['aaData'][] = $r;
        }
        echo json_encode($output, JSON_PRETTY_PRINT);
    }

	public function approve($id_input) {
		// Pindahkan data dari user_input_asrama ke asrama
		$this->load->model('UserInputModel');
		
		// Ambil data input user
		$submission = $this->UserInputModel->get_by_id($id_input);
		
		// Siapkan data untuk tabel asrama
		$asrama_data = [
			'nama_asrama' => $submission->nama_asrama,
			'alamat_asrama' => $submission->alamat_asrama,
			'id_provinsi' => $submission->id_provinsi,
			'id_kapasitas' => $submission->id_kapasitas,
			'kapasitas_asrama' => $submission->kapasitas_asrama,
			'telephone' => $submission->telephone,
			'id_jenis' => $submission->id_jenis,
			'deskripsi' => $submission->deskripsi,
			'jumlah_kamar' => $submission->jumlah_kamar,
			'harga_sewa' => $submission->harga_sewa,
			'latt_asrama' => $submission->latt_asrama,
			'long_asrama' => $submission->long_asrama,
			'foto_asrama' => $submission->foto_asrama,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		
		// Mulai transaction
		$this->db->trans_start();
		
		// 1. Insert ke tabel asrama
		$this->Model->insert($asrama_data);
		$id_asrama = $this->db->insert_id();
		
		// 2. Pindahkan fasilitas
		$fasilitas = $this->UserInputModel->get_fasilitas($id_input);
		if(!empty($fasilitas)) {
			$fasilitas_data = [];
			foreach($fasilitas as $f) {
				$fasilitas_data[] = [
					'id_asrama' => $id_asrama,
					'id_fasilitas' => $f['id_fasilitas']
				];
			}
			$this->db->insert_batch('fasilitas_asrama', $fasilitas_data);
		}
		// 3. Update status di user_input_asrama
		$this->UserInputModel->update(
			['status' => 'diterima'],
			['id_input' => $id_input]
		);
		
		$this->db->trans_complete();
		
		if($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('info', '<div class="alert alert-danger">Gagal menyetujui data!</div>');
		} else {
			$this->session->set_flashdata('info', '<div class="alert alert-success">Data berhasil disetujui!</div>');
		}
		
		redirect('admin/asrama/pending');
	}
	public function reject($id_input) {
		
		// Update status di tabel user_input_asrama menjadi 'ditolak'
		$this->UserInputModel->update(
			['status' => 'ditolak'],
			['id_input' => $id_input]
		);
	
		// Berikan pesan flash kepada user
		$this->session->set_flashdata('info', '<div class="alert alert-success">Data berhasil ditolak!</div>');
		
		// Redirect ke halaman pending
		redirect('admin/asrama/pending');
	}
	
}
