<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submission extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('UserInputModel');
    }

    public function index() {
        $data['submissions'] = $this->UserInputModel->get_all_pending();
        $this->load->view('admin/submission/list', $data);
    }

    public function review($id) {
        $data['submission'] = $this->UserInputModel->get_by_id($id);
        $data['fasilitas'] = $this->UserInputModel->get_fasilitas($id);
        $this->load->view('admin/submission/review', $data);
    }

    public function approve($id) {
        // Pindahkan data ke tabel asrama
        $submission = $this->UserInputModel->get_by_id($id);
        $this->AsramaModel->insert($submission);
        
        // Update status
        $this->UserInputModel->update_status($id, 'diterima');
        
        redirect('admin/submission');
    }

    public function reject($id) {
        $this->UserInputModel->update_status($id, 'ditolak');
        redirect('admin/submission');
    }
}