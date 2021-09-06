<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perekonomian extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Bidang Perekonomian';

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/pelayanan/perekonomian', $data);
		$this->load->view('front/Template/footer');
	}
}