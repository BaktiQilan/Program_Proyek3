<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kode extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Rek_model', 'rek');
    }

    public function index()
    {
        $data['rek'] = $this->Rek_model->buat_rek();
        $this->load->view('admin/aktivasi', $data);
    }
}
