<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchController extends CI_Controller
{

  public function index()
  {
    $this->load->model('SearchModel');
    $keyword = $this->input->get('keyword');
    $nilai = $this->SearchModel->ambil_data($keyword);
    $data = array(
      'keyword'  => $keyword,
      'n'    => $nilai,
      'title' => 'nilai',
    );
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/carinilai', $data);
    $this->load->view('admin/footer');
  }
}