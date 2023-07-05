<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    public function index()
    { 
        $mdl = $this->m_codeigniter;

        $data = array(
            'judul' => 'Dashboard',
            'menu' => 'ds',
            'wisata' => count($mdl->getAllJoin('tbl_wisata')),
            'user' => count($mdl->getAll('tbl_user')),
            'contents' => 'admin/v_dashboard',
        );
        $this->load->view('template/index', $data);
        
    }

}

/* End of file Admin.php */
