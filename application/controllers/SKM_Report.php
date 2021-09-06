<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SKM_Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('Pdf_report');
		$this->load->model('M_Laporan_SKM');
	}

	public function index($semester = "", $tahun = "")
	{
		if ($this->input->post('semester') != null and $this->input->post('tahun') != null) {
			$semester = $this->input->post('semester');
			$tahun = $this->input->post('tahun');
		}

		$data['title'] = 'Laporan SKM Persemester';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['Kuesioner'] = $this->M_Laporan_SKM->get_all($semester, $tahun);
		$data['semester'] = $semester;
		$data['tahun'] = $tahun;
		$data['jmlh_responden'] = count($data['Kuesioner']);
		$data['nilai_SKM'] = $this->Hitung_SKM($data['jmlh_responden'], $data['semester'], $data['tahun']);

		$this->load->view('member/report_skm', $data);
	}

	public function Hitung_SKM($jmlh_responden, $semester, $tahun)
	{

		$a = $this->M_Laporan_SKM->get_total_jawaban_per_pertanyaan($tahun, $semester);
		$jmlh = 0;
		foreach ($a as $key => $value) {
			$jmlh += (($value->total_jawaban / $jmlh_responden) * (0.11));
		}

		return $hasil = $jmlh * 25;
	}
}