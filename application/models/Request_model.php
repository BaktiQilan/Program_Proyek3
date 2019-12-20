<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_model extends CI_Model
{
    public function lihat($id)
    {
        $this->db->select('*');
        $this->db->from('req');
        $this->db->where('id', $id);

        return $this->db->get();
    }
}
