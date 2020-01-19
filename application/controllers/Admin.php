<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_role();
        $this->load->model('Aktivasi_model', 'aktivasi', true);
        $this->load->model('Admin_model', 'admin', true);
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Role baru telah ditambahkan!</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id != 1');
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Akses telah berubah!</div>');
    }

    public function hapus($id)
    {
        $this->load->model('Admin_model', 'role');
        $this->role->hapusRole($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Role berhasil dihapus</div>');
        redirect('admin/role');
    }

    public function edit()
    {
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Role gagal di edit!</div>');
            redirect('admin/role');
        } else {
            $data = [
                'role' => $this->input->post('role')
            ];
            $this->db->where('id', $_POST['id']);
            $this->db->update('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Role berhasil di edit!</div>');
            redirect('admin/role');
        }
    }

    public function aktivasi()
    {
        $data['title'] = 'Aktivasi Nasabah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['hasil'] = $this->db->get_where('user_detail', ['role_id' => '2'])->result_array();
        $data['aktivasi'] = $this->admin->getAktivasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/aktivasi', $data);
        $this->load->view('templates/footer');
    }

    public function editrek($id)
    {
        $this->load->model('Aktivasi_model', 'aktivasi');
        $this->aktivasi->editRek($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Akun Diaktifkan!</div>');
        redirect('admin/aktivasi');
    }

    public function sampah()
    {
        $data['title'] = 'Data Sampah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['sampah'] = $this->db->get('sampah')->result_array();

        $this->form_validation->set_rules('nama', 'Jenis Sampah', 'required', [
            'required' => 'Jenis Sampah harus diisi!'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/sampah', $data);
            $this->load->view('templates/footer');
        } else {
            $query = [
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->insert('sampah', $query);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Data Sampah telah ditambahkan!</div>');
            redirect('admin/sampah');
        }
    }

    public function hapusS($id)
    {
        $this->load->model('Admin_model', 'sampah');
        $this->sampah->hapusSampah($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Data Sampah berhasil dihapus</div>');
        redirect('admin/sampah');
    }

    public function editS()
    {
        $this->form_validation->set_rules('nama', 'Jenis Sampah', 'required', [
            'required' => 'Jenis Sampah harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Data Sampah gagal di edit!</div>');
            redirect('admin/sampah');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga')
            ];
            $this->db->where('id', $_POST['id']);
            $this->db->update('sampah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Data Sampah berhasil di edit!</div>');
            redirect('admin/sampah');
        }
    }

    public function jemput()
    {
        $data['title'] = 'Permintaan Jemput Sampah dari Nasabah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jemput'] = $this->admin->getAll();
        $data['nama'] = $this->admin->getJadwal();
        $data['petugas'] = $this->db->get_where('user', ['role_id' => '3'])->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jemput', $data);
        $this->load->view('templates/footer');
    }

    public function aturP()
    {
        $this->form_validation->set_rules('petugas', 'Petugas', 'required', [
            'required' => 'Petugas Harus dipilih!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Data Penjemputan gagal di jadwalkan!</div>');
            redirect('admin/jemput');
        } else {
            $query = [
                'req_id' => $this->input->post('req_id'),
                'petugas_id' => $this->input->post('petugas')
            ];
            $this->db->insert('jadwal', $query);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Data Penjemputan berhasil di jadwalkan!</div>');
            redirect('admin/jemput');
        }
    }

    public function histori()
    {
        $data['title'] = 'Histori Penjemputan Sampah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['histori'] = $this->admin->getHistori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/histori', $data);
        $this->load->view('templates/footer');
    }

    public function tarik()
    {
        $data['title'] = 'Permintaan Penarikan Saldo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penarikan'] = $this->admin->penarikan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tarik');
        $this->load->view('templates/footer');
    }

    public function saldoTarik()
    {
        $this->form_validation->set_rules('id', 'Id', 'required', [
            'required' => 'id Harus dipilih!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Penarikan Saldo gagal di Validasi!</div>');
            redirect('admin/tarik');
        } else {
            $query = [
                'user_id' => $this->input->post('user_id'),
                'penarikan' => $this->input->post('penarikan'),
                'tanggal' => time()
            ];
            $query2 = [
                'status' => 'disetujui'
            ];
            $this->db->insert('tabungan', $query);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tarik', $query2);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Penarikan Saldo berhasil!</div>');
            redirect('admin/tarik');
        }
    }

    public function hapusTarik()
    {
        $id = $this->input->post('id');
        $this->admin->hapus_tarik($id);
        $this->session->set_flashdata('message', '<div class="alert alert-info mx-auto" role="alert">Data Penarikan tidak disetujui!</div>');
        redirect('admin/tarik');
    }
}
