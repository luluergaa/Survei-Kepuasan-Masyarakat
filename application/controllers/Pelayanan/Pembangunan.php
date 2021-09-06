<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembangunan extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Bidang Pembangunan';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/pelayanan/pembangunan', $data);
		$this->load->view('front/Template/footer');
	}
}