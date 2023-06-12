<?php
class Search extends CI_Controller {
  
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->model('search_model','search');
		$this->load->model('orang_model','orang');
		$this->load->model('pengaturan_model','pengaturan');
	}
  
	public function index() 
	{
		//$id    =   $this->input->post('keyword');
	  	//$this->data['results']    =   $this->search->cariOrang();
	  	$this->data['pengaturan']    =   $this->pengaturan->get_all(1);
		foreach ($this->data['pengaturan']->result() as $row) {
			$this->data['judul'] = $row->nama_web;
			$this->data['nama'] = $row->nama_pengantin;
			$this->data['tempat'] = $row->tempat_tanggal;
			$this->data['alamat'] = $row->alamat;
			$this->data['foto'] = $row->foto;
			$this->data['background'] = $row->img_background;
			$this->data['peserta'] = $this->orang->get_all_orang()->result_array();
		}
	  	$this->load->view('search-native',$this->data);
	}

	public function page() 
	{
		//$id    =   $this->input->post('keyword');
	  	//$this->data['results']    =   $this->search->cariOrang();
	  	$this->data['pengaturan']    =   $this->pengaturan->get_all(1);
		foreach ($this->data['pengaturan']->result() as $row) {
			$this->data['judul'] = $row->nama_web;
			$this->data['nama'] = $row->nama_pengantin;
			$this->data['tempat'] = $row->tempat_tanggal;
			$this->data['alamat'] = $row->alamat;
			$this->data['foto'] = $row->foto;
			$this->data['background'] = $row->img_background;
		}
	  	$this->load->view('search',$this->data);
	}

	public function slideshow(){
		$data['results'] = $this->search->get_slideshow();
		$this->load->view('slideshow',$data);
	}
}