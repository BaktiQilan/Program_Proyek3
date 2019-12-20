<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function hapusRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }

    public function hapusSampah($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sampah');
    }

    public function getAll()
    {
        $this->db->select('req.*, user_detail.nama');
        $this->db->join('user_detail', 'req.user_id = user_detail.user_id');
        $this->db->from('req');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJadwal()
    {
        $this->db->select('req.*, user_detail.nama, jadwal.petugas');
        $this->db->join('user_detail', 'req.user_id = user_detail.user_id');
        $this->db->join('jadwal', 'req.id = jadwal.req_id');
        $this->db->from('req');
        $query = $this->db->get();
        return $query->result();
    }
}
