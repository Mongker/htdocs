<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qltt_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
public function getAll()
{
	$data=$this->db->get('student');
	$data=$data->result_array();
	return $data;
}
function insert($name, $birthday,$address, $class,$sex)
{
	$object = ['name' => $name, 'birthday' => $birthday, 'address' => $address, 'class' => $class, 'sex' => $sex];
	return $this->db->insert('student', $object);
   
}
function deleteById($id)
{
  $this->db->where('id',$id);
  return $this->db->delete('student');	
}
function getById($id)
{

	$this->db->where('id', $id);
	$data=$this->db->get('student');
	return $data->result_array();
}
function updateById($suatt)
{
	$this->db->where('id', $suatt['id']);
	return $this->db->update('student', $suatt);
}
function searchByText($txtTim)
{
	
	$this->db->like('name', $txtTim, 'BOTH');
	$data=$this->db->get('student');
	return $data->result_array();
}
}

/* End of file qlsim_model.php */
/* Location: ./application/models/qlsim_model.php */