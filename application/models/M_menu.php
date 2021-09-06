<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{
	public function login()
	{
		return $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function insert($data)
	{
		$this->db->insert('user_menu', $data);
	}

	public function getAllMenu()
	{
		return $this->db->get('user_menu')->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('user_menu');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function update_menu($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('user_menu', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_menu');
	}


	public function getMenuById($id)
	{

		return $this->db->get_where('user_menu', ['id' => $id])->row_array();
	}

	public function proses_edit_menu($id)
	{
		$data = [
			"menu" => $this->input->post('menu', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_menu', $data);
	}

	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
					FROM `user_sub_menu` JOIN `user_menu`
					ON `user_sub_menu`.`menu_id` = `user_menu`. `id`
				";
		return $this->db->query($query)->result_array();
	}

	public function deleteSubMenu($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_sub_menu');
	}

	public function get_id_SubMenu($id)
	{
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}

	public function get_submenu($id)
	{
		$this->db->select('*');
		$this->db->from('user_sub_menu');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function proses_edit_submenu()
	{
		$data = [
			"title" => $this->input->post('title'),
			"menu_id" => $this->input->post('menu_id'),
			"url" => $this->input->post('url'),
			"icon" => $this->input->post('icon'),
			"is_active" => $this->input->post('is_active')
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_sub_menu', $data);
	}
}