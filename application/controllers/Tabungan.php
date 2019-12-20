<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_role();
    }

    public function index()
    {
        $data['title'] = 'Saldo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tabungan/index', $data);
        $this->load->view('templates/footer');
    }
}
