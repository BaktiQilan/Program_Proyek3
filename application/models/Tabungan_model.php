<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan_model extends CI_Model
{
    public function getTabungan()
    {
        $this->db->select('tabungan.*, user.*');
        $this->db->from('tabungan');
        $this->db->join('user', 'tabungan.user_id = user.id');
        return $this->db->get_where('', ['user_id' => $this->session->userdata('id')])->result_array();
    }

    public function getTotal()
    {
        $this->db->select('SUM(setoran) - SUM(penarikan) as total');
        $this->db->from('tabungan');
        return $this->db->get_where('', ['user_id' => $this->session->userdata('id')])->row()->total;
    }

    public function getNasabah()
    {
        $query = " SELECT `user_detail`.*, `user`.`id`
                   FROM `user_detail` JOIN `user`
                   ON `user_detail`.`user_id` = `user`.`id` 
                   ";
        $result = $this->db->get_where('user_detail', ['user_id' => $this->session->userdata('id')]);
        return $result->row_array();
    }

    public function histori()
    {
        $this->db->select('*');
        $this->db->from('tarik');
        $this->db->group_by('id');

        return $this->db->get_where('', ['user_id' => $this->session->userdata('id')])->result_array();
    }
}
