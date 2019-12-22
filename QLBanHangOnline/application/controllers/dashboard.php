<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// controller control user authentication
class Dashboard extends CI_Controller
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();
    }

    /*
     * page default when after user logged
     /********************************************/
    public function index()
    {
        if ($this->auth == null) $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'authentication');
        $today = date('Y-m-d');
        $orders = $this->db->from('orders')->where(('sell_date >'), $today)->where(('deleted'), 0)->get()->result_array();
        $tongtien = 0;
        $soluongsp = array();
        foreach ($orders as $item) {
            $tongtien += (int)str_replace(",", "", $item['total_money']);
            $sps = json_decode($item['detail_order'], true);
            foreach ($sps as $sp) {
                $id = $sp['id'];
                $soluongsp[$id] = 0;
            }
        }
        $data['lamgiaban'] = $this->db->from('products')->where(['prd_status' => 1, 'deleted' => 0, 'prd_sell_price' => 0])->count_all_results();
        $data['lamgiamua'] = $this->db->from('products')->where(['prd_status' => 1, 'deleted' => 0, 'prd_origin_price' => 0])->count_all_results();
        $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'deleted' => 0])->count_all_results();
        $data['data']['_sl_product'] = $total_prd;
        $data['data']['_sl_manufacture'] = $this->db->from('products_manufacture')->count_all_results();
        $slsitem = count($soluongsp);
        $data['slsinventory'] = count($this->db->select('ID')->where(['prd_status' => 1, 'deleted' => 0, 'prd_sls >' => 0])->from('products')->get()->result_array());
        $data['slsaceitem'] = count($this->db->select('ID')->where(['prd_status' => 1, 'deleted' => 0, 'prd_sls' => 0])->from('products')->get()->result_array());
        $data['tongtien'] = $tongtien;
        $data['slsorders'] = count($orders);
        $data['slsitem'] = $slsitem;
        $store = $this->db->from('stores')->get()->result_array();
        $data['data']['store'] = $store;
        $store_id = $this->db->select('store_id')->from('users')->where('id',$this->auth['id'])->limit(1)->get()->row_array();
        $data['data']['store_id'] = $store_id['store_id'];
        $data['data']['user'] = $this->auth;
        $data['template'] = 'home/index';
        $this->load->view('layout/index', isset($data) ? $data : null);
    }

}
