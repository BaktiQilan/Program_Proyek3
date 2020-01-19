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

    public function getAktivasi()
    {
        $this->db->select('*');
        $this->db->from('user_detail');
        $this->db->where('no_rek = "0" ');
        $query = $this->db->get_where('', ['role_id' => '2']);
        return $query->result_array();
    }

    public function getAll()
    {
        $this->db->select('req.*, user_detail.nama');
        $this->db->from('req');
        $this->db->where('req.status = "Belum diambil" ');
        $this->db->join('user_detail', 'req.user_id = user_detail.user_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistori()
    {
        $this->db->select('jadwal.*, req.*, user.name, user_detail.*');
        $this->db->from('jadwal', 'req');
        $this->db->where('req.status = "diambil" ');
        $this->db->join('req', 'jadwal.req_id = req.id');
        $this->db->join('user', 'req.user_id = user.id');
        $this->db->join('user_detail', 'req.user_id = user_detail.user_id');

        $query = $this->db->get();
        return $query->result();
    }

    public function getJadwal()
    {
        $this->db->select('req.*, user_detail.nama, jadwal.petugas_id');
        $this->db->from('req');
        $this->db->join('user_detail', 'req.user_id = user_detail.user_id');
        $this->db->join('jadwal', 'req.id = jadwal.req_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function penarikan()
    {
        $this->db->select('tarik.*, user_detail.nama');
        $this->db->from('tarik');
        $this->db->join('user_detail', 'tarik.user_id = user_detail.user_id');
        $this->db->order_by('tarik.id');
        $this->db->where('tarik.status = "belum disetujui"');
        $query = $this->db->get();
        return $query->result();
    }

    public function hapus_tarik($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tarik');
    }
}
