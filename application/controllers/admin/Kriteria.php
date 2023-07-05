<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public $_table = 'tbl_kriteria';
    private $idm = 'id_kriteria';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_codeigniter');
		$this->load->library('form_validation');

		if($this->session->userdata('status') != 'ADMIN'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                  Anda Belum Login !!!
                </div>');
            redirect('Welcome');
        }   
    }

	public function rules(){ 
        return [
			['field' => 'nama_kriteria',
			'label' => 'Kriteria',
			'rules' => 'required'],

			['field' => 'kriteria_type',
			'label' => 'Type',
			'rules' => 'required'],

			['field' => 'bobot',
			'label' => 'Bobot',
			'rules' => 'required']
        ];
    }

    public function index()
    {
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'KRITERIA',
			'menu' => 'dk',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'tampil' => $mdl->getAll($this->_table),
			'contents' => 'admin/v_kriteria'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'nama_kriteria' => $post['nama_kriteria'],
				'kriteria_type' => $post['kriteria_type'],
				'bobot' => $post['bobot'],
			);
			$mdl->add($this->_table, $data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Kriteria');
		}
	}

	public function edit($id = NULL)
	{
		if(!isset($id))
    	{
    		$id = $this->input->post($this->idm);
    	}
		if(!isset($id)) redirect('admin/Kriteria');
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			$this->idm => $id,
			'nama_kriteria' => $post['nama_kriteria'],
			'kriteria_type' => $post['kriteria_type'],
			'bobot' => $post['bobot'],
		);
		$mdl->edit($this->_table, $this->idm, $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Kriteria');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->m_codeigniter->delete($this->_table, $this->idm, $id)) 
    		{             
    			redirect('admin/Kriteria');         
    		}     
    } 

}

/* End of file Kriteria.php */
