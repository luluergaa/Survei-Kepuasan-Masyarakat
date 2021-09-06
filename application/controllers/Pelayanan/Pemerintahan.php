<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemerintahan extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Bidang Pemerintahan';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/pelayanan/pemerintahan', $data);
		$this->load->view('front/Template/footer');
	}
}