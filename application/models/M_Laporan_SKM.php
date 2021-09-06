<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Laporan_SKM extends CI_Model
{
	public function get_all($semester, $tahun)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$this->db->where('skm_biodata.semester', $semester);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_table($tahun)
	{
		$this->db->select('*');
		$this->db->from('skm_biodata');
		$this->db->where('year(tgl_entri)', $tahun);
		$query = $this->db->get();
		return $query->result();
	}

	public function gettahun()
	{
		$query = $this->db->query("SELECT YEAR(tgl_entri) AS tahun FROM skm_biodata GROUP BY YEAR(tgl_entri) ORDER BY YEAR(tgl_entri) ASC");
		return $query->result();
	}


	public function filterbytahun($tahun2)
	{
		$query = $this->db->query("SELECT * FROM skm_biodata where YEAR(tgl_entri) = '$tahun2' ORDER BY tgl_entri ASC ");
		return $query->result();
	}

	public function get_total_jawaban_per_tahun($tgl_entri)
	{
		$this->db->select('sum(jawaban) as total_jawaban');
		$this->db->from('skm_kuesioner');
		$this->db->join('skm_biodata', 'skm_biodata.id_skm_biodata= skm_kuesioner.id_skm_biodata');
		$this->db->where('year(tgl_entri)', $tgl_entri);
		$this->db->group_by("id_pertanyaan");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_total_jawaban_per_pertanyaan($tgl_entri, $semester)
	{
		$this->db->select('sum(jawaban) as total_jawaban');
		$this->db->from('skm_kuesioner');
		$this->db->join('skm_biodata', 'skm_biodata.id_skm_biodata= skm_kuesioner.id_skm_biodata');
		$this->db->where('year(tgl_entri)', $tgl_entri);
		$this->db->where('semester', $semester);
		$this->db->group_by("id_pertanyaan");
		$query = $this->db->get();
		return $query->result();
	}
}