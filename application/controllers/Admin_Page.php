<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Page extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_Front/M_Page');

		if ($this->session->userdata('masuk') != TRUE) {
			redirect('auth');
		}
	}


	public function index()
	{
		$data['Page'] = $this->M_Page->get_all();
		$this->load->view('admin/page', $data);
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
		redirect("Admin_Page");
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
		redirect("Admin_Page");
	}

	public function Hapus_data($id)
	{
		$this->M_Page->delete($id);
		$this->session->set_flashdata('msg', 'Berhasil_hapus');
		redirect("Admin_Page");
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
}