<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}


	public function index()
	{
		$this->load->view('login_view');
	}
	public function check_login12($username,$password)
	{
	  $this->input->post('username');
	  $this->input->post('password');
      $data=$this->qltk_model->check_account($username,$password);
 	  if($data == 0){
 	  	echo 'Đăng nhập thất bại';

 	  }
      
	}
	 function check_login()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                if($this->login_model->check_account($username,$password))  
                {  
                     $session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata('test',$session_data);  
                     $info = $this->session->userdata('test');
                     redirect(base_url() . 'login/ds_benhnhan');  
                    
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }
      function ds_benhnhan(){
      	// $this->load->view('thembenhnhan_view');
        $ketqua = $this->login_model->getAllData() ;
        $ketqua = $name = ['dsbenhnhan' => $ketqua];
        $this->load->view('dsbenhnhan_view', $ketqua);
      } 

      function themds() {
        $this->load->view('thembenhnhan_view');
      }

      function them()
      {
      	$tenbenhnhan = $this->input->post('tenbenhnhan');
        $tuoi = $this->input->post('tuoi');
        $sdt  = $this->input->post('sdt');
        $diachi = $this->input->post('diachi');
        $cmt = $this->input->post('cmt');
        $ngaysinh = $this->input->post('ngaysinh');
        if($this->login_model->insert($tenbenhnhan,$tuoi,$sdt,$diachi,$cmt,$ngaysinh))
          {
            echo "<h3>Thêm mới thành công!";
          }
          else
          {
            echo "<h3>Thêm mới thất bại!";
          }

      }
      function xoa_dsbn($id)
      {
        $this->login_model-> getDateByIDDelete($id);
        $this->load->view('quaylai_view');
      }
      function sua_dsbn($id)
      {
       
       $ketqua = $this->login_model->getDateByID($id); // Đưa vào id lấy ra dữ liệu
       $ketqua =$name = ['dulieuketqua' =>$ketqua ]; // biến đổi dữ liệu thành mảng
       $this->load->view('editlist_view', $ketqua); // đưa dữ liệu qua view 
      }
      function update_dsnhansu()
      {
        // Lấy dữ liệu từ view 
        $id = $this->input->post('id');
        $tenbenhnhan = $this->input->post('tenbenhnhan');
        $tuoi = $this->input->post('tuoi');
        $sdt  = $this->input->post('sdt');
        $diachi = $this->input->post('diachi');
        $cmt = $this->input->post('cmt');
        $ngaysinh = $this->input->post('ngaysinh');

      // Gọi model ra
      $this->load->model('login_model');
      $this->login_model->getDateByIDEdit($id,$tenbenhnhan,$tuoi,$sdt,$diachi,$cmt,$ngaysinh);
      $this->load->view('quaylai_view');

      }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */