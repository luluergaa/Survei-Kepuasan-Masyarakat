<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Halaman Home';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/home', $data);
		$this->load->view('front/Template/footer');
	}

	public function pelayanan()
	{
		$data['title'] = 'Halaman Pelayanan';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/pelayanan', $data);
		$this->load->view('front/Template/footer');
	}
}