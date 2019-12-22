<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qltk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('qltk_model');
	}

	public function index()
	{
		$data=$this->qltk_model->getAll();
        $alldata2['alldata']=$data;
		$this->load->view('trangchu_view',$alldata2);
	}
function viewadd()
{
	$this->load->view('addtk_view');
}
function themtk()
{
	$Username=$this->input->post('Username');
	$Password=$this->input->post('Password');
	
	if($this->qltk_model->insert($Username, $Password))
	{
		echo "<h3>Thêm mới thành công!";
	}
	else
	{
		echo "<h3>Thêm mới thất bại!";
	}
}

function xoa($id)
{
	
	if ($this->qltk_model->deleteById($id)) {
		echo ('<script type="text/javascript">');
		echo 'alert ("Xóa thành công!")';
		echo ('</script>');
	}
	else {
		echo ('<script type="text/javascript">');
		echo 'alert ("Có lỗi, xóa thất bại!")';
		echo ('</script>');
	}
	    $data=$this->qltk_model->getAll();
        $alldata2['alldata']=$data;
		$this->load->view('trangchu_view',$alldata2);
}
function sua($id)
        {
        	
        	$data=$this->qltk_model->getById($id);
        	$data['suatk']=$data;
        	$this->load->view('suatk_view', $data);
        	
        }
function suatk()
        {
        	$tk=$this->input->post();
        	if ($this->qltk_model->updateById($tk)) {
		echo ('<script type="text/javascript">');
		echo 'alert ("Sửa thành công!")';
		echo ('</script>');
	}
	else {
		echo ('<script type="text/javascript">');
		echo 'alert ("Có lỗi, xóa thất bại!")';
		echo ('</script>');
        }
         $data=$this->qltk_model->getAll();
        $alldata2['alldata']=$data;
		$this->load->view('trangchu_view',$alldata2);
}
 function timkiem()
 {
 	$txtTim=$this->input->post('txtTim');
 	$data=$this->qltk_model->searchByText($txtTim);
 	$data['alldata']=$data;
 	$this->load->view('trangchu_view', $data);
 }
 function addAjax()
{
	
	$Username=$this->input->post('Username');
	$Password=$this->input->post('Password');
	
	if($this->qltk_model->insert($Username, $Password))
	{
		echo "<h3>Thêm mới thành công !";
	}
	else
	{
		echo "<h3>Thêm mới thất bại!";
	}

}
}

