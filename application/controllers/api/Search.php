<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Search extends REST_Controller
{

	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('Search_model', 'Model');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT ,DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == "OPTIONS") {
			die();
		}
	}

	public function index_get()
	{
		$id = $this->get('keyword');
		if ($id == null) {
			$this->response(['keyword' => 'Keyword tidak boleh kosong']);
		} else {
			$search = $this->Model->cariOrang($id);
		}

		if ($search > 0) {
			$this->response([
				'status' => true,
				'message' => 'Berhasil menampilkan data',
				'data' => $search
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'Data tidak ditemukan',
				'data' => []
			], REST_Controller::HTTP_OK);
		}
	}
}
