<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Rekap_SKM');

		// is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'My Profile'; // title harus sama seperti yang ada di database
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'trim|required');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('member/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']		 = '2048';
				$config['upload_path']	 = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['login']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('login');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
			redirect('member');
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Change Password'; // title harus sama seperti yang ada di database
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[4]|matches[new_password1]');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('member/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password =  $this->input->post('new_password1');
			if (!password_verify($current_password, $data['login']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah!</div>');
				redirect('member/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini! </div>');
					redirect('member/changepassword');
				} else {
					// password sudah benar
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('login');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
					redirect('member/changepassword');
				}
			}
		}
	}

	public function Rekap_skm()
	{
		$data['title'] = 'Nilai SKM Pertahun';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['Rekap_SKM'] = $this->M_Rekap_SKM->get_all();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/Rekap_skm/index', $data);
		$this->load->view('templates/footer');
	}

	public function Tambah_data_rekap()
	{
		$masuk['tahun'] = $this->input->post('tahun');
		$masuk['nilai'] = $this->input->post('nilai');
		// $masuk['status'] = $this->input->post('status');
		$this->M_Rekap_SKM->insert($masuk);
		$this->session->set_flashdata('msg', 'Berhasil_simpan');
		redirect("Member/Rekap_skm");
	}

	public function Ubah_data_rekap()
	{
		$id = $this->input->post('id_skm_rekap');
		$data['tahun'] = $this->input->post('tahun');
		$data['nilai'] = $this->input->post('nilai');
		$this->M_Rekap_SKM->update_rekap($id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
		redirect("Member/Rekap_skm");
	}

	public function Hapus_data_rekap($id)
	{
		$this->M_Rekap_SKM->get_by_id($id);
		$this->M_Rekap_SKM->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		redirect("Member/Rekap_skm");
	}
}