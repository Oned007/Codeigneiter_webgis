<?php
class FasilitasUserInputModel extends CI_Model {
    public function get()
    {
        return $this->db->get('fasilitas_user_input');
    }

    public function get_by_asrama($id_input)
    {
        $this->db->select('fasilitas_user_input.id_fasilitas');
        $this->db->from('fasilitas_user_input');
        $this->db->join('fasilitas_user_input', 'fasilitas.id_fasilitas = fasilitas_user_input.id_fasilitas');
        $this->db->where('fasilitas_user_input.id_input', $id_input);
        return $this->db->get()->result_array();
    }
}