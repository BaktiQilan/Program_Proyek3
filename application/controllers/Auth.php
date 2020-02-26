<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'email harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'password harus diisi!'
        ]);

        if ($this->form_validation->run()  == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {

            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {

            if ($user['is_active'] ==  1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/aktivasi');
                    }
                    if ($user['role_id'] == 3) {
                        redirect('petugas');
                    } else {
                        redirect('tabungan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Email tidak aktif</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->load->model('Auth_model', 'auth');

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'nama harus diisi!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'alamat harus diisi!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'email harus diisi!',
            'valid_email' => 'format email salah!',
            'is_unique' => 'email ini sudah terdaftar!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'password harus diisi!',
            'matches' => 'password tidak sama!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'password harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Bank Sampah';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('radiob', true),
                'is_active' => 1,
                'date_created' => time(),
            ];
            $data1 = [
                'no_rek' => 0,
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'scan_ktp' => 'default.png',
                'scan_kk' => 'default.png',
                'user_id' => $this->auth->create('user', $data),
                'role_id' => $this->input->post('radiob', true),
            ];
            $insert1 = $this->auth->create('user_detail', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Selamat! Akun anda telah berhasil dibuat. Silahkan Login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Anda telah berhasil Logout</div>');
        redirect('welcome');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
