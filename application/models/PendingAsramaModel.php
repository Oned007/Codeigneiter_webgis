<?php
class PendingAsramaModel extends CI_Model {
    public function create($data) {
        $this->db->insert('pending_asrama', $data);
        return $this->db->insert_id();
    }

    public function getPending($id = null) {
        if($id) return $this->db->get_where('pending_asrama', ['id_pending' => $id])->row();
        return $this->db->get('pending_asrama')->result();
    }

    public function updateStatus($id, $status) {
        $this->db->where('id_pending', $id);
        $this->db->update('pending_asrama', ['status' => $status]);
    }

    public function delete($id) {
        $this->db->where('id_pending', $id);
        $this->db->delete('pending_asrama');
    }
}

class PendingFasilitasModel extends CI_Model {
    public function save($id_pending, $fasilitas) {
        // Hapus yang lama
        $this->db->where('id_pending', $id_pending);
        $this->db->delete('pending_fasilitas');
        
        // Insert yang baru
        $data = [];
        foreach($fasilitas as $f) {
            $data[] = [
                'id_pending' => $id_pending,
                'id_fasilitas' => $f
            ];
        }
        $this->db->insert_batch('pending_fasilitas', $data);
    }

    public function getByPending($id_pending) {
        return $this->db->get_where('pending_fasilitas', ['id_pending' => $id_pending])->result();
    }
}