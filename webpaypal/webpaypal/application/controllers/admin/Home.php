<?php
Class Home extends MY_Controller
{
    function index()
    {
        //lấy thông báo biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        // Tai cac file thanh phan
        $this->load->model('user_model');
        $this->load->model('transaction_model');
        $this->load->model('user_model');
        $this->load->model('news_model');
        $this->load->model('product_model');
        $this->load->model('contact_model');
        
        //thong ke doanh thu ngay hom nay
        $today = get_date(now());
        $time  = get_time_between($today);
        $where = array(
            'created <=' => $time['end'],
            'created >=' => $time['start'],
            'status' => 1);
        $amount_to_day = $this->transaction_model->get_sum('amount', $where);
        $this->data['amount_to_day'] = $amount_to_day;
        
        //tong thu theo thang nay
        $thangnay = get_date(now());
        $time     = get_time_between($thangnay, '1');
        $where = array(
            'created <=' => $time['end'],
            'created >=' => $time['start'],
            'status' => 1);
        $tongtien_thang = $this->transaction_model->get_sum('amount', $where);
        $this->data['tongtien_thang'] = $tongtien_thang;
        
        //lay tong doanh thu
        $where = array('status' => 1);
        $amount_total = $this->transaction_model->get_sum('amount', $where);
        $this->data['amount_total'] = $amount_total;
        	
        //thống kê tổng số
        $this->data['total_transaction'] = $this->transaction_model->get_total();
        $this->data['total_product'] = $this->product_model->get_total();
        $this->data['total_news']    = $this->news_model->get_total();
        $this->data['total_user']    = $this->user_model->get_total();
        $this->data['total_news']    = $this->news_model->get_total();
        $this->data['total_contact'] = $this->contact_model->get_total();
        
        $this->lang->load('admin/home');
        
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }



    /*
     * Thuc hien dang xuat
     */
    function logout()
    {
        if($this->session->userdata('login'))
        {
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));
    }

    
}