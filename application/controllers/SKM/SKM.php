<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SKM extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Front/M_SKM');
		$this->load->model('M_Laporan_SKM');
	}

	public function index()
	{
		$data['Pertanyaan'] = $this->M_SKM->get_all_by_table('master_pertanyaan');
		$this->load->view('SKM/index', $data);
	}

	public function get_data_skm()
	{
		$data['title'] = 'Halaman Laporan Survei Kepuasan Masyarakat';
		$data['semester'] = $this->input->post('semester');
		$data['tahun'] = $this->input->post('tahun');

		$data['data_skm'] = $this->M_SKM->get_skm($data['semester'], $data['tahun']);

		//grafik alamat
		$data['hadimulyo_barat'] = count($this->M_SKM->get_SKM_alamat($data['semester'], $data['tahun'], 'Hadimulyo Barat'));
		$data['hadimulyo_timur'] = count($this->M_SKM->get_SKM_alamat($data['semester'], $data['tahun'], 'Hadimulyo Timur'));
		$data['metro'] = count($this->M_SKM->get_SKM_alamat($data['semester'], $data['tahun'], 'Metro'));
		$data['yosomulyo'] = count($this->M_SKM->get_SKM_alamat($data['semester'], $data['tahun'], 'Yosomulyo'));

		//grafik pekerjaan
		$data['PNS_TNI_POLRI'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'PNS/TNI/POLRI'));
		$data['P_swasta'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'Pegawai Swasta'));
		$data['Wiraswasta'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'Wirausaha/Usaha'));
		$data['Mahasiswa'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'Pelajar/Mahasiswa'));
		$data['Petani'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'Petani'));
		$data['Pedagang'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'Pedagang'));
		$data['Buruh'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'Buruh'));
		$data['Lainnya'] = count($this->M_SKM->get_SKM_pekerjaan($data['semester'], $data['tahun'], 'Lainnya'));

		//grafik pelayanan
		$data['KTP'] = count($this->M_SKM->get_SKM_layanan($data['semester'], $data['tahun'], 'Kartu Tanda Penduduk(KTP)'));
		$data['KK'] = count($this->M_SKM->get_SKM_layanan($data['semester'], $data['tahun'], 'Kartu Keluarga(KK)'));
		$data['IMB'] = count($this->M_SKM->get_SKM_layanan($data['semester'], $data['tahun'], 'Izin Membuat Bangunan (IMB)'));
		$data['HO'] = count($this->M_SKM->get_SKM_layanan($data['semester'], $data['tahun'], 'HO (gangguan)'));
		$data['SKTM'] = count($this->M_SKM->get_SKM_layanan($data['semester'], $data['tahun'], 'Surat Keterangan Tidak Mampu (SKTM)'));

		//grafik pendidikan
		$data['SD'] = count($this->M_SKM->get_SKM_pendidikan($data['semester'], $data['tahun'], 'SD Ke Bawah'));
		$data['SLTP'] = count($this->M_SKM->get_SKM_pendidikan($data['semester'], $data['tahun'], 'SLTP'));
		$data['SLTA'] = count($this->M_SKM->get_SKM_pendidikan($data['semester'], $data['tahun'], 'SLTA'));
		$data['Diploma'] = count($this->M_SKM->get_SKM_pendidikan($data['semester'], $data['tahun'], 'D1, D3, D4'));
		$data['S1'] = count($this->M_SKM->get_SKM_pendidikan($data['semester'], $data['tahun'], 'S1'));
		$data['S2'] = count($this->M_SKM->get_SKM_pendidikan($data['semester'], $data['tahun'], 'S2 Ke Atas'));

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/SKM/data_skm_2', $data);
		$this->load->view('front/Template/footer');
	}


	public function data_real_skm()
	{
		$this->chart();
	}

	public function chart()
	{
		$skm_rekap = $this->M_SKM->get_skm_rekap();
		$data = array(
			'title' => 'Halaman Laporan Survei Kepuasan Masyarakat',
			'judul' => 'SURVEY KEPUASAN MASYARAKAT(SKM) KECAMATAN METRO PUSAT',
			'skm_rekap' => $skm_rekap
		);

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/SKM/data_skm', $data);
		$this->load->view('front/Template/footer');
	}

	public function Tambah_data()
	{

		$temp = $this->db->query('SELECT no_responden FROM skm_biodata ORDER BY id_skm_biodata DESC limit 1')->result();
		if (empty($temp)) {
			$temp[0]->no_responden = 0;
		}

		$tanggal = date("m", strtotime($this->input->post('tanggal')));

		if ($tanggal >= 01 and $tanggal <= 06) {
			$sem = 1;
		} else {
			$sem = 2;
		}

		$masuk_biodata['semester'] = $sem;
		$masuk_biodata['no_responden'] = $temp[0]->no_responden + 1;
		$masuk_biodata['NIK'] = $this->input->post('NIK');
		$masuk_biodata['umur'] = $this->input->post('umur');
		$masuk_biodata['jenis_kelamin'] = $this->input->post('JK');
		$masuk_biodata['alamat'] = $this->input->post('alamat');
		$masuk_biodata['pendidikan'] = $this->input->post('pendidikan');
		$masuk_biodata['pekerjaan'] = $this->input->post('pekerjaan');
		$masuk_biodata['pelayanan'] = $this->input->post('pelayanan');
		$masuk_biodata['tgl_entri'] = $this->input->post('tanggal');
		$masuk_biodata['wkt_entri'] = date('h:s:i');
		$id_biodata = $this->M_SKM->insert($masuk_biodata);

		$Pertanyaan = $this->M_SKM->get_all_by_table('master_pertanyaan');
		foreach ($Pertanyaan as $key => $value) {
			$masuk_kuesioner['id_skm_biodata'] = $id_biodata;
			$masuk_kuesioner['id_pertanyaan'] = $this->input->post('id_pertanyaan_' . $value->id_pertanyaan);
			$masuk_kuesioner['jawaban'] = $this->input->post('jwbn' . $value->id_pertanyaan);
			$this->M_SKM->insert_kuesioner($masuk_kuesioner);
		}

		$this->session->set_flashdata('msg', 'Berhasil_simpan');
		redirect("SKM/SKM");
	}

	public function get_data_pelayanan()
	{
		$data['title'] = 'Halaman Laporan Survei Kepuasan Masyarakat';
		$data['semester'] = $this->input->post('semester');
		$data['tahun'] = $this->input->post('tahun');
		$data['pelayanan'] = $this->input->post('pelayanan');

		$data['data_skm'] = $this->M_SKM->get_SKM_layanan($data['semester'], $data['tahun'], $data['pelayanan']);


		//grafik alamat
		$data['hadimulyo_barat'] = count($this->M_SKM->data_SKM_alamat($data['semester'], $data['tahun'], $data['pelayanan'], 'Hadimulyo Barat'));
		$data['hadimulyo_timur'] = count($this->M_SKM->data_SKM_alamat($data['semester'], $data['tahun'], $data['pelayanan'], 'Hadimulyo Timur'));
		$data['metro'] = count($this->M_SKM->data_SKM_alamat($data['semester'], $data['tahun'], $data['pelayanan'], 'Metro'));
		$data['yosomulyo'] = count($this->M_SKM->data_SKM_alamat($data['semester'], $data['tahun'], $data['pelayanan'], 'Yosomulyo'));

		//grafik pekerjaan
		$data['PNS_TNI_POLRI'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'PNS/TNI/POLRI'));
		$data['P_swasta'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'Pegawai Swasta'));
		$data['Wiraswasta'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'Wirausaha/Usaha'));
		$data['Mahasiswa'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'Pelajar/Mahasiswa'));
		$data['Petani'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'Petani'));
		$data['Pedagang'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'Pedagang'));
		$data['Buruh'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'Buruh'));
		$data['Lainnya'] = count($this->M_SKM->data_SKM_pekerjaan($data['semester'], $data['tahun'], $data['pelayanan'], 'Lainnya'));

		//grafik pendidikan
		$data['SD'] = count($this->M_SKM->data_SKM_pendidikan($data['semester'], $data['tahun'], $data['pelayanan'], 'SD Ke Bawah'));
		$data['SLTP'] = count($this->M_SKM->data_SKM_pendidikan($data['semester'], $data['tahun'], $data['pelayanan'], 'SLTP'));
		$data['SLTA'] = count($this->M_SKM->data_SKM_pendidikan($data['semester'], $data['tahun'], $data['pelayanan'], 'SLTA'));
		$data['Diploma'] = count($this->M_SKM->data_SKM_pendidikan($data['semester'], $data['tahun'], $data['pelayanan'], 'D1, D3, D4'));
		$data['S1'] = count($this->M_SKM->data_SKM_pendidikan($data['semester'], $data['tahun'], $data['pelayanan'], 'S1'));
		$data['S2'] = count($this->M_SKM->data_SKM_pendidikan($data['semester'], $data['tahun'], $data['pelayanan'], 'S2 Ke Atas'));

		$this->load->view('front/Template/header', $data);
		$this->load->view('front/SKM/data_skm_pelayanan', $data);
		$this->load->view('front/Template/footer');
	}
}