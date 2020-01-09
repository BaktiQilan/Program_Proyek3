<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_model extends CI_Model
{
    public function histori()
    {
        $this->db->select('*');
        $this->db->from('req');
        $this->db->group_by('id');

        return $this->db->get_where('', ['user_id' => $this->session->userdata('id')])->result_array();
    }
}
