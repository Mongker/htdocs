<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// controller control user authentication
class Order extends CI_Controller {

    private $auth;

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }

    /* default login when acess manager system */
    public function index() {
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Phần mềm quản lý";

        $data['data']['user'] = $this->auth;
        $data[ 'template' ] = 'backend/order/index';
        $this->load->view( 'backend/layout/index', isset( $data ) ? $data : null );
    }
    public function cms_vsell_order(){
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data['data']['user'] = $this->auth;
        $this->load->view( 'backend/ajax/orders/sell_bill', isset( $data ) ? $data : null );
    }
    public function cms_edit_order(){
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $id = $this->input->post('id');
        $order = $this->db->from('orders')->where('ID', $id)->get()->row_array();
        $data['_list_products'] = array();

        if( isset($order) && count($order) ){
            $list_products = json_decode( $order['detail_order'], true);

            foreach( $list_products as $product ){
                $_product = $this->cms_finding_productbyID( $product['id'] );
                $_product['count'] = $product['count'];
                $data['_list_products'][] = $_product;
            }
        }

        $data['data']['_order'] = $order;
        $this->load->view( 'backend/ajax/orders/edit_order', isset( $data ) ? $data : null );
    }

    private function cms_finding_productbyID( $id ){
        $product = $this->db->select('ID,prd_name, prd_sell_price')->where('ID', $id)->from('products')->get()->row_array();
        return $product;
    }


    public function cms_search_box_products(){
        $data = $this->input->post('data');
        $products = $this->db->where(array( 'prd_status' => '1', 'prd_del_temp' => '0'))->like('prd_name', $data['keyword'])->from('products')->get()->result_array();
        $data['data']['products'] = $products;
        $this->load->view( 'backend/ajax/orders/search_box', isset( $data ) ? $data : null );
    }
    public function cms_search_box_products2(){
        $data = $this->input->post('data');
        $products = $this->db->where(array( 'prd_status' => '1', 'prd_del_temp' => '0'))->like('prd_name', $data['keyword'])->from('products')->get()->result_array();
        $data['data']['products'] = $products;
        $this->load->view( 'backend/ajax/product/search_box', isset( $data ) ? $data : null );
    }
    public function cms_search_box_customer(){
        $data = $this->input->post('data');
        $customer = $this->db->like('customer_name', $data['keyword'])->or_like('customer_phone', $data['keyword'])->or_like('customer_email', $data['keyword'])->from('customers')->get()->result_array();
        $data['data']['customers'] = $customer;
        $this->load->view( 'backend/ajax/orders/search_box_customer', isset( $data ) ? $data : null );
    }
    public function cms_selected_pro(){
        $id = $this->input->post('id');
        $product = $this->db->from('products')->where('ID', $id)->get()->row_array();
        if( isset($product) && count($product) != 0 ){
            ob_start(); ?>
            <tr data-id="<?php echo $product['ID']; ?>">
                <td class="text-center"></td>
                <td>SP0000<?php echo $product['ID']; ?></td>
                <td><?php echo $product['prd_name']; ?></td>
                <td class="text-center" style="max-width: 30px;"><input style="max-height: 22px;" type="text" class="txtboxToFilter form-control count-pro-order text-center" value="1"> </td>
                <td class="text-center price-order"><?php echo $product['prd_sell_price']; ?></td>
                <td class="text-center total-money"><?php echo $product['prd_sell_price']; ?></td>
                <td class="text-center"><i class="fa fa-trash-o del-pro-order" ></i></td>
            </tr>
        <?php
            $html = ob_get_contents();
            ob_end_clean();
            echo $html;
        }

    }
    public function cms_save_orders(){
        $data = $this->input->post( 'data' );
        if( empty($data['sell_date']) ) {
            $data['sell_date'] = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 ) ;
        }else{
            $data['sell_date'] = gmdate("Y-m-d H:i:s", strtotime(str_replace('/','-',$data['sell_date'])) + 7*3600); ;
        }
        // sử lý số lượng khi order
        $detail_import = $data['detail_order'];
        foreach( $detail_import as $item ){
            $product = $this->db->select('prd_sls')->from('products')->where('ID', $item['id'])->get()->row_array();
            $sls['prd_sls'] = $product['prd_sls'] - $item['count'];
            $this->db->where('ID', $item['id'] )->update('products', $sls );
        }

        $data['user_init'] = $this->auth[ 'id' ];
        $data['created'] = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        $data['detail_order'] = json_encode($data['detail_order']);
        $this->db->insert('orders', $data);
        echo '1';
    }
    public function cms_load_listorders( $page = 1){

        $config      = $this->cms_common->cms_pagination_custom();

        $total_orders = $this->db->from('orders')->where('order_del_temp', 0)->count_all_results();
        $config[ 'base_url' ]   = 'backend/order/cms_load_listorders';
        $config[ 'total_rows' ] = $total_orders;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );
        $_pagination_link = $this->pagination->create_links();


        $data['data']['_list_orders'] = $this->db->from('orders')->where('order_del_temp', 0)->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        $data['data']['_sl_orders'] = $total_orders;
        $data['data']['auth_name'] = $this->auth['display_name'];

        $data['_pagination_link'] = $_pagination_link;
        $this->load->view( 'backend/ajax/orders/list_orders', isset( $data ) ? $data : null );
    }

    public function cms_del_temp_order( $id ){
        $id = (int)$id;
        $order = $this->db->from('orders')->where('ID', $id)->get()->row_array();
        if( !empty( $order ) && count( $order ) ){
            $this->db->where('ID', $id)->update( 'orders', [ 'order_del_temp' => 1 ]);
            echo $this->messages = '1';
        }else{
            echo $this->messages;
        }
    }

}

