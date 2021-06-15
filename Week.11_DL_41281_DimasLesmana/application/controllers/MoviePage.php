<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MoviePage extends CI_Controller
{
	private $no_upload_msg = "You did not select a file to upload.";

	private $validationRules = [
		[
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required'
		],
		[
			'field' => 'year',
			'label' => 'Year',
			'rules' => 'required|integer|min_length[4]|max_length[5]'
		],
		[
			'field' => 'director',
			'label' => 'Director',
			'rules' => 'required|max_length[30]'
		]
	];

	private $uploadConfig = [
		'upload_path' => './assets/poster/',
		'allowed_types' => 'jpg|png',
		'max_size' => 1024 * 1000,
		'encrypt_name' => TRUE
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('movies');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}

	public function index()
	{
		$movies['data'] = $this->movies->ShowData();

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer_movie', NULL, TRUE);

		$data['table'] = $this->load->view('template/table_movie', $movies, TRUE);

		$this->load->view('page/movie', $data);
	}

	public function ShowDetail()
	{
		$id = $this->input->get('id', TRUE);

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer_movie', NULL, TRUE);
		$data['movie'] = $this->movies->ShowDetail($id);

		$this->load->view('page/movie_details', $data);
	}

	public function AddMovie()
	{
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer_movie', NULL, TRUE);

		$this->load->view('page/movie_add', $data);
	}

	public function EditMovie($id)
	{
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer_movie', NULL, TRUE);
		$data['movie'] = $this->movies->ShowDetail($id);

		$this->load->view('page/movie_edit', $data);
	}

	public function add()
	{
		$upload_error = FALSE;

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer_movie', NULL, TRUE);

		$this->form_validation->set_rules($this->validationRules);
		$this->upload->initialize($this->uploadConfig);

		if (!$this->upload->do_upload('poster')) {
			$error_msg = $this->upload->display_errors('<div class="text-danger">', '</div>');
			$upload_error = $this->isUploadError($error_msg);
		}

		if (!$this->form_validation->run() || $upload_error) {
			if ($upload_error) {
				$data['upload_error'] = $error_msg;
			}

			return $this->load->view('page/movie_add', $data);
		}

		$this->movies->AddData($this->getPostData());
		redirect('/');
	}

	public function edit()
	{
		$id = $this->input->post('movie_id', TRUE);
		$upload_error = FALSE;

		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie', NULL, TRUE);
		$data['footer'] = $this->load->view('template/footer_movie', NULL, TRUE);
		$data['movie'] = $this->movies->ShowDetail($id);

		$this->form_validation->set_rules($this->validationRules);
		$this->upload->initialize($this->uploadConfig);

		if (!$this->upload->do_upload('poster')) {
			$error_msg = $this->upload->display_errors('<div class="text-danger">', '</div>');
			$upload_error = $this->isUploadError($error_msg);
		}

		if (!$this->form_validation->run() || $upload_error) {
			if ($upload_error) {
				$data['upload_error'] = $error_msg;
			}

			return $this->load->view('page/movie_edit', $data);
		}

		$this->movies->UpdateData($id, $this->getPostData());
		redirect('/');
	}

	/**
	 * isUploadError
	 * * Kalau error_msg === "You did not select a file to upload."
	 * * anggap bukan error, berarti kita ingin
	 * * menggunakan poster placeholder (add-form)
	 * * atau tidak ingin mengganti posternya (edit-form).
	 */
	private function isUploadError($error_msg)
	{
		if (!strpos($error_msg, $this->no_upload_msg)) {
			return TRUE;
		}

		return FALSE;
	}

	private function getPosterLink($fileName)
	{
		if ($fileName) {
			// file uploaded, use new uploaded file
			return "assets/poster/" . $this->upload->data('file_name');
		}

		// no file uploaded, use old poster
		return $this->input->post('default_poster', TRUE);
	}

	private function getPostData()
	{
		return [
			'Title' => $this->input->post('title', TRUE),
			'Year' => $this->input->post('year', TRUE),
			'Director' => $this->input->post('director', TRUE),
			'PosterLink' => $this->getPosterLink($this->upload->data('file_name'))
		];
	}
}
