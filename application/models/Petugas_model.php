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
        $this->db->select('user_detail.*, req.tgl_jemput,req.id as req_id, req.status, jadwal.petugas_id, user.id');
        $this->db->from('user_detail');
        $this->db->where('req.status != "diambil"');
        $this->db->join('req', 'user_detail.user_id = req.user_id');
        $this->db->join('jadwal', 'req.id = jadwal.req_id');
        $this->db->join('user', 'user_detail.user_id = user.id');
        $query = $this->db->get_where('', ['petugas_id' => $this->session->userdata('id')]);
        return $query->result();
    }

    public function getNasabah()
    {
        $this->db->select('user_detail.*, tabungan.*');
        $this->db->from('user_detail');
        $this->db->join('tabungan', 'user_detail.id = tabungan.user_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistori()
    {
        $this->db->select('jadwal.*, req.*, user.name, user_detail.no_rek');
        $this->db->from('jadwal', 'req');
        $this->db->where('req.status = "diambil" ');
        $this->db->join('req', 'jadwal.req_id = req.id');
        $this->db->join('user', 'req.user_id = user.id');
        $this->db->join('user_detail', 'req.user_id = user_detail.user_id');

        $query = $this->db->get_where('', ['petugas_id' => $this->session->userdata('id')]);
        return $query->result();
    }
}
