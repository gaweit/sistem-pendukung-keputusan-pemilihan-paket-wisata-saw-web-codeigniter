<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_codeigniter extends CI_Model {

	public function getAll($_table)
    {
        return $this->db->get($_table)->result();
    }

	public function getAllJoin($_table)
    {
        $this->db->select('*');
		$this->db->from($_table);
		$this->db->join('tbl_usia a', 'a.id_usia = '.$_table.'.id_usia');
		$this->db->join('tbl_hobi b', 'b.id_hobi = '.$_table.'.id_hobi');
		$this->db->join('tbl_lokasi c', 'c.id_lokasi = '.$_table.'.id_lokasi');
		$this->db->order_by('c.lokasi', 'asc');
        return $this->db->get()->result();
    }

	public function getById($_table, $idm, $id){
        return $this->db->get_where($_table, [$idm => $id])->row();
    } 

    public function add($_table,$data)
    {
        $this->db->insert($_table, $data);
    }

    public function edit($_table, $idm, $data)
    {
        $this->db->where($idm, $data[$idm]);
        $this->db->update($_table, $data);
    }

	public function delete($_table, $idm, $id)
	{        
        return $this->db->delete($_table, [$idm => $id]);     
    }

}

/* End of file m_kriteria.php */
