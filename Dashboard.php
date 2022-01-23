<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
  }

  public function index()
  {
    $this->m_auth->cek_login();
    $data['title'] = 'Dashboard';
    $this->load->view('dashboard/dashboard', $data);
  }
}
