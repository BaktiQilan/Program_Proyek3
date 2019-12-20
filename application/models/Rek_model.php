<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rek_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function buat_rek()
    {
        $this->db->select('RIGHT(user_detail.no_rek,6) as rek', false);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('user_detail');

        if ($query->num_rows() != 0) {
            $data = $query->row();
            $rek = intval($data->rek) + 1;
        } else {
            $rek = 1;
        }
        $rek_max = str_pad($rek, 6, "0", STR_PAD_LEFT);
        $rek_jadi = "BS" . $rek_max;
        return $rek_jadi;
    }
}
