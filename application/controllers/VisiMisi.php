<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VisiMisi extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Visi dan Misi';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/visimisi', $data);
		$this->load->view('front/Template/footer');
	}
}