<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_menu');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('M_menu', 'model');
		$data['menu'] = $this->M_menu->getAllMenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');
	}

	public function Tambah_data_menu()
	{
		$masuk['menu'] = $this->input->post('menu');
		$this->M_menu->insert($masuk);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
		redirect("menu");
	}

	public function Ubah_data_menu()
	{
		$id = $this->input->post('id');
		$data['menu'] = $this->input->post('menu');
		$this->M_menu->update_menu($id, $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
		redirect("menu");
	}

	public function Hapus_data_menu($id)
	{
		$this->M_menu->get_by_id($id);
		$this->M_menu->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect("menu");
	}


	public function edit_menu($id)
	{
		$data['title'] = 'Edit Data Menu';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->M_menu->getMenuById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/edit_menu', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_menu($id = null)
	{
		$this->M_menu->proses_edit_menu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu edited successfully!</div>');
		redirect('menu');
	}

	public function submenu()
	{
		$data['title'] = 'SubMenu Management';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('M_menu', 'model');
		$data['subMenu'] = $this->M_menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu baru berhasil ditambahkan!</div>');
			redirect('menu/submenu');
		}
	}

	public function delete_submenu($id)
	{
		$this->M_menu->get_submenu($id);
		$this->M_menu->deleteSubMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SubMenu deleted successfully!</div>');
		redirect('Menu/submenu');
	}


	public function edit_submenu($id)
	{
		$data['title'] = 'Edit Data SubMenu';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['subMenu'] = $this->M_menu->get_id_SubMenu($id);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/edit_submenu', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_submenu()
	{
		$this->M_menu->proses_edit_submenu();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SubMenu edited successfully!</div>');
		redirect('Menu/submenu');
	}
}