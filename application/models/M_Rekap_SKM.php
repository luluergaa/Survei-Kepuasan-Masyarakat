<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Rekap_SKM extends CI_Model
{

	public function insert($data)
	{
		$this->db->insert('skm_rekap', $data);
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('skm_rekap');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('skm_rekap');
		$this->db->where('id_skm_rekap', $id);
		$query = $this->db->get();
		return $query->result();
	}


	public function update_rekap($id, $data)
	{
		$this->db->where('id_skm_rekap', $id);
		$this->db->update('skm_rekap', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_skm_rekap', $id);
		$this->db->delete('skm_rekap');
	}

	public function get_id_rekap($id_skm_rekap)
	{
		return $this->db->get_where('skm_rekap', ['id_skm_rekap' => $id_skm_rekap])->row_array();
	}

	public function proses_edit_rekap()
	{
		$data = [
			"tahun" => $this->input->post('tahun'),
			"nilai" => $this->input->post('nilai')
		];

		$this->db->where('id_skm_rekap', $this->input->post('id_skm_rekap'));
		$this->db->update('skm_rekap', $data);
	}
}