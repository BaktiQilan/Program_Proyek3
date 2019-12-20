<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_role();
        $this->load->model('Petugas_model', 'petugas');
    }

    public function index()
    {
        $data['title'] = 'Jadwal Pengambilan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $data['ambil'] = $this->petugas->getAmbil();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['title'] = 'Input Data Sampah Nasabah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Petugas_model', 'petugas');
        $data['jenis'] = $this->petugas->getJenis();
        $data['petugas'] = $this->db->get('sampah')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/input', $data);
        $this->load->view('templates/footer');
    }
}
