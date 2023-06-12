<?php
class Search_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function cariOrang($id = '')
	{
		$this->db->select('*');
		$this->db->from('orang');
		$this->db->where('id', $id);
		$this->db->or_where('nama', $id);
		$query = $this->db->get();

		$data = $query->row();
		$idOrang = $data->id;
		if (!empty($data)) {
			$this->insert($idOrang);
		}
		return $data;
	}

	function insert($id)
	{
		if (!empty($id)) {
			$insert = array(
				'id_orang' => $id,
				'tanggal' => date('Y-m-d H:i:s', now())
			);
			$this->db->insert('hadir', $insert);
		}
	}

	public function get_slideshow()
	{
		//$data = $this->db->get('orang');
		$data = $this->db->get_where('orang', array('ucapan !=' => NULL));
		return $data->result();
	}
}
