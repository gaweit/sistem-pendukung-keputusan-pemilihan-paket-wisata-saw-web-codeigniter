<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_detail extends CI_Model {

	public function getAll($_table)
    {
        return $this->db->get($_table)->result();
    }

	public function getdatajoin($_table,$where)
    {
        $this->db->select('*');
		$this->db->from("$_table as d");
		$this->db->join('tbl_usia a', 'a.id_usia = d.id_usia','left');
		$this->db->join('tbl_hobi b', 'b.id_hobi = d.id_hobi','left');
		$this->db->join('tbl_lokasi c', 'c.id_lokasi = d.id_lokasi','left');
        $this->db->where('d.id_data', $where);
        if($this->session->userdata('status') === 'USER'){
            $this->db->where('d.id_user', $this->session->userdata('id_user'));
        }
        return $this->db->get()->result();
    }

	public function getdata($_table)
    {
        $this->db->select('*');
		$this->db->from("$_table as d");
		$this->db->join('tbl_usia a', 'a.id_usia = d.id_usia','left');
		$this->db->join('tbl_hobi b', 'b.id_hobi = d.id_hobi','left');
		$this->db->join('tbl_lokasi c', 'c.id_lokasi = d.id_lokasi','left');
        if($this->session->userdata('status') === 'USER'){
            $this->db->where('d.id_user', $this->session->userdata('id_user'));
        }
        return $this->db->get()->result();
    }

	public function getdatasaw($_table,$where)
    {
        $this->db->select('*');
		$this->db->from("$_table as d");
		$this->db->join('tbl_wisata e', 'e.id_wisata = d.id_wisata');
		$this->db->join('tbl_usia a', 'a.id_usia = e.id_usia');
		$this->db->join('tbl_hobi b', 'b.id_hobi = e.id_hobi');
		$this->db->join('tbl_lokasi c', 'c.id_lokasi = e.id_lokasi');
        $this->db->where('d.id_data', $where);
        if($_table == 'tbl_hasil_saw'){
            $this->db->order_by('d.hasil_saw', 'desc');
        }
        return $this->db->get()->result();
    }

	public function getById($_table, $idm, $id){
        return $this->db->get_where($_table, [$idm => $id])->row();
    } 

    public function add($_table,$data)
    {
        $this->db->insert($_table, $data);
        return $this->db->insert_id();
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
