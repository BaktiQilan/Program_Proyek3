<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_role();
    }

    public function index()
    {
        $data['title'] = 'Info - Harga Sampah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['info'] = $this->db->get('sampah')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/index', $data);
        $this->load->view('templates/footer');
    }
}
