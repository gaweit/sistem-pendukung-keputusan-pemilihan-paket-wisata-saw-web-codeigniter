<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Metode_Saw extends CI_Controller {

	private $_table = 'tbl_data_saw';
    private $idm = 'id_data';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_codeigniter');
        $this->load->model('m_metode');
        $this->load->model('m_detail');
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
        ];
    }

    public function index()
    {
		$validation = $this->form_validation;
		$mdl = $this->m_codeigniter;
		$mdl2 = $this->m_metode;
		$post = $this->input->post();
		
		$data1 = array(
			'judul' => 'METODE SAW',
			'menu' => 'saw',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'usia' => $mdl->getAll('tbl_usia'),
			'hobi' => $mdl->getAll('tbl_hobi'),
			'lokasi' => $mdl->getAll('tbl_lokasi'),
			'tampil' => $mdl->getAll($this->_table),
			'contents' => 'admin/v_metode'
		);
		
		$this->load->view('template/index',$data1);
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

	public function Metode()
	{
		$post = $this->input->post();
		$mdl = $this->m_codeigniter;
		$mdl2 = $this->m_metode;
		$mdl3 = $this->m_detail;

		// $where = array(
		// 	'harga' => ($post['harga_paket'] != null) ? $post['harga_paket'] : 0,
		// 	'id_usia' => $post['id_usia'],
		// 	'id_hobi' => $post['id_hobi'],
		// 	'id_lokasi' => $post['id_lokasi'],
		// );
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'harga' => ($post['harga_paket'] != NULL) ? $post['harga_paket'] : NULL,
			'id_usia' => ($post['id_usia'] != 0) ? $post['id_usia'] : NULL,
			'id_hobi' => ($post['id_hobi'] != 0) ? $post['id_hobi'] : NULL,
			'id_lokasi' => ($post['id_lokasi'] != 0) ? $post['id_lokasi'] : NULL,
		);
		
		// get data latih wisata
		$saw = $mdl2->getAllJoindata('tbl_wisata',$where);
		$datamm = $mdl2->getAll('tbl_kriteria');

		// cek benefit / cost
		$dataminmax = array_column($datamm, 'kriteria_type', 'nama_kriteria');

		// get data bobot kriteria
		$bobot_kriteria = array_column($datamm, 'bobot', 'nama_kriteria');

		// get data min & max dari kriteria
		$minmax = (array) $mdl2->getAllminmax('tbl_wisata',$dataminmax,$where);

		if(count($saw->result()) > 0){
			$id_data = $mdl2->add('tbl_data_saw',$where);
			foreach ($saw->result_array() as $key) {
				$id_wisata = $key['id_wisata'];
				// menentukan hitung min - max / cost - benefit
				$hitung_harga = ($dataminmax['FINANSIAL'] === 'BENEFIT') ? $key['harga_paket']/$minmax['harga'] : $minmax['harga']/$key['harga_paket'];
				$hitung_usia = ($dataminmax['USIA'] === 'BENEFIT') ? $key['bobot_usia']/$minmax['usia'] : $minmax['usia']/$key['bobot_usia'];
				$hitung_hobi = ($dataminmax['HOBI'] === 'BENEFIT') ? $key['bobot_hobi']/$minmax['hobi'] : $minmax['hobi']/$key['bobot_hobi'];
				$hitung_lokasi = ($dataminmax['LOKASI'] === 'BENEFIT') ? $key['bobot_lokasi']/$minmax['lokasi'] : $minmax['lokasi']/$key['bobot_lokasi'];
				$temp_hitung = ($hitung_harga * $bobot_kriteria['FINANSIAL']) + ($hitung_usia * $bobot_kriteria['FINANSIAL']) + ($hitung_hobi * $bobot_kriteria['FINANSIAL']) + ($hitung_lokasi * $bobot_kriteria['FINANSIAL']);

				$input[]=[
					'id_data'=>$id_data,
					'id_wisata'=>$id_wisata,
					'hitung_harga'=>$hitung_harga,
					'hitung_usia'=>$hitung_usia,
					'hitung_hobi'=>$hitung_hobi,
					'hitung_lokasi'=>$hitung_lokasi,
				];

				$input1[]=[
					'id_data'=>$id_data,
					'id_wisata'=>$id_wisata,
					'hasil_saw'=>$temp_hitung,
				];

			}

			if (!empty($input)) {
				$this->db->insert_batch('tbl_normalisasi_saw', $input);
			}

			if (!empty($input1)) {
				$this->db->insert_batch('tbl_hasil_saw', $input1);
			}
			
			redirect('admin/History/detailSaw/'.$id_data);
			

		} else {
			redirect('admin/History/dataNull/'.$id_data);
			
		}
	}

}

/* End of file Kriteria.php */