<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Nilai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_nilai');
  }
  public function index()
  {
    $data['n'] = $this->M_nilai->get_all_data();
    $data['title'] = 'Nilai';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/nilai', $data);
    $this->load->view('admin/footer');
  }
  public function add()
  {
    $data['p'] = $this->M_nilai->get_all_pendaftar();
    $data['title'] = 'Nilai';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/add_nilai', $data);
    $this->load->view('admin/footer');
  }
  public function prosesadd()
  {
    // $this->form_validation->set_rules('nim', 'NIM', 'required');
    $this->form_validation->set_rules('nilai', 'Nilai', 'required');

    $this->form_validation->set_message('required', '%s Harus diisi');

    if ($this->form_validation->run() == TRUE) {
      $nim = $this->input->post('nim');
      $nilai = $this->input->post('nilai');
      $this->M_nilai->add($nim, $nilai);
      $this->session->set_flashdata('daftar', 'Proses Pendaftaran Akun Berhasil');
      redirect('nilai');
    } else {
      $this->session->set_flashdata('error', validation_errors());
      redirect('nilai/add');
    }
  }

  public function hapusNilai($id_nilai = NULL)
  {
    $data = array('id_nilai' => $id_nilai);
    $this->M_nilai->hapusNilai($data);
    $this->session->set_flashdata('nilai', 'Nilai berhasil dihapus!!!');
    redirect('nilai');
  }

  public function editNilai($id_nilai = null)
  {
    // form validasi
    $this->form_validation->set_rules('nilai', 'Nilai', 'required');
    // menampilkan pesan error
    $this->form_validation->set_message('required', '%s masih kosong, Silahkan diisi!');

    if ($this->form_validation->run() == false) {
      $query = $this->m_datadesa->getAgama($id_nilai);
      if ($query->num_rows() > 0) {
        $data = array(
          'title' => 'Edit Nilai',
          'row' => $query->row(),
          'isi' => 'admin/v_editAgama'
        );
      } else {
        echo "<script> alert('Data Nilai tidak ditemukan!'); ";
        echo "window.location='" . site_url('datadesa/agama') . "';</script>";
      }
      $this->load->view('layout/back/v_wrapper', $data);
    } else {
      $post = $this->input->post(null, TRUE);
      $this->M_nilai->editAgama($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('agama', 'Data Nilai Berhasil di edit');
        redirect('datadesa/agama');
      } else {
        $this->session->set_flashdata('agamagagal', 'Data Nilai Gagal diedit');
        redirect('datadesa/agama');
      }
    }
  }


}
