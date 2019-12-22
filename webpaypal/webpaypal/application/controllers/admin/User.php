<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		// Tai cac file thanh phan
		$this->load->model('user_model');
		$this->lang->load('admin/user');
	}
	
	
/*
 * ------------------------------------------------------
 *  Rule handle
 * ------------------------------------------------------
 */
 /*
    * Kiểm tra email đã tồn tại hay chưa
    */
   function check_email()
   {
   	   
   	   $email = $this->input->post('email');
       $where = array();
       $where['email'] = $email;
       //kiểm tra điều kiện email có tồn tại trong csdl hay không
       if($this->user_model->check_exists($where))
       {
       	    //trả về thông báo lỗi nếu đã tồn tại email này
			$this->form_validation->set_message(__FUNCTION__, 'Email đã sử dụng');
			return FALSE;
       }
       return TRUE;
   }
/*
 * ------------------------------------------------------
 *  Action main handle
 * ------------------------------------------------------
 */
	/**
	 * Them moi
	 */
	function add()
	{
	   //load thu vien validation
	   $this->load->library('form_validation');
	   $this->load->helper('form');
	   
	   //tao cac tap luat
	   $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
	   $this->form_validation->set_rules('name', 'Họ và tên', 'required|min_length[8]');
	   $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|min_length[8]|numeric');
	   $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]|numeric');
	   $this->form_validation->set_rules('password_repeat', 'Nhập lại mật khẩu', 'required|matches[password]');
	   $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
	   
	   if($this->form_validation->run())
	   {
	       //lay du lieu tu form
	       $name     = $this->input->post('name');
	       $email    = $this->input->post('email');
	       $password = $this->input->post('password');
	       $password = md5($password);
	       $phone    = $this->input->post('phone');
	       $address  = $this->input->post('address');
	       //du lieu them vao bang thanh vien
	       $data = array(
	           'name'     => $name,
	           'email'    => $email,
	           'password' => $password,
	           'phone'    => $phone,
	           'address'  => $address
 	       );
	       //them thanh vien vao trong csdl
	       if($this->user_model->create($data))
	       {
	       	  $this->session->set_flashdata('flash_message', 'Thêm thành viên thành công');
			  redirect(base_url('admin/user'));//chuyen toi trang danh sách thành viên
	       }
	    }
	    
		$this->data['action'] = current_url();
		
		// Hien thi view
		$this->data['temp'] = 'admin/user/add';
		$this->load->view('admin/main', $this->data);
	}
	
	/**
	 * Chinh sua
	 */
	function edit()
	{
	    //lay id cua thanh vien ma ta muon xoa
		$id = $this->uri->rsegment('3');
		//lay thong tin cua bài viết
		$info = $this->user_model->get_info($id);
		if(!$info)
		{
		     //gui thong bao that bai
             $this->session->set_flashdata('flash_message', 'Khong ton tai thanh vien nay');
             redirect(admin_url('user'));
		}
		
	   //load thu vien validation
	   $this->load->library('form_validation');
	   $this->load->helper('form');
	   
	   //tao cac tap luat
	   $this->form_validation->set_rules('name', 'Họ và tên', 'required|min_length[8]');
	   $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|min_length[8]|numeric');
	   $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
	   
	   $password = $this->input->post('password');
	   if($password)//nếu cập nhật cả mật khẩu
	   {
		   $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]|numeric');
		   $this->form_validation->set_rules('password_repeat', 'Nhập lại mật khẩu', 'required|matches[password]');
	   }
	   if($this->form_validation->run())
	   {
	       //lay du lieu tu form
	       $name     = $this->input->post('name');
	       $phone    = $this->input->post('phone');
	       $address  = $this->input->post('address');
	       
	       //du lieu them vao bang thanh vien
	       $data = array(
	           'name'     => $name,
	           'phone'    => $phone,
	           'address'  => $address
 	       );
 	       if($password)//nếu cập nhật cả mật khẩu
	       {
	       	  $password = md5($password);
	       	  $data['password'] = $password;
	       }
	       //them thanh vien vao trong csdl
	       if($this->user_model->update($id, $data))
	       {
	       	  $this->session->set_flashdata('flash_message', 'Cập nhật thành viên thành công');
			  redirect(base_url('admin/user'));//chuyen toi trang danh sách thành viên
	       }
	    }
		$this->data['action'] = current_url();
		$this->data['info']   = $info;
		
		// Hien thi view
		$this->data['temp'] = 'admin/user/edit';
		$this->load->view('admin/main', $this->data);
	}

	/**
	 * Khoa tai khoan
	 */
	function block()
	{
		
	}
	
	/**
	 * Mo lai tai khoan
	 */
	function unblock()
	{
		
	}
	
	
	/*
	 * Xoa du lieu
	 */
	function del()
	{
	    $id = $this->uri->rsegment(3);
	    $this->_del($id);
	
	    //tạo ra nội dung thông báo
	    $this->session->set_flashdata('message', 'không tồn tại thành viên này');
	    redirect(admin_url('user'));
	}
	
	/*
	 * Xóa nhiều sản phẩm
	 */
	function delete_all()
	{
	    $ids = $this->input->post('ids');
	    foreach ($ids as $id)
	    {
	        $this->_del($id);
	    }
	}
	
	/*
	 *Xoa san pham
	 */
	private function _del($id)
	{
	    $user = $this->user_model->get_info($id);
	    if(!$user)
	    {
	        //tạo ra nội dung thông báo
	        $this->session->set_flashdata('message', 'không tồn tại thành viên này');
	        redirect(admin_url('user'));
	    }
	    //thuc hien xoa san pham
	    $this->user_model->delete($id);
	
	}
	
/*
 * ------------------------------------------------------
 *  List handle
 * ------------------------------------------------------
 */
	/**
	 * Danh sach
	 */
	function index()
	{
	     //Buoc 1:load thu vien phan trang
   	    $this->load->library('pagination');
   	    //Buoc 2:Cau hinh cho phan trang
   	    //lay tong so luong thanh vien tu trong csdl
   	    $total_rows = $this->user_model->get_total();
   	    $config = array();
   	    $config['base_url']    = base_url('admin/user/index');
   	    $config['total_rows']  = $total_rows;
   	    $config['per_page']    = 10;
   	    $config['uri_segment'] = 4;//phân đoạn 4
   	    $config['next_link']   = "Trang kế tiếp";
   	    $config['prev_link']   = "Trang trước";
   	    //Khoi tao phan trang
   	    $this->pagination->initialize($config);
   	    
   	    $input = array();
   	    $input['limit'] = array($config['per_page'], $this->uri->rsegment(3));
		//lay toan bo bài viết
		$list = array();
		$list = $this->user_model->get_list($input);
		$this->data['list'] = $list;
		
		// Luu bien gui den view
		$this->data['action'] = current_url();
		// Message
		$message = $this->session->flashdata('flash_message');
		if ($message)
		{
			$this->data['message'] = $message;
		}
		// Hien thi view
		$this->data['temp'] = 'admin/user/index';
		$this->load->view('admin/main', $this->data);
	}
	
	
	
}