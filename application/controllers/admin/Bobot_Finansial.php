<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot_Finansial extends CI_Controller {

	private $_table = 'tbl_finansial';
    private $idm = 'id_fin';

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
			['field' => 'fin_min',
			'label' => 'Finansial MIN',
			'rules' => 'required'],

			['field' => 'fin_max',
			'label' => 'Finanasial MAX',
			'rules' => 'required'],

			['field' => 'bobot',
			'label' => 'Bobot Finansial',
			'rules' => 'required']
        ];
    }

    public function index()
    {
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'BOBOT FINANSIAL',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'tampil' => $mdl->getAll($this->_table),
			'contents' => 'admin/v_finansial'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'fin_min' => $post['fin_min'],
				'fin_max' => $post['fin_max'],
				'bobot_fin' => $post['bobot'],
			);
			$mdl->add($this->_table, $data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Bobot_Finansial');
		}
	}

	public function edit($id = NULL)
	{
		if(!isset($id))
    	{
    		$id = $this->input->post($this->idm);
    	}
		if(!isset($id)) redirect('admin/Bobot_Finansial');
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			$this->idm => $id,
			'fin_min' => $post['fin_min'],
			'fin_max' => $post['fin_max'],
			'bobot_fin' => $post['bobot'],
		);
		$mdl->edit($this->_table, $this->idm, $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Bobot_Finansial');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->m_codeigniter->delete($this->_table, $this->idm, $id)) 
    		{             
				$this->session->set_flashdata('success', 'Berhasil Dihapus'); 
    			redirect('admin/Bobot_Finansial');         
    		}     
    } 

}

/* End of file Kriteria.php */
