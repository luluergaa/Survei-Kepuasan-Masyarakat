<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesra extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Bidang Kesejahteraan Rakyat(Kesra)';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/pelayanan/kesra', $data);
		$this->load->view('front/Template/footer');
	}
}