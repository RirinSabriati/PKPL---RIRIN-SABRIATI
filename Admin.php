<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin');
  }

  public function index()
  {
    $data = array(
      'title' => 'Login Administrator'
    );
    $this->load->view('admin/v_login', $data);
  }

  public function prosesadmin()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    if ($this->m_admin->login_admin($username, $password)) {
      redirect('administrator');
    } else {
      $this->session->set_flashdata('salah', 'Username & Password salah');
      redirect('admin');
    }
  }


  public function logout()
  {
    $this->session->unset_userdata('nim');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('is_login');
    $this->session->set_flashdata('logout', 'Anda berhasil keluar');
    redirect('admin');
  }
}
