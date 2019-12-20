<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_role();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'nama harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nama = $this->input->post('name');
            $id = $this->input->post('id');

            //untuk cek foto
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size']      = '3000';
                $config['upload_path']      = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image =  $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . ('assets/img/profile/') . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->db->set('nama', $nama);
            $this->db->where('user_id', $id);
            $this->db->update('user_detail');

            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Profile anda telah diperbaharui!</div>');
            redirect('user');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required|trim', [
            'required' => 'password sekarang harus diisi'
        ]);
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]', [
            'required' => 'password baru harus diisi!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password_baru1]', [
            'required' => 'konfirmasu password harus diisi!',
            'matches' => 'password tidak sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $password_sekarang = $this->input->post('password_sekarang');
            $password_baru = $this->input->post('password_baru1');

            if (!password_verify($password_sekarang, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Masukan Password sekarang dengan benar!</div>');
                redirect('user/ubahpassword');
            } else {
                if ($password_sekarang == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Password tidak boleh sama!</div>');
                    redirect('user/ubahpassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Password telah diubah!</div>');
                    redirect('user/ubahpassword');
                }
            }
        }
    }

    public function data()
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
            $this->load->view('user/data', $data);
            $this->load->view('templates/footer');
        } else {
            //untuk cek foto
            $upload_image1 = $_FILES['fotoktp']['name'];
            if ($upload_image1) {
                $config1['allowed_types'] = 'jpg|png|gif';
                $config1['max_size']      = '3000';
                $config1['upload_path']      = './assets/img/scan/ktp/';

                $this->load->library('upload', $config1);

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
            redirect('user/data');
        }
    }
}
