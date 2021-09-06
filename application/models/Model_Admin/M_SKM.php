<?php
class M_SKM extends CI_Model
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


	public function update($id_skm_biodata, $id_pertanyaan, $data)
	{
		$this->db->where('id_skm_biodata', $id_skm_biodata);
		$this->db->where('id_pertanyaan', $id_pertanyaan);
		$this->db->update('skm_kuesioner', $data);
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

	public function delete_skm_biodata($id)
	{
		$this->db->where('id_skm_biodata', $id);
		$this->db->delete('skm_biodata');
	}


	public function delete_skm_kuesioner($id)
	{
		$this->db->where('id_skm_biodata', $id);
		$this->db->delete('skm_kuesioner');
	}

	public function get_skm_rekap($id_skm_rekap = '')
	{
		$this->db->select('*');
		$this->db->from('skm_rekap');

		if ($id_skm_rekap != '') {
			$this->db->where('skm_rekap.id_skm_rekap', $id_skm_rekap);
		}
		$this->db->order_by('skm_rekap.id_skm_rekap ASC, skm_rekap.tahun ASC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_role($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_role($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}