<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot_Lokasi extends CI_Controller {

	private $_table = 'tbl_lokasi';
    private $idm = 'id_lokasi';

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
			['field' => 'lokasi',
			'label' => 'Lokasi',
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
			'judul' => 'BOBOT LOKASI',
			'menu' => 'dl',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'tampil' => $mdl->getAll($this->_table),
			'contents' => 'admin/v_lokasi'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'lokasi' => $post['lokasi'],
				'bobot_lokasi' => $post['bobot'],
			);
			$mdl->add($this->_table, $data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Bobot_Lokasi');
		}
	}

	public function edit($id = NULL)
	{
		if(!isset($id))
    	{
    		$id = $this->input->post($this->idm);
    	}
		if(!isset($id)) redirect('admin/Bobot_Lokasi');
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			$this->idm => $id,
			'lokasi' => $post['lokasi'],
			'bobot_lokasi' => $post['bobot'],
		);
		$mdl->edit($this->_table, $this->idm, $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Bobot_Lokasi');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->m_codeigniter->delete($this->_table, $this->idm, $id)) 
    		{             
				$this->session->set_flashdata('success', 'Berhasil Dihapus'); 
    			redirect('admin/Bobot_Lokasi');         
    		}     
    } 

}

/* End of file Kriteria.php */
