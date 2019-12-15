<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
class Contact extends MY_Controller
{
   /*
   * Ham khi khoi tao
   */
   public function __construct()
   {
       parent::__construct();
       //load các file để validation form
       $this->load->helper('form');
       $this->load->library('form_validation');
       
       //load file model
   	  $this->load->model('contact_model');
   	  
   }
   
   /*
    * Trang dang ky thanh vien
    */
   public function index()
   { 
   	 
   	  //set cac tap luat cho cac the input
   	  $this->form_validation->set_rules('email', 'Địa chỉ email', 'required|valid_email');
   	  $this->form_validation->set_rules('name', 'Họ tên', 'required');
   	  $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|numeric');
   	  $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
   	  $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
   	  $this->form_validation->set_rules('content', 'Nội dung', 'required');
   	
   	  if($this->form_validation->run())
   	  {
   	       // Luu vao bảng contact
			$data = array();
			$data['email']			= $this->input->post('email');
			$data['name']			= $this->input->post('name');
			$data['phone']			= $this->input->post('phone');
			$data['address']		= $this->input->post('address');
			$data['title']		    = $this->input->post('title');
			$data['content']		= $this->input->post('content');
			$data['created'] 		= now();
			$this->contact_model->create($data);
			$this->session->set_flashdata('message', 'Liên hệ thành công');
			redirect();//chuyen toi trang chu
   	  }
   	 
   	  // Hien thi view
	  $this->data['temp'] = 'site/contact/add';
	  $this->load->view('site/layout', $this->data);
   }
   
}

