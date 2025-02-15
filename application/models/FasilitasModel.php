<?php
class FasilitasModel extends CI_Model {
    public function get()
    {
        return $this->db->get('fasilitas');
    }

    public function get_by_asrama($id_asrama)
    {
        $this->db->select('fasilitas.id_fasilitas');
        $this->db->from('fasilitas');
        $this->db->join('fasilitas_asrama', 'fasilitas.id_fasilitas = fasilitas_asrama.id_fasilitas');
        $this->db->where('fasilitas_asrama.id_asrama', $id_asrama);
        return $this->db->get()->result_array();
    }
    

}
