<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model 
{
	public $_table = 'tbl_user';
    public $idm = 'id_user';

	public function cek_login()
	{
		$USRNAMA = set_value('USRNAMA');
		$PASWORD = set_value('PASWORD');

		$result   = $this->db->where('username',$USRNAMA)
							->where('password',$PASWORD)
							->limit(1)
							->get($this->_table);

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}

	public function add($data)
    {
        $this->db->insert($this->_table, $data);
    }
}

?>
