<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller {
	
	/**
	 * Ham khoi dong
	 */
	function __construct()
	{
		parent::__construct();
		
		// Tai cac file thanh phan
		$this->load->helper('language');
		$this->lang->load('admin/order');
		
		$this->load->model('order_model');
		$this->lang->load('admin/common');
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
		//tao input dieu kien
   	    $input = array();
   	    $where = array();
   	    //lọc theo id
   	    $id = $this->input->get('id');
   	    if($id)
   	    {
   	       $where['order.id'] = $id;
   	    }
   	    
   	    //lọc theo thành viên
   	    $user = $this->input->get('user');
   	    if($user)
   	    {
   	       $where['user_id'] = $user;
   	    }
   	    
	    //lọc theo trạng thái thanh toán
	    $transaction_status = $this->input->get('transaction_status');
   	    if($transaction_status != '')
   	    {
   	       $where['transaction.status'] = $transaction_status;
   	    }
   	    
	    //lọc theo trạng thái gui hang
	    $status = $this->input->get('status');
   	    if($status != '')
   	    {
   	       $where['order.status'] = $status;
   	    }
   	    
   	    //lọc theo thời gian
   	    $created_to = $this->input->get('created_to');
   	    $created    = $this->input->get('created');
   	    if($created && $created_to)
   	    {
   	    	//tiem kiem tu ngay A -> B
   	    	$time = get_time_between_day($created,$created_to);
   	        //nếu dữ liệu trả về hợp lệ
	   	    if(is_array($time))
	   	    {	
		   	    $where['transaction.created >='] = $time['start'];
		   	    $where['transaction.created <='] = $time['end'];
	   	    }
   	    }
   	   
   	    //gắn các điệu điện lọc
   	    $input['where'] = $where;
   	    
	     //Buoc 1:load thu vien phan trang
   	    $this->load->library('pagination');
   	    //Buoc 2:Cau hinh cho phan trang
   	    //lay tong so luong đơn hàng tu trong csdl
   	    $total_rows = $this->order_model->get_total($input);
   	    $config = array();
   	    $config['base_url']    = base_url('admin/order/index');
   	    $config['total_rows']  = $total_rows;
   	    $config['per_page']    = 10;
   	    $config['uri_segment'] = 4;//phân đoạn 4
   	    $config['next_link']   = "Trang kế tiếp";
   	    $config['prev_link']   = "Trang trước";
   	    //Khoi tao phan trang
   	    $this->pagination->initialize($config);
   	    
   	    $input['limit'] = array($config['per_page'], $this->uri->rsegment(3));
		//lay toan bo giao dịch
		$list = array();
		$list = $this->order_model->get_list($input);
		foreach ($list as $row)
		{
		   $row->_amount = number_format($row->amount);
		   if($row->status == 0)
		   {
		     $row->_status = 'pending';
		   }
		   elseif($row->status == 1)
		   {
		     $row->_status = 'completed';
		   }
		   elseif($row->status == 2)
		   {
		     $row->_status = 'cancel';
		   }
		   if($row->transaction_status == 0)
		   {
		     $row->_transaction_status = 'pending';
		   }
		   elseif($row->transaction_status == 1)
		   {
		     $row->_transaction_status = 'completed';
		   }
		   elseif($row->transaction_status == 2)
		   {
		     $row->_transaction_status = 'cancel';
		   }  
		}
		$this->data['list']   = $list;
		$this->data['action'] = current_url();
	    $this->data['total_rows'] = $total_rows;
		$this->data['filter'] = $input['where'];
		$this->data['created_to'] = $created_to;
		$this->data['created']    = $created;
		// Message
		$message = $this->session->flashdata('flash_message');
		if ($message)
		{
			$this->data['message'] = $message;
		}
		
		// Hien thi view
		$this->data['temp'] = 'admin/order/index';
		$this->load->view('admin/main', $this->data);
	}
	
	/**
	 * Export du lieu ra file excel = cach don gian nhat
	 */
	function export()
	{
	    //lay toan bo giao dịch
	    $list = $this->order_model->get_list();
	    foreach ($list as $row)
	    {
	        $row->_amount = number_format($row->amount);
	        if($row->status == 0)
	        {
	            $row->_status = 'pending';
	        }
	        elseif($row->status == 1)
	        {
	            $row->_status = 'completed';
	        }
	        elseif($row->status == 2)
	        {
	            $row->_status = 'cancel';
	        }
	        if($row->transaction_status == 0)
	        {
	            $row->_transaction_status = 'pending';
	        }
	        elseif($row->transaction_status == 1)
	        {
	            $row->_transaction_status = 'completed';
	        }
	        elseif($row->transaction_status == 2)
	        {
	            $row->_transaction_status = 'cancel';
	        }
	    }
	    $this->data['list']   = $list;
	    $this->load->view('admin/order/export', $this->data);
	}

}