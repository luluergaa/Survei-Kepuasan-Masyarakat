<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tupoksi extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Tupoksi';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/tupoksi', $data);
		$this->load->view('front/Template/footer');
	}
}