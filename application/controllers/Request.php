<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Request_model', 'request');
    }

    public function index()
    {
        $data['title'] = 'Meminta Penjemputan Sampah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['nasabah'] = $this->db->get_where('user_detail', ['user_id' => $this->session->userdata('id')])->row_array();
        $data['histori'] = $this->request->histori();


        $this->form_validation->set_rules('tanggal', 'Tanggal Penjemputan', 'required|trim', [
            'required' => 'tanggal harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('request/index', $data);
            $this->load->view('templates/footer');
        } else {
            $tanggal = htmlentities($_POST['tanggal']);;

            $isi = [
                'user_id' => $this->input->post('user_id'),
                'alamat' => $this->input->post('alamatt'),
                'tgl_jemput' => date('Y-m-d', strtotime($tanggal)),
                'status' => 'Belum diambil'
            ];
            $this->db->insert('req', $isi);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Permintaan Penjemputan telah ditambahkan!</div>');
            redirect('request/index');
        }
    }
}
