<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_pengumuman');
  }

  public function index()
  {
    // $this->m_auth->cek_login();
    $data['p'] = $this->M_pengumuman->get_all_data();
    $data['title'] = 'Pengumuman';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/pengumuman', $data);
    $this->load->view('admin/footer', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('judul', 'Judul', 'required', array(
      'required' => '%s harus di isi'
    ));

    $this->form_validation->set_rules('isi', 'Isi berita', 'required', array(
      'required' => '%s harus di isi'
    ));

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/img/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']     = '4048';
      $this->upload->initialize($config);
      $field_name = "gambar";
      // jika tidak mengupload gambar
      if (!$this->upload->do_upload($field_name)) {
        $data = array(
          'title' => 'Add Pengumuman',
          'error_upload' => $this->upload->display_errors(),
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/add_pengumuman', $data);
        $this->load->view('admin/footer');
      } else {
        $upload_data = array('uploads' => $this->upload->data());

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/img/' . $upload_data['uploads']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'judul' => $this->input->post('judul'),
          'isi' => $this->input->post('isi'),
          'gambar' => $upload_data['uploads']['file_name'],
        );
        $this->M_pengumuman->add($data);
        $this->session->set_flashdata('pengumuman', 'Pengumuman Berhasil ditambahkan !!!');
        redirect('pengumuman');
      }
    }
    $data = array(
      'title' => 'Add Pengumuman',
    );
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/add_pengumuman', $data);
    $this->load->view('admin/footer');
  }

   public function hapusPengumuman($id_pengumuman = NULL)
    {
      $data = array('id_pengumuman' => $id_pengumuman);
      $this->M_pengumuman->hapusPengumuman($data);
      $this->session->set_flashdata('pengumuman', 'Pengumuman berhasil dihapus!!!');
      redirect('pengumuman');
    }

}
