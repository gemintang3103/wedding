<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rekaphadir_model extends CI_Model
{
	function get_all()
	{
		$hasil = $this->db->get('v_rekaphadir');
		return $hasil;
	}

	function query_all()
	{
		$hasil = $this->db->query("select (select count(distinct(id_orang)) from hadir) as Hadir,(SELECT count(id) FROM orang WHERE id NOT IN (SELECT id_orang FROM hadir)) as Absen");
		return $hasil;
	}
}
