<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertData( $anhavatar , $ten, $tuoi, $sdt, $linkfb)
	{
		// Xử lý thông tin nhận về từ upload SQL
		$data = [ 
			'anhavatar' =>  $anhavatar,
		    'ten'       =>  $ten,
			'tuoi'      =>  $tuoi,
			'sdt'       =>  $sdt,
			'linkfb'    =>  $linkfb
		];
			 

		$this->db->insert('nhan_vien', $data);// nhan_vien : tên bàng datebase
		return $this->db->insert_id();
        
	}

	// Lấy dữ liệu từ mySQL
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
	 	$data = $this->db->get('nhan_vien');
	 	$data = $data->result_array() ; //db_result_array
	 	return $data;

	}

	//Lấy id từ mySQL ra view sữa dữ liệu
	public function getDateByID($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array(); // Lấy dữ liệu về trong mảng
		return $dulieu;

	}
	public function  getDateByIDEdit( $id ,$anhavatar , $ten, $tuoi, $sdt, $linkfb)
	{   
		$ketqua = [
			'id'        =>  $id,
		    'anhavatar' =>  $anhavatar,
		    'ten'       =>  $ten,
			'tuoi'      =>  $tuoi,
			'sdt'       =>  $sdt,
			'linkfb'    =>  $linkfb
		];
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $ketqua);
	}
    public function getDateByIDDelete($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('nhan_vien');
    }

}

/* End of file nhansu_models.php */
/* Location: ./application/models/nhansu_models.php */