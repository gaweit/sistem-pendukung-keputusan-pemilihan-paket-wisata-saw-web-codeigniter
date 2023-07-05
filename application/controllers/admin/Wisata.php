<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	public $_table = 'tbl_wisata';
    private $idm = 'id_wisata';

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
			['field' => 'nama_wisata',
			'label' => 'Paket Wisata',
			'rules' => 'required'],
			
			['field' => 'harga_paket',
			'label' => 'Harga Paket',
			'rules' => 'required'],

			['field' => 'fasilitas',
			'label' => 'Fasilitas',
			'rules' => 'required'],
			
			['field' => 'id_usia',
			'label' => 'Usia',
			'rules' => 'required'],

			['field' => 'id_hobi',
			'label' => 'Hobi',
			'rules' => 'required'],

			['field' => 'id_lokasi',
			'label' => 'Lokasi',
			'rules' => 'required']
        ];
    }

    public function index()
    {
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'WISATA',
			'menu' => 'dw', 
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'tampil' => $mdl->getAllJoin($this->_table),
			'usia' => $mdl->getAll('tbl_usia'),
			'hobi' => $mdl->getAll('tbl_hobi'),
			'lokasi' => $mdl->getAll('tbl_lokasi'),
			'contents' => 'admin/v_wisata'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'nama_wisata' => $post['nama_wisata'],
				'harga_paket' => $post['harga_paket'],
				'fasilitas' => $post['fasilitas'],
				'id_usia' => $post['id_usia'],
				'id_hobi' => $post['id_hobi'],
				'id_lokasi' => $post['id_lokasi'],
			);
			$mdl->add($this->_table, $data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Wisata');
		}
	}

	public function edit($id = NULL)
	{
		if(!isset($id))
    	{
    		$id = $this->input->post($this->idm);
    	}
		if(!isset($id)) redirect('admin/Wisata');
		$mdl = $this->m_codeigniter;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			$this->idm => $id,
			'nama_wisata' => $post['nama_wisata'],
			'harga_paket' => $post['harga_paket'],
			'fasilitas' => $post['fasilitas'],
			'id_usia' => $post['id_usia'],
			'id_hobi' => $post['id_hobi'],
			'id_lokasi' => $post['id_lokasi'],
		);
		$mdl->edit($this->_table, $this->idm, $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Wisata');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->m_codeigniter->delete($this->_table, $this->idm, $id)) 
    		{             
    			redirect('admin/Wisata');         
    		}     
    } 

}

/* End of file Kriteria.php */
