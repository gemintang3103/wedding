<?php
class M_crud extends CI_Model{
//==================== admin CREATE READ UPDATE DELETE ===========================================================
function get($table){
       return $this->db->get($table);
    }
function read($field,$param,$table) {
		$this->db->where($field,$param);
		return $this->db->get($table);
	}
function insert($data,$table){
       $this->db->insert($table,$data);
    }
function update($key,$param,$data,$table){
        $this->db->where($key,$param);
        $this->db->update($table,$data);
    }
function del($key,$param,$table){
        $this->db->where($key,$param);
        $this->db->delete($table);
    }
}
/*
======================== FCI_StageModel_System ========================================================================
#Author		: indra.lesmana@gmail.com
#System		: F_CI_3
*/
?>