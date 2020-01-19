<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Data Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['detail'] = $this->db->get_where('user_detail', ['user_id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'nama harus diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'alamat harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/index', $data);
            $this->load->view('templates/footer');
        } else {
            //untuk cek foto
            $upload_image1 = $_FILES['fotoktp']['name'];
            if ($upload_image1) {
                $config1['allowed_types'] = 'jpg|png|gif';
                $config1['max_size']      = '3000';
                $config1['upload_path']      = './assets/img/scan/ktp/';

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);

                if ($this->upload->do_upload('fotoktp')) {
                    $old_image1 =  $data['user_detail']['scan_ktp'];
                    if ($old_image1 != 'default.png') {
                        unlink(FCPATH . ('assets/img/scan/ktp/') . $old_image1);
                    }

                    $new_image1 = $this->upload->data('file_name');
                    $this->db->set('scan_ktp', $new_image1);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $upload_image2 = $_FILES['fotokk']['name'];
            if ($upload_image2) {
                $config2['allowed_types'] = 'jpg|png|gif';
                $config2['max_size']      = '3000';
                $config2['upload_path']      = './assets/img/scan/kk/';

                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);

                if ($this->upload->do_upload('fotokk')) {
                    $old_image2 =  $data['user_detail']['scan_kk'];
                    if ($old_image2 != 'default.png') {
                        unlink(FCPATH . ('assets/img/scan/kk/') . $old_image2);
                    }

                    $new_image2 = $this->upload->data('file_name');
                    $this->db->set('scan_kk', $new_image2);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $isi = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->db->where('id', $_POST['id']);
            $this->db->update('user_detail', $isi);
            $this->db->set('name', $_POST['nama']);
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Profile anda telah diperbaharui!</div>');
            redirect('data/index');
        }
    }
}
