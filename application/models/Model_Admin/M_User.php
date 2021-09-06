<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
	public function get_table($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('login');
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('login', $data);
	}
}