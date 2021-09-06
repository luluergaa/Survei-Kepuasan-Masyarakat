<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Admin/M_SKM');
		$this->load->model('Model_Admin/M_User');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['Jml_user'] = count($this->M_User->get_table('login'));
		$data['Jml_responden'] = count($this->M_User->get_table('skm_biodata'));
		$data['Jml_rekap_pertahun'] = count($this->M_User->get_table('skm_rekap'));

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}


	public function daftar_user()
	{
		$data['title'] = 'Daftar Akun';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$data['user'] = $this->M_User->get_table('login');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/daftar_user', $data);
		$this->load->view('templates/footer');
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi User';
			$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/registrasi', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('login', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun baru telah berhasil dibuat</div>');
			redirect('admin/daftar_user');
		}
	}

	public function Ubah_data_user()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login.email]', [
			'is_unique' => 'This email has already registered!'
		]);

		$id = $this->input->post('id');
		$data['name'] = htmlspecialchars($this->input->post('name'));
		$data['email'] = htmlspecialchars($this->input->post('email'));
		$data['role_id'] = $this->input->post('role_id');
		$data['is_active'] = $this->input->post('is_active');

		$this->M_User->update_user($id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
		redirect("admin/daftar_user");
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}
	public function changeAccess()
	{
		$menu_Id = $this->input->post('menuId');
		$role_Id = $this->input->post('roleId');

		$data = [
			'menu_id' => $menu_id,
			'role_id' => $role_Id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}

	public function edit_role($id)
	{
		$data['title'] = 'Edit Data Role';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$where = array('id' => $id);
		$data['role'] = $this->M_SKM->edit_role($where, 'role')->result();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit_role', $data);
		$this->load->view('templates/footer');
	}

	public function update_role()
	{
		$id = $this->input->post('id');
		$role = $this->input->post('role');

		$data = array(
			'role' => $role
		);

		$where = array(
			'id' => $id
		);

		$this->m_data->update_role($where, $data, 'user');
		redirect('admin/role');
	}

	public function page()
	{
		$data['title'] = 'Page';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/Page/index.php', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/footer');
	}

	public function Tambah_data()
	{
		$masuk['judul'] = trim($this->input->post('judul'));
		$masuk['deskripsi'] = $this->input->post('deskripsi');
		$masuk['created_at'] = $this->input->post('date');
		$masuk['update_at'] = $this->input->post('date');
		$data['Page'] = $this->M_Page->get_by_judul($masuk['judul']);
		$masuk['link'] = $this->M_Page->create_slug($masuk['judul']);

		$this->M_Page->insert($masuk);
		$this->session->set_flashdata('msg', 'Berhasil_simpan');
		redirect("Admin");
	}

	public function Ubah_data()
	{
		$id = $this->input->post('id_page');
		$masuk['judul'] = trim($this->input->post('judul'));
		$judul_old = trim($this->input->post('judul_old'));
		$masuk['deskripsi'] = $this->input->post('deskripsi');
		$masuk['created_at'] = $this->input->post('date');
		$masuk['update_at'] = $this->input->post('date');
		if ($masuk['judul'] != $judul_old) {
			$masuk['link'] = $this->M_Page->create_slug($masuk['judul']);
		}

		$this->M_Page->update($id, $masuk);
		$this->session->set_flashdata('msg', 'Berhasil_simpan');
		redirect("Admin");
	}

	public function Hapus_data($id)
	{
		$this->M_Page->delete($id);
		$this->session->set_flashdata('msg', 'Berhasil_hapus');
		redirect("Admin");
	}

	//Upload image summernote
	public function upload_image()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = './upload/images_page/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './upload/images_page/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['new_image'] = './upload/images_page/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'upload/images_page/' . $data['file_name'];
			}
		}
	}

	//Delete image summernote
	public function delete_image()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		echo  $file_name;
		if (unlink($file_name)) {
			echo 'File Delete Successfully';
		}
	}

	//Delete image summernote
	public function delete_image_html()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		echo  $file_name;
		if (array_map('unlink', glob(FCPATH . trim($file_name)))) {
			echo "berhasil hapus";
		}
	}

	public function SKM()
	{
		$data['title'] = 'SKM';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/SKM/index', $data);
		$this->load->view('templates/footer');
	}

	public function data_skm($semester = "", $tahun = "")
	{
		if ($this->input->post('semester') != null and $this->input->post('tahun') != null) {
			$semester = $this->input->post('semester');
			$tahun = $this->input->post('tahun');
		}

		$data['title'] = 'SKM';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['Kuesioner'] = $this->M_SKM->get_all($semester, $tahun);
		$data['semester'] = $semester;
		$data['tahun'] = $tahun;
		$data['jmlh_responden'] = count($data['Kuesioner']);
		$data['nilai_SKM'] = $this->Hitung_SKM($data['jmlh_responden'], $data['semester'], $data['tahun']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/SKM/index', $data);
		$this->load->view('templates/footer');
	}

	public function Ubah_data_skm()
	{
		$id_skm_biodata = $this->input->post('id_skm_biodata');
		$semester = $this->input->post('semester');
		$tahun = $this->input->post('tahun');
		for ($i = 1; $i <= 9; $i++) {
			$masuk['jawaban'] = $this->input->post($i);
			$this->M_SKM->update($id_skm_biodata, $i, $masuk);
		}
		$this->session->set_flashdata('msg', 'Berhasil_simpan');
		redirect("Admin/data_skm/" . $semester . "/" . $tahun);
	}

	public function Hapus_data_skm($id, $semester, $tahun)
	{
		$this->M_SKM->delete_skm_biodata($id);
		$this->M_SKM->delete_skm_kuesioner($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect("Admin/data_skm/" . $semester . "/" . $tahun);
	}

	public function Hitung_SKM($jmlh_responden, $semester, $tahun)
	{

		$a = $this->M_SKM->get_total_jawaban_per_pertanyaan($tahun, $semester);
		$jmlh = 0;
		foreach ($a as $key => $value) {
			$jmlh += (($value->total_jawaban / $jmlh_responden) * (0.11));
		}

		return $hasil = $jmlh * 25;
	}

	public function Hapus_data_user($id)
	{
		$this->M_User->get_by_id($id);
		$this->M_User->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		redirect("Admin/daftar_user");
	}
}