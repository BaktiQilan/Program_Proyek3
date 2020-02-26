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

        $data['ambil'] = $this->petugas->getAmbil();
        $data['jenis'] = $this->petugas->getJenis();
        $data['nasabah'] = $this->petugas->getNasabah();
        $data['petugas'] = $this->db->get('sampah')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['title'] = 'Jadwal Pengambilan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['ambil'] = $this->petugas->getAmbil();
        $data['petugas'] = $this->db->get('sampah')->result_array();

        $setoranjmlh['v1'] = (int) $this->input->post('j_sampah', true);
        $setoranjmlh['v2'] = (int) $this->input->post('b_sampah', true);
        $setoranjmlh['w1'] = (int) $this->input->post('j_sampah2', true);
        $setoranjmlh['w2'] = (int) $this->input->post('b_sampah2', true);

        $setoran = ($setoranjmlh['v1'] * $setoranjmlh['v2']) + ($setoranjmlh['w1'] * $setoranjmlh['w2']);
        $user_id = (int) $this->input->post('id', true);

        $this->form_validation->set_rules('j_sampah', 'Jenis Sampah', 'required', [
            'required' => 'Jenis Sampah harus diisi!'
        ]);
        $this->form_validation->set_rules('b_sampah', 'Berat Sampah', 'required', [
            'required' => 'Berat Sampah harus diisi!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Pengambilan Gagal!!</div>');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('petugas/index', $data);
            $this->load->view('templates/footer');
        } else {
            $query = [
                'user_id' => $user_id,
                'setoran' => $setoran,
                'tanggal' => time()
            ];
            $query2 = [
                'status' => 'diambil'
            ];
            $this->db->insert('tabungan', $query);
            $this->db->where('id', $_POST['req_id']);
            $this->db->update('req', $query2);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Pengambilan berhasil!!</div>');
            redirect('petugas/index');
        }
    }

    public function histori()
    {
        $data['title'] = 'Histori Pengambilan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['histori'] = $this->petugas->getHistori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/histori', $data);
        $this->load->view('templates/footer');
    }
}
