<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qltk_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	//sao nó lại thành 2 cái hta đây
public function getAll()
{
	$data=$this->db->get('account');
	$data=$data->result_array();
	return $data;
}
function insert($Username, $Password)
{
	$object = ['Username' => $Username, 'Password' => $Password];
	return $this->db->insert('account', $object);
   
}
function deleteById($id)
{
  $this->db->where('id',$id);
  return $this->db->delete('account');	
}
function getById($id)
{

	$this->db->where('id', $id);
	$data=$this->db->get('account');
	return $data->result_array();
}
function updateById($suatk)
{
	$this->db->where('id', $suatk['id']);
	return $this->db->update('account', $suatk);
}
function searchByText($txtTim)
{
	
	$this->db->like('Username', $txtTim, 'BOTH');
	$data=$this->db->get('account');
	return $data->result_array();
}

}

/* End of file qlsim_model.php */
/* Location: ./application/models/qlsim_model.php */
