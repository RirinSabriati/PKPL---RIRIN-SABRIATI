<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengumuman');
	}

	public function index()
	{
		$data['p'] = $this->m_pengumuman->get_all_data();
		$this->load->view('home/home', $data);
	}

	public function detail($id_pengumuman)
	{

		$data['p'] = $this->m_pengumuman->detail($id_pengumuman);
		$this->load->view('home/detail', $data);
	}
}
