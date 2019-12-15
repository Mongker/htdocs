<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends MY_Controller // CataLog này đang kết thừa My_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('catalog_model'); // liên kết đến thư mục model catalog_nodel ở dưới chỉ việc gọi lại this->catalog_model
		$this->load->library('form_validation'); //1. Sử dụng form validation kiểm tra dữ liệu
												 //2. Xuất các thông báo lỗi ra ngoài view
		$this->load->helper('form'); //
	}
	public function index()
	{
		$message_success = $this->session->flashdata('message_success'); // dùng cái này để tạo ra một thông báo sau đó xóa lun
		$this->data['message_success'] = $message_success;

		$message_fail = $this->session->flashdata('message_fail');  // dùng cái này để tạo ra một thông báo sau đó xóa lun
		$this->data['message_fail'] = $message_fail;

		$input = array();
		$input['order'] = array('id' , 'ASC');
		$list = $this->catalog_model->get_list($input);
		$this->data['list']= $list;

		$this->data['temp']='admin/catalog/index.php';
		$this->load->view('admin/main',$this->data);
	}
	public function add()
	{
		$input = array();
		$input['where'] = array('parent_id <' => '2');
		$list = $this->catalog_model->get_list($input);
		$this->data['list']= $list;

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert" style="padding:5px;border-bottom:0px;">', '</div>');

		if ($this->input->post()) {
			$this->form_validation->set_rules('name','Tên danh mục','required'); //  Yêu cầu phải nhập liệu không được để trống
			if ($this->form_validation->run()) {
				$data = array();
				$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'parent_id' => $this->input->post('parent_id'),
					'sort_order' => $this->input->post('sort_order'),
					'created' => now()
					);
				if ($this->catalog_model->create($data)) {
					$this->session->set_flashdata('message_success', 'Thêm danh mục thành công');
				}else{
					$this->session->set_flashdata('message_fail', 'Thêm danh mục thất bại');
				}
				redirect(admin_url('catalog'));
			}
		}

		$this->data['temp']='admin/catalog/add';
		$this->load->view('admin/main',$this->data);
	}
	public function edit()
	{
		$id = $this->uri->segment(4);
		$catalog = $this->catalog_model->get_info($id);
		if (empty($catalog)) {
			$this->session->set_flashdata('message_fail', 'Danh mục không tồn tại');
			redirect(admin_url('catalog'));
		}
		$this->data['catalog'] = $catalog;
		if ($this->input->post()) {
			$this->form_validation->set_rules('name','Tên danh mục','required');
			if ($this->form_validation->run()) {
				$data = array();
				$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'parent_id' => $this->input->post('parent_id'),
					'sort_order' => $this->input->post('sort_order')
					);
				if ($this->catalog_model->update($id,$data)) {
					$this->session->set_flashdata('message_success', 'Thay đổi danh mục thành công');
				}else{
					$this->session->set_flashdata('message_fail', 'Thay đổi danh mục thất bại');
				}
				redirect(admin_url('catalog'));
			}
		}

		$input = array();
		$input['where'] = array('parent_id <' => '2');
		$list = $this->catalog_model->get_list($input);
		$this->data['list']= $list;

		
		$this->data['temp']='admin/catalog/edit';
		$this->load->view('admin/main',$this->data);
	}
	public function del()
	{
		$id = $this->uri->segment(4);
		$where = array();
		$where = array('id' => $id);
		if (!$this->catalog_model->check_exists($where)) {
			$this->session->set_flashdata('message_fail', 'Danh mục không tồn tại');
			redirect(admin_url('catalog'));
		}
		if ($this->catalog_model->delete($id)) {
			$this->session->set_flashdata('message_success', 'Xóa danh mục thành công');
		}else{
			$this->session->set_flashdata('message_fail', 'Xóa danh mục thất bại');
		}
		redirect(admin_url('catalog'));
	}
}
//Chú thích form_validation :
//required: Yêu cầu phải nhập liệu không được để trống
//matches: Yêu cầu password phải trùng khớp nhau
//min_length: Giới hạn bao nhiêu ký tự khi nhập vào
//max_length: Giới hạn bao nhiêu ký tự khi nhập vào
//numeric: Yêu cầu trong textbox phải nhập liệu là con số
//valid_email: Email nhập liệu bắt buộc phải đúng định dạng
//xss_clean: Xóa XSS của input, bảo mật
