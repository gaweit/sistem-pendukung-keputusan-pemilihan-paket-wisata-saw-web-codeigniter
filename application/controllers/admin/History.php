<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	private $_table = 'tbl_data_saw';
    private $idm = 'id_data';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_codeigniter');
        $this->load->model('m_detail');
		$this->load->library('form_validation');

		if($this->session->userdata('status') != 'ADMIN'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                  Anda Belum Login !!!
                </div>');
            redirect('Welcome');
        }   
    }

    public function index()
    {
		$mdl = $this->m_codeigniter;
		$mdl2 = $this->m_detail;
		$data = array(
			'judul' => 'HISTORY',
			'menu' => 'hst',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'tampil' => $mdl2->getdata($this->_table),
			'contents' => 'admin/v_history'
		);
		
			$this->load->view('template/index',$data);
		
	}

	public function detailSaw($id = NULL)
	{
		$mdl3 = $this->m_detail;
		$datam = array(
			'judul' => 'METODE SAW',
			'menu' => 'saw',
			'sub1' => 'DATA LATIH',
			'inputdata' => $mdl3->getdatajoin('tbl_data_saw',$id),
			'sub2' => 'NORMALISASI',
			'normal' => $mdl3->getdatasaw('tbl_normalisasi_saw',$id),
			'sub3' => 'HASIL HITUNG SAW',
			'datasaw' => $mdl3->getdatasaw('tbl_hasil_saw',$id),
			'sub4' => 'REKOMENDASI WISATA',
			'contents' => 'admin/v_detail_metode'
		);
		
		$this->load->view('template/index',$datam);
	}

	public function dataNull($id = NULL)
	{
		$datam = array(
			'judul' => 'KOSONG',
			'menu' => 'saw',
			'contents' => 'admin/v_datanull'
		);
		$this->load->view('template/index',$datam);
	}

	public function edit($id = NULL)
	{
		if(!isset($id))
    	{
    		$id = $this->input->post($this->idm);
    	}
		if(!isset($id)) redirect('admin/Bobot_Usia');
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			$this->idm => $id,
			'usia' => $post['usia'],
			'bobot_usia' => $post['bobot'],
		);
		$mdl->edit($this->_table, $this->idm, $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Bobot_Usia');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->m_codeigniter->delete($this->_table, $this->idm, $id)) 
    		{             
				$this->session->set_flashdata('success', 'Berhasil Dihapus'); 
    			redirect('admin/Bobot_Usia');         
    		}     
    } 

}

/* End of file Kriteria.php */
