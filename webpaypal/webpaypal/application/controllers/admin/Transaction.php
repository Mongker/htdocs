<?php
Class Transaction extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('transaction_model');
        
        // Tai cac file thanh phan
        $this->load->helper('language');
        $this->lang->load('admin/transaction');
        $this->lang->load('admin/common');
        
    }
    
    /*
     * Hien thi danh sach giao dịch
     */
    function index()
    {
        //lay tong so luong ta ca cac giao dich trong websit
        $total_rows = $this->transaction_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac giao dich tren website
        $config['base_url']   = admin_url('transaction/index'); //link hien thi ra danh sach giao dich
        $config['per_page']   = 10;//so luong giao dich hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $where = array();
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        //lọc theo thành viên
        $user = $this->input->get('user');
        if($user)
        {
            $where['user_id'] = $user;
        }
        
        //lọc theo cổng thanh toán
        $payment = $this->input->get('payment');
        if($payment)
        {
            $where['payment'] = $payment;
        }
        
        //lọc theo trạng thái thanh toán
        $status = $this->input->get('status');
        if($status != '')
        {
            $where['status'] = $status;
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
		   	    $where['created >='] = $time['start'];
		   	    $where['created <='] = $time['end'];
	   	    }
   	    }
        //gắn các điệu điện lọc
        $input['where'] = $where;
        
        
        //lay danh sach san pha
        $list = $this->transaction_model->get_list($input);
        $this->data['list'] = $list;
    
        $this->data['filter'] = $input['where'];
        $this->data['created_to'] = $created_to;
        $this->data['created']    = $created;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/transaction/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xuất dữ liệu ra file excel
     */
    public function export()
    {
        //lay toan bo giao dịch
        $list = array();
        $list = $this->transaction_model->get_list();
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
    
        }
        $this->data['list'] = $list;
        // Hien thi view
        $this->load->view('admin/transaction/export', $this->data);
    }
    
    /*
     * ------------------------------------------------------
     *  Action handle
     * ------------------------------------------------------
     */
    /**
     * Xem chi tiet giao dich
     */
    function view()
    {
        //lay id cua giao dịch ma ta muon xoa
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $info = $this->transaction_model->get_info($id);
        if(!$info)
        {
            return false;
        }
        $info->_amount = number_format($info->amount);
        if($info->status == 0)
        {
            $info->_status = 'pending';//đợi xử lý
        }
        elseif($info->status == 1)
        {
            $info->_status = 'completed';//hoàn thành
        }
        elseif($info->status == 2)
        {
            $info->_status = 'cancel';//hủy bỏ
        }
        //lấy danh sách đơn hàng  của giao dịch này
        $this->load->model('order_model');
        $input = array();
        $input['where'] = array('transaction_id' => $id);
        $orders = $this->order_model->get_list($input);
        if(!$orders)
        {
            return false;
        }
        
        //load model sản phẩm product_model
        $this->load->model('product_model');
        foreach ($orders as $row)
        {
            $row->_price = number_format($row->price);
            $row->_amount = number_format($row->amount);
       
            $row->_can_active = true;//có thể thực hiện kích hoạt đơn hàng này hay không
            $row->_can_cancel = TRUE;//có thể hủy đơn hàng hay không
           
            if($row->status == 0)
            {
                $row->_status     = 'pending';//đợi xử lý
            }
            elseif($row->status == 1)
            {
                $row->_status = 'completed';//Đã giao hàng
                $row->_can_active = false;//không thể kích hoạt
            }
            elseif($row->status == 2)
            {
                $row->_status = 'cancel';//hủy bỏ
                $row->_can_cancel = false;//không thể kích hoạt
            }
            //link hủy bỏ đơn hàng
            $row->_url_cancel = admin_url('transaction/cancel/'.$row->id);
            $row->_url_active = admin_url('transaction/active/'.$row->id);//link kích hoạt đơn hàng
        }
    
        $this->data['info']   = $info;
        $this->data['orders'] = $orders;
        // Tai file thanh phan
        $this->load->view('admin/transaction/view', $this->data);
    }
    
    /**
     * Xac nhan giao dich
     */
    function active()
    {
        $this->load->model('order_model');
        //lay id cua đơn hàng ma ta muon kích hoạt
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $info = $this->order_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại đơn hàng này');
            redirect(admin_url('transaction'));
        }
    
        //Cập nhật trạng thái giao hàng
        $data = array();
        $data['status'] = 1;//đã gửi hàng
        $this->order_model->update($id, $data);
    
        //tru di so luong san pham da chuyen cho khach
        //va cong so luong san pham da ban
        $this->load->model('product_model');
        //lay thong san pham trong cai don hang nay
        $product = $this->product_model->get_info($info->product_id);
        $data = array();
        $data['buyed'] = $product->buyed + $info->qty; //cap nhat so luong da mua
        $this->product_model->update($product->id, $data);
        	
        //gui thong bao
        $this->session->set_flashdata('message', 'Đã cập nhật trạng thái đơn hàng thành công');
        redirect(admin_url('order'));
    }
    
    /**
     * Huy bo giao dich
     */
    function cancel()
    {
        $this->load->model('order_model');
        //lay id cua đơn hàng ma ta muon hủy
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $info = $this->order_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại đơn hàng này');
            redirect(admin_url('order'));
        }
    
        $data = array();
        $data['status'] = 2;//Hủy giao dịch
        $this->transaction_model->update($info->transaction_id, $data);
    
        //Cập nhật trạng thái hủy đơn hàng
        $data = array();
        $data['status'] = 2;//Hủy đơn hàng
        $this->order_model->update($id, $data);
    
        //gui thong bao
        $this->session->set_flashdata('message', 'Đã hủy đơn hàng thành công');
        redirect(admin_url('order'));
    }
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
    
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'không tồn tại giao dịch này');
        redirect(admin_url('transaction'));
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
        $transaction = $this->transaction_model->get_info($id);
        if(!$transaction)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại giao dịch này');
            redirect(admin_url('transaction'));
        }
        //thuc hien xoa san pham
        $this->transaction_model->delete($id);
        
    }
}
