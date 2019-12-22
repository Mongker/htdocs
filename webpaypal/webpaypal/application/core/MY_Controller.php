<?php
Class MY_Controller extends CI_Controller
{
    //bien gui du lieu sang ben view
    public $data = array();
    
    function __construct()
    {
        //ke thua tu CI_Controller
        parent::__construct();
        
        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin' :
                {
                    $this->load->helper('language');
                    $this->lang->load('admin/common');
                    
                    //xu ly cac du lieu khi truy cap vao trang admin
                    $this->load->helper('admin');
                    $this->_check_login();
                    
                    $this->load->model('admin_model');
                    $login = $this->session->userdata('login');
                    
                    // $permission = (array)json_decode( $login['permissions']);
                    // if(empty($permission))
                    //     die();
                    // $this->data['permissions'] = $permission;

                    //lấy ra thông tin admin đăng nhập
                    $this->load->model('admin_model');
                    $admin_info = $this->admin_model->get_info($login);
                    $this->data['admin_info'] = $admin_info;
                    
                    break;
                }
            default:
                {
                    //xu ly du lieu o trang ngoai
                    //lay danh sach danh muc san pham
                    $this->load->model('catalog_model');
                    $input = array();
                    $input['where'] = array('parent_id' => 0);
                    $catalog_list = $this->catalog_model->get_list($input);
                    foreach ($catalog_list as $row)
                    {
                        $input['where'] = array('parent_id' => $row->id);
                        $subs = $this->catalog_model->get_list($input);
                        $row->subs = $subs;
                    }
                    $this->data['catalog_list'] = $catalog_list;
                    
                    //lay danh sach bai viet moi
                    $this->load->model('news_model');
                    $input = array();
                    $input['limit'] = array(5, 0);
                    $news_list = $this->news_model->get_list($input);
                    $this->data['news_list'] = $news_list;
                    
                    
                    //kiem tra xem thanh vien da dang nhap hay chua
                    $user_id_login = $this->session->userdata('user_id_login');
                    $this->data['user_id_login'] = $user_id_login;
                    //neu da dang nhap thi lay thong tin cua thanh vien
                    if($user_id_login)
                    {
                        $this->load->model('user_model');
                        $user_info = $this->user_model->get_info($user_id_login);
                        $this->data['user_info'] = $user_info;
                    }
                    
                    //load model ho tro truc tuyen
                    $this->load->model('support_model');
                    //lay danh sach ho tro truc tuyen
                    $supports = $this->support_model->get_list();
                    //gui bien sang view
                    $this->data['supports'] = $supports;
                    
                    //goi toi thu vien
                    $this->load->library('cart');
                    $this->data['total_items']  = $this->cart->total_items();
                }
            
        }
    }
    
    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);
    
        $login = $this->session->userdata('login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if(!$login && $controller != 'login')
        {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }elseif(!in_array($controller,array('login','home')))
        {
            //kiểm tra quyền tại đây
            $admin_id = $this->session->userdata('login');//lấy id admin đăng nhập
            $admin_root = $this->config->item('root_admin');//lấy id admin config
            if($admin_id != $admin_root)
            {
               $permissions_admin = $this->session->userdata('permissions');
               $controller = $this->uri->rsegment(1);

               $action = $this->uri->rsegment(2);
               $check = true;
              if(!isset($permissions_admin->{$controller}))
              {
                $check = false;
              }
              $permissions_actions = $permissions_admin->{$controller};
              if(!in_array($action,$permissions_actions))
              {
                $check = false;
              }
              if(!$check)
              {
                $this->session->set_flashdata('message','<script>alert("Bạn không đủ thẩm quyền vào trang này");</script>');
                redirect(base_url('admin'));
              }

            }
            
        }
    }

}


