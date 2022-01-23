<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
  }

  public function index()
  {
    $this->m_auth->sudah_login();
    $data = array(
      'title' => 'Login'
    );
    $this->load->view('login/v_login', $data);
  }

  public function proses()
  {
    $nim = $this->input->post('nim');
    $password = $this->input->post('password');
    if ($this->m_auth->login_user($nim, $password)) {
      redirect('dashboard');
    } else {
      $this->session->set_flashdata('salah', 'Username & Password salah');
      redirect('auth');
    }
  }

  public function register()
  {
    $data = array(
      'title' => 'Register'
    );
    $this->load->view('login/v_register', $data);
  }

  public function daftar()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'trim|required|is_unique[tb_user.nim]');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('hp', 'No HP', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_rules('rpassword', 'Ulangi Password', 'trim|required|matches[password]');

    $this->form_validation->set_message('required', '%s Harus diisi');
    $this->form_validation->set_message('matches', '%s Harus sama dengan Password');

    if ($this->form_validation->run() == true) {
      $nim = $this->input->post('nim');
      $nama = $this->input->post('nama');
      $hp = $this->input->post('hp');
      $password = $this->input->post('password');
      $this->m_auth->register($nim, $nama, $hp, $password);
      $this->session->set_flashdata('daftar', 'Proses Pendaftaran Akun Berhasil');
      redirect('auth');
    } else {
      $this->session->set_flashdata('error', validation_errors());
      redirect('auth/register');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nim');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('is_login');
    $this->session->set_flashdata('logout', 'Anda berhasil keluar');
    redirect('auth');
  }
}
