<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
class News extends MY_Controller
{
   /*
   * Ham khi khoi tao
   */
   public function __construct()
   {
       parent::__construct();
       $this->load->model('news_model');
   }
   
  
   /*
    * Trang dang danh sách bài viết
    */
   public function index()
   {
   	  //Buoc 1:load thu vien phan trang
   	  $this->load->library('pagination');
   	  //Buoc 2:Cau hinh cho phan trang
   	  //lay tong so luong bai viet tu trong csdl
   	  $total_rows = $this->news_model->get_total();
   	  $config = array();
   	  $config['base_url']    = base_url('news/index');
   	  $config['total_rows']  = $total_rows;
   	  $config['per_page']    = 3;
   	  $config['uri_segment'] = 3;
   	  $config['next_link']   = "Trang kế tiếp";
   	  $config['prev_link']   = "Trang trước";
   	  
   	  //Khoi tao phan trang
   	  $this->pagination->initialize($config);
   	  
   	  $input = array();
   	  $input['limit'] = array($config['per_page'], $this->uri->segment(3));
   	  //lay danh sach bai viet trong csdl,moi lan lay limit 3 bai viet
   	  //$this->uri->segment(n): lay ra phan doan thu n tren link url
      $newss = $this->news_model->get_list($input);
      
      $this->data['list'] = $newss;
      
   	  // Hien thi view
	  $this->data['temp'] = 'site/news/list';
	  $this->load->view('site/layout', $this->data);
   }
   
   /*
    * Trang chi tiết bài viết
    */
   public function view()
   {
        // Lay thong tin cua bài viết
        //id của bài viết sẽ nằm ở phân đoạn thứ 3
		$id = $this->uri->rsegment(3);
		$info = $this->news_model->get_info($id);
		if (!$info)
		{
			$this->session->set_flashdata('flash_message', 'Không tồn tại bài viết này');
			redirect();
		}
		$info->_image = base_url('upload/news/'.$info->image_link);
		$this->data['info'] = $info;

        //cap nhat luot xem cho bai viet
        $data = array();
        $data['count_view'] = $info->count_view + 1;
        $this->news_model->update($id, $data);
        
		// Hien thi view
	    $this->data['temp'] = 'site/news/view';
	    $this->load->view('site/layout', $this->data);
   }
   
  
}

