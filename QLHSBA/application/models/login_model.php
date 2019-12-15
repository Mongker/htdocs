<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


    public function check_account($username,$password)
	{
		
		 $this->db->where('username', $username);
         $this->db->where('password', $password);
		 $query = $this->db->get('account');  
		 if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
          
          
	}
	public function insert($tenbenhnhan,$tuoi,$sdt,$diachi,$cmt,$ngaysinh)
	{
		$object = [
           'tenbenhnhan' => $tenbenhnhan ,
           'tuoi' => $tuoi ,
           'sdt' => $sdt ,
           'diachi' => $diachi ,
           'cmt' => $cmt ,
           'ngaysinh' => $ngaysinh ,
		];
		return $this->db->insert('ds_benhnhan', $object);
	}
	
	public function getAllData()
	{
	 $this->db->select('*');
	 $this->db->order_by('id', 'asc');
	 $data = $this->db->get('ds_benhnhan');
	 $data = $data->result_array();
	 return $data;
	}
	public function getDateByIDDelete($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('ds_benhnhan');
    }
    public function getDateByID($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$dulieu = $this->db->get('ds_benhnhan');
		$dulieu = $dulieu->result_array(); // Lấy dữ liệu về trong mảng
		return $dulieu;
	}
	public function getDateByIDEdit($id,$tenbenhnhan,$tuoi,$sdt,$diachi,$cmt,$ngaysinh)
	{
		$object = [ 
			'id'      => $id,
           'tenbenhnhan' => $tenbenhnhan ,
           'tuoi' => $tuoi ,
           'sdt' => $sdt ,
           'diachi' => $diachi ,
           'cmt' => $cmt ,
           'ngaysinh' => $ngaysinh 
		];
		$this->db->where('id', $id);
		return $this->db->update('ds_benhnhan', $object);
	}


}

/* End of file  */
/* Location: ./application/models/ */