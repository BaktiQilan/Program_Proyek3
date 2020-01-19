<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_role();
        $this->load->model('Tabungan_model', 'tabungan');
    }

    public function index()
    {
        $data['title'] = 'Tabungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tabungan'] = $this->tabungan->getTabungan();
        $data['nasabah'] = $this->tabungan->getNasabah();
        $data['total'] = $this->tabungan->getTotal();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tabungan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tarik()
    {
        $data['title'] = 'Meminta Penarikan Saldo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['nasabah'] = $this->db->get_where('user_detail', ['user_id' => $this->session->userdata('id')])->row_array();
        $data['histori'] = $this->tabungan->histori();

        $this->form_validation->set_rules('tarik', 'Jumlah Penarikan', 'required|trim', [
            'required' => 'berapa jumlah yang ingin ditarik?'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tabungan/tarik', $data);
            $this->load->view('templates/footer');
        } else {
            $isi = [
                'user_id' => $this->input->post('user_id'),
                'penarikan' => $this->input->post('tarik'),
                'tanggal' => time(),
                'status' => 'belum disetujui'
            ];
            $this->db->insert('tarik', $isi);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Permintaan Penjemputan telah ditambahkan!</div>');
            redirect('tabungan/tarik');
        }
    }
}
