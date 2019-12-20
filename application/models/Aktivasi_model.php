<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivasi_model extends CI_Model
{
    public function getUser()
    {
        #$this->db->order_by('user_detail.id', 'ASC');
        #return $this->db->from('user_detail')
        #    ->join('user', 'user.id=user_detail.user_id')
        #    ->get()
        #    ->result();
        $this->db->select('*');
        $this->db->from('user_detail');
        $this->db->join('user', 'user.id=user_detail.user_id');

        $query = $this->db->get();
        return $query->result();
    }
    function get_user($user_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_detail', 'user_detail.user_id=user.id');
        $this->db->where('user.id', $user_id);
        $query = $this->db->get();
        return $query;
    }

    public function editRek($id)
    {
        $data = [
            'no_rek' => getAutoNumber('user_detail', 'no_rek', 'BS', 6),
        ];
        $this->db->where('id', $id);
        $this->db->update('user_detail', $data);
    }
}
