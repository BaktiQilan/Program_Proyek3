<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_role();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Menu harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Menu baru telah ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id', 'Id', 'required', [
            'required' => 'tidak ada id'
        ]);
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Menu gagal di edit!</div>');
            redirect('menu');
        } else {
            $data = array(
                "menu" => $_POST['menu'],
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Menu berhasil di edit!</div>');
            redirect('menu');
        }
    }

    public function hapus($id)
    {
        $this->load->model('Menu_model', 'menu');
        $this->menu->hapusMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Menu berhasil dihapus</div>');
        redirect('menu');
    }

    public function hapussm($id)
    {
        $this->load->model('Menu_model', 'menu');
        $this->menu->hapusSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Submenu berhasil dihapus</div>');
        redirect('menu/submenu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'title harus diisi'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'menu harus diisi'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => 'url harus diisi'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', [
            'required' => 'icon harus diisi'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Submenu baru telah ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function editsm()
    {
        $this->form_validation->set_rules('id', 'Id', 'required', [
            'required' => 'tidak ada id'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Title', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Menu gagal di edit!</div>');
            redirect('menu/submenu');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon')
            ];
            $this->db->where('id', $_POST['id']);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto" role="alert">Menu berhasil di edit!</div>');
            redirect('menu/submenu');
        }
    }
}
