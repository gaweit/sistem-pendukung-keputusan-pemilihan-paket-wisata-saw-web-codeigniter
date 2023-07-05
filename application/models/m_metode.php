<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_metode extends CI_Model {

	public function getAll($_table)
    {
        return $this->db->get($_table)->result_array();
    }

	public function getAllminmax($_table,$data,$where)
    {
        $selectHarga = ($data['FINANSIAL'] == 'BENEFIT') ? 'MAX(d.harga_paket)' : 'MIN(d.harga_paket)';
        $selectUsia = ($data['USIA'] == 'BENEFIT') ? 'MAX(a.bobot_usia)' : 'MIN(a.bobot_usia)';
        $selectHobi = ($data['HOBI'] == 'BENEFIT') ? 'MAX(b.bobot_hobi)' : 'MIN(b.bobot_hobi)';
        $selectLokasi = ($data['LOKASI'] == 'BENEFIT') ? 'MAX(c.bobot_lokasi)' : 'MIN(c.bobot_lokasi)';
        $this->db->select("$selectHarga as harga, $selectUsia as usia, $selectHobi as hobi, $selectLokasi as lokasi");
        // $this->db->select('*');
		$this->db->from("$_table as d");
		$this->db->join('tbl_usia a', 'a.id_usia = d.id_usia');
		$this->db->join('tbl_hobi b', 'b.id_hobi = d.id_hobi');
		$this->db->join('tbl_lokasi c', 'c.id_lokasi = d.id_lokasi');
        
        if ($where['harga'] != NULL) {
            $this->db->where('d.harga_paket <', $where['harga']);
        }
        if ($where['id_usia'] != NULL) {
            $this->db->where('d.id_usia', $where['id_usia']);
        }
        if ($where['id_hobi'] != NULL) {
            $this->db->where('d.id_hobi', $where['id_hobi']);
        }
        if ($where['id_lokasi'] != NULL) {
            $this->db->where('d.id_lokasi', $where['id_lokasi']);
        }
        
		$this->db->order_by('d.harga_paket', 'desc');
        $this->db->limit(5);
        return $this->db->get()->row_array();
    }

	public function getAllJoindata($_table,$where)
    {
        $this->db->select('*');
		$this->db->from("$_table as d");
		$this->db->join('tbl_usia a', 'a.id_usia = d.id_usia');
		$this->db->join('tbl_hobi b', 'b.id_hobi = d.id_hobi');
		$this->db->join('tbl_lokasi c', 'c.id_lokasi = d.id_lokasi');

        if ($where['harga'] != NULL) {
            $this->db->where('d.harga_paket <', $where['harga']);
        }
        if ($where['id_usia'] != NULL) {
            $this->db->where('d.id_usia', $where['id_usia']);
        }
        if ($where['id_hobi'] != NULL) {
            $this->db->where('d.id_hobi', $where['id_hobi']);
        }
        if ($where['id_lokasi'] != NULL) {
            $this->db->where('d.id_lokasi', $where['id_lokasi']);
        }
        
		$this->db->order_by('d.harga_paket', 'desc');
        $this->db->limit(5);
        return $this->db->get();
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
