<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
  }

  public function index()
  {
    $this->m_auth->cek_login();
    $data['title'] = 'Administrator';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/footer', $data);
  }
}
