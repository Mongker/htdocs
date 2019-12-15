<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qltt extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('qltt_model');
	}

	public function index()
	{
		$data=$this->qltt_model->getAll();
        $alldata2['alldata']=$data;
		$this->load->view('thongtin_view',$alldata2);
	}
function viewadd()
{
	$this->load->view('addtt_view');
}
function themtt()
{
	$name=$this->input->post('name');
	$birthday=$this->input->post('birthday');
	$address=$this->input->post('address');
	$class=$this->input->post('class');
	$sex=$this->input->post('sex');
	
	
	if($this->qltt_model->insert($name, $birthday,$address, $class,$sex))
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
	
	if ($this->qltt_model->deleteById($id)) {
		echo ('<script type="text/javascript">');
		echo 'alert ("Xóa thành công!")';
		echo ('</script>');
	}
	else {
		echo ('<script type="text/javascript">');
		echo 'alert ("Có lỗi, xóa thất bại!")';
		echo ('</script>');
	}
	    $data=$this->qltt_model->getAll();
        $alldata2['alldata']=$data;
		$this->load->view('thongtin_view',$alldata2);
}
        function sua($id)
        {
        	
        	$data=$this->qltt_model->getById($id);
        	$data['suatt']=$data;
        	$this->load->view('suatt_view', $data);
        	
        }
        function suatt()
        {
        	$tt=$this->input->post();
        	if ($this->qltt_model->updateById($tt)) {
		echo ('<script type="text/javascript">');
		echo 'alert ("Sửa thành công!")';
		echo ('</script>');
	}
	else {
		echo ('<script type="text/javascript">');
		echo 'alert ("Có lỗi, xóa thất bại!")';
		echo ('</script>');
        }
         $data=$this->qltt_model->getAll();
        $alldata2['alldata']=$data;
		$this->load->view('thongtin_view',$alldata2);
}
 function timkiem()
 {
 	$txtTim=$this->input->post('txtTim');
 	$data=$this->qltt_model->searchByText($txtTim);
 	$data['alldata']=$data;
 	$this->load->view('thongtin_view', $data);
 }
function addAjax()
{
    $name=$this->input->post('name');
	$birthday=$this->input->post('birthday');
	$address=$this->input->post('address');
	$class=$this->input->post('class');
	$sex=$this->input->post('sex');
	if($this->qltt_model->insert($name, $birthday,$address, $class,$sex))
	{
		echo "<h3>Thêm mới thành công!";
	}
	else
	{
		echo "<h3>Thêm mới thất bại!";
	}
}
}

