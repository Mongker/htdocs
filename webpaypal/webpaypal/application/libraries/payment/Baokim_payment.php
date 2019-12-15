<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Ket noi cong thanh toan baokim.vn
 *
 * @author		hoangvantuyencnt@gmail.com
 * @version		06-25-2012
 */
// define('EMAIL_BUSINESS','hthanhbmt@gmail.com');//Email Bảo kim
// define('MERCHANT_ID','23192');                // Mã website tích hợp
// define('SECURE_PASS','375f2c8ab307e486');   // Mật khẩu
class BaoKim_payment{
	
	var $CI   = '';
	var $data = array();
	 
	// Thong so cai dat payment
	var $code 		= 'baokim';
	var $setting 	= array(
							'business' 				=> 'blogphongdat.com@gmail.com',//tai khoan cua nguoi nhan tien
							'merchant_id' 			=> '27008',//id cua website khi dang ky ben baokim
							'secure_pass' 			=> 'f21fde0ef7a0e9c6',//mat khau giao tiep
							'cost_constant'			=> 1700,
							'cost_percent'			=> 1,
						);
	
	// Cac bien giao tiep cua payment
	var $url 		= 'https://www.baokim.vn/payment/customize_payment/order';	// URL chay that
	//var $url 		= 'http://sandbox.baokim.vn/payment/customize_payment/order';	// URL chay test
	var $ip			= array('101.99.3.118', '210.245.83.89', '210.245.83.94', '42.112.21.10',
	    '210.245.83.90', '210.245.80.104', '210.245.88.180', '210.245.83.82', '210.245.83.87'
	);
	
    public function __construct()
	{
	 	//khoi tao 1 doi tuong moi
	 	$this->CI =& get_instance();
	}
	
/*
 * ------------------------------------------------------
 *  Checkout handle
 * ------------------------------------------------------
 */
	/**
	 * Chuyen den payment
	 * @$tran_id : id cua bang transaction, cho biết thanh toán cho giao dịch nào trên website
	 * @amount: số tiền khách cần thanh toán, là cột amount trong bảng transaction
	 * @$return_url: Đường link trả về khi thanh toán xong,hoặc hủy bỏ
	 */
	function payment($tran_id, $amount, $return_url = '')
	{
	    $return_url = (!$return_url) ? site_url() : $return_url;
		$tran_info = 'Thanh toan cho đơn hàng '.$tran_id;
		
		$url = array();
		$url['success'] = $return_url;
		$url['cancel'] 	= $return_url;
		$url['detail'] 	= $return_url;
		
		$url = $this->_bk_create_url($tran_id, $this->setting['business'], $amount, '', '', $tran_info, $url['success'], $url['cancel'], $url['detail']);
		redirect($url);
	}
	
	/**
	 * Xu ly ket qua tra ve tu payment
	 */
	function result($tran_id, $amount)
	{
	    // Luu du lieu tra ve,luu vào cột payment_info trong bảng transaction
	    $result = $this->CI->input->post();
	    $this->CI->load->model('transaction_model');
	    $data = array();
	    $data['payment_info'] = serialize($result);
	    $this->CI->transaction_model->update($tran_id, $data);
	    
		// Neu la link user chuyen ve tu baokim sau khi thanh toan xong
		if (!$this->CI->input->post('order_id'))
		{
			return NULL;
		}
		
		// Kiem tra ip
		if ($this->ip != $this->CI->input->ip_address())
		{
			return FALSE;
		}
		
		// Kiem tra ma so giao dich
		if ($tran_id != $this->CI->input->post('order_id'))
		{
			return FALSE;
		}
		
		// Kiem tra amount
		$amount_pay = floatval($this->CI->input->post('total_amount'));
		$amount 	= floatval($amount);
		if ($amount_pay < $amount)
		{
			return FALSE;
		}
		
		// Kiem tra trang thai giao dich
		if ($this->CI->input->post('transaction_status') != 4)
		{
			return NULL;
		}

		return TRUE;
	}
	
	/**
	 * Lay tran_id tu ket qua tra ve cua baokim
	 */
	function checkout_result_get_tran_id(&$security = '')
	{
		$tran_id = $this->CI->input->post('order_id');
		
		return $tran_id;
	}

	
	
/*
 * ------------------------------------------------------
 *  BaoKim function
 * ------------------------------------------------------
 */
	/**
	 * Hàm xây dựng url chuyển đến BaoKim.vn thực hiện thanh toán, trong đó có tham số mã hóa (còn gọi là public key)
	 * @param $order_id				Mã đơn hàng
	 * @param $business 			Email tài khoản người bán
	 * @param $total_amount			Giá trị đơn hàng
	 * @param $shipping_fee			Phí vận chuyển
	 * @param $tax_fee				Thuế
	 * @param $order_description	Mô tả đơn hàng
	 * @param $url_success			Url trả về khi thanh toán thành công
	 * @param $url_cancel			Url trả về khi hủy thanh toán
	 * @param $url_detail			Url chi tiết đơn hàng
	 * @return url cần tạo
	 */
	private function _bk_create_url($order_id, $business, $total_amount, $shipping_fee, $tax_fee, $order_description, $url_success, $url_cancel, $url_detail)
	{
		// Mảng các tham số chuyển tới baokim.vn
		$params = array(
			'merchant_id'		=>	strval($this->setting['merchant_id']),
			'order_id'			=>	strval($order_id),
			'business'			=>	strval($business),
			'total_amount'		=>	strval($total_amount),
			'shipping_fee'		=>  strval($shipping_fee),
			'tax_fee'			=>  strval($tax_fee),
			'order_description'	=>	strval($order_description),
			'url_success'		=>	strtolower(urlencode($url_success)),
			'url_cancel'		=>	strtolower(urlencode($url_cancel)),
			'url_detail'		=>	strtolower(urlencode($url_detail))
		);
		ksort($params);
		
		$str_combined = $this->setting['secure_pass'].implode('', $params);
		$params['checksum'] = strtoupper(md5($str_combined));
		
		//Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào
		$redirect_url = $this->url;
		if (strpos($redirect_url, '?') === FALSE)
		{
			$redirect_url .= '?';
		}
		else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === FALSE)
		{
			// Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
			$redirect_url .= '&';			
		}
				
		// Tạo đoạn url chứa tham số
		$url_params = '';
		foreach ($params as $key => $value)
		{
			if ($url_params == '')
			{
				$url_params .= $key . '=' . urlencode($value);
			}
			else
			{
				$url_params .= '&' . $key . '=' . urlencode($value);
			}
		}
		
		return $redirect_url.$url_params;
	}
	
	/**
	 * Hàm thực hiện xác minh tính chính xác thông tin trả về từ BaoKim.vn
	 * @param $data chứa tham số trả về trên url
	 * @return true nếu thông tin là chính xác, false nếu thông tin không chính xác
	 */
	private function _bk_check_result($data = array())
	{
		$checksum = $data['checksum'];
		unset($data['checksum']);
		
		ksort($data);
		$str_combined = $this->setting['secure_pass'].implode('', $data);

        // Mã hóa các tham số
		$verify_checksum = strtoupper(md5($str_combined));
		
		// Xác thực mã của chủ web với mã trả về từ baokim.vn
		if ($verify_checksum === $checksum) 
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
}

?>