<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot_Usia extends CI_Controller {

	private $_table = 'tbl_usia';
    private $idm = 'id_usia';

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
			['field' => 'usia',
			'label' => 'Usia',
			'rules' => 'required'],

			['field' => 'bobot',
			'label' => 'Bobot Usia',
			'rules' => 'required']
        ];
    }

    public function index()
    {
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'BOBOT USIA',
			'menu' => 'du',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'tampil' => $mdl->getAll($this->_table),
			'contents' => 'admin/v_usia'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'usia' => $post['usia'],

				'bobot_usia' => $post['bobot'],
			);
			$mdl->add($this->_table, $data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Bobot_Usia');
		}
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
