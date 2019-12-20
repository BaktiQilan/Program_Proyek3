<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    public function getJenis()
    {
        $query = " SELECT * 
                   FROM sampah";

        return $this->db->query($query)->result_array();
    }

    public function getAmbil()
    {
        $this->db->select('user_detail.*, req.tgl_jemput, req.status, jadwal.petugas');
        $this->db->from('user_detail');
        $this->db->join('req', 'user_detail.user_id = req.user_id');
        $this->db->join('jadwal', 'req.id = jadwal.req_id');
        $query = $this->db->get_where('', ['petugas_id' => $this->session->userdata('id')]);
        return $query->result();
    }
}
