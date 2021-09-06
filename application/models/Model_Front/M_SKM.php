<?php
class M_SKM extends CI_Model
{

	public function insert($data)
	{
		$this->db->insert('skm_biodata', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function insert_kuesioner($data)
	{
		$this->db->insert('skm_kuesioner', $data);
	}


	public function get_all_by_table($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_skm($semester, $tahun)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('skm_biodata.semester', $semester);
		// $this->db->join('master_pekerjaan', 'skm_biodata.pekerjaan=master_pekerjaan.kdpekerjaan');
		// $this->db->join('master_pelayanan', 'skm_biodata.pelayanan=master_pelayanan.kdpelayanan');
		// $this->db->join('master_pendidikan', 'skm_biodata.pendidikan=master_pendidikan.kdpendidikan');
		// $this->db->join('master_alamat', 'skm_biodata.alamat=master_alamat.kdalamat');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_SKM_alamat($semester, $tahun, $alamat)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('semester', $semester);
		$this->db->where('alamat', $alamat);
		// $this->db->join('master_alamat', 'skm_biodata.alamat=master_alamat.kdalamat');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_SKM_pendidikan($semester, $tahun, $pendidikan)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('semester', $semester);
		$this->db->where('pendidikan', $pendidikan);
		// $this->db->join('master_alamat', 'skm_biodata.alamat=master_alamat.kdalamat');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_SKM_layanan($semester, $tahun, $pelayanan)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('semester', $semester);
		$this->db->where('pelayanan', $pelayanan);
		// $this->db->join('master_pelayanan', 'skm_biodata.pelayanan=master_pelayanan.kdpelayanan');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_SKM_pekerjaan($semester, $tahun, $pekerjaan)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('semester', $semester);
		$this->db->where('pekerjaan', $pekerjaan);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_skm_rekap($id_skm_rekap = '')
	{
		$this->db->select('*');
		$this->db->from('skm_rekap');
		// $this->db->where('tahun', $tahun);
		// $this->db->where('nilai', $nilai);

		if ($id_skm_rekap != '') {
			$this->db->where('skm_rekap.id_skm_rekap', $id_skm_rekap);
		}
		$this->db->order_by('skm_rekap.id_skm_rekap ASC, skm_rekap.tahun ASC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function data_SKM_alamat($semester, $tahun, $pelayanan, $alamat)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('semester', $semester);
		$this->db->where('pelayanan', $pelayanan);
		$this->db->where('alamat', $alamat);
		// $this->db->join('master_alamat', 'skm_biodata.alamat=master_alamat.kdalamat');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function data_SKM_pendidikan($semester, $tahun, $pelayanan, $pendidikan)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('semester', $semester);
		$this->db->where('pelayanan', $pelayanan);
		$this->db->where('pendidikan', $pendidikan);
		// $this->db->join('master_alamat', 'skm_biodata.alamat=master_alamat.kdalamat');
		$query = $this->db->get();
		return $query->result();
	}

	public function data_SKM_pekerjaan($semester, $tahun, $pelayanan, $pekerjaan)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('semester', $semester);
		$this->db->where('pelayanan', $pelayanan);
		$this->db->where('pekerjaan', $pekerjaan);
		$query = $this->db->get();
		return $query->result();
	}
}