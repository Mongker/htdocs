<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// controller control user authentication
class Dashboard extends CI_Controller {

    private $auth;

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }

    /*
     * page default when after user logged
     /********************************************/
    public function index() {
        if( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL. 'backend/authentication' );
        $today = date( 'Y-m-d');
        $sql = "SELECT total_money, detail_order FROM `cms_orders` WHERE  DATE(`sell_date`) = '$today'";
        $query = $this->db->query($sql);
        $orders = $query->result_array();
        $tongtien = 0;
        $soluongsp = array();
        foreach( $orders as $item ){
            $tongtien += (int)str_replace(",","",$item['total_money']);
            $sps = json_decode( $item['detail_order'], true );
            foreach( $sps as $sp ){
                $id = $sp['id'];
                $soluongsp[$id] = 0;
            }
        }
        $data['lamgiaban'] = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0, 'prd_sell_price' => 0])->count_all_results();
        $data['lamgiamua'] = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0, 'prd_origin_price' => 0])->count_all_results();

        $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0])->count_all_results();
        $data['data']['_sl_product'] = $total_prd;
        $data['data']['_sl_category'] = $this->db->from('products_category')->count_all_results();


        $slsitem = count($soluongsp);
        $data['slsinventory'] = count($this->db->select('ID')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0])->from('products')->get()->result_array());
        $data['slsaceitem'] = count($this->db->select('ID')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls' => 0])->from('products')->get()->result_array());
        $data['tongtien'] = $tongtien;
        $data['slsorders'] = count($orders );
        $data['slsitem'] = $slsitem;

        $data['data']['user'] = $this->auth;
        $data[ 'template' ] = 'backend/home/index';
        $this->load->view( 'backend/layout/index', isset( $data ) ? $data : null );
    }

}
