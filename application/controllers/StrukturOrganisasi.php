<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StrukturOrganisasi extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Struktur Organisasi';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/strukturorganisasi', $data);
		$this->load->view('front/Template/footer');
	}
}