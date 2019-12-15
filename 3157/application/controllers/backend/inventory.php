<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// controller control user authentication
class Inventory extends CI_Controller {

    private $auth;

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }

    /* default login when acess manager system */
    public function index() {
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Phần mềm quản lý";
        $sls_group = $this->cms_nestedset->dropdown('products_group',NULL,'category');
        $sls_category = $this->db->from('products_category')->get()->result_array();
        $data['data']['_prd_group'] = $sls_group;
        $data['data']['_prd_category'] = $sls_category;

        $data['data']['user'] = $this->auth;
        $data[ 'template' ] = 'backend/inventory/index';
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
    public function cms_load_listInventory( $page = 1){

        $search_option = $this->input->post('data');
        $config      = $this->cms_common->cms_pagination_custom();
        if(( isset($search_option['selected2']) && $search_option['selected2'] == '2') && (isset($search_option['selected1']) && $search_option['selected1'] != '1')){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls' => 0, 'prd_group_id' => $search_option['selected1'] ] )->count_all_results();
        }else if(( isset($search_option['selected2']) && $search_option['selected2'] == '2') && ( isset($search_option['keyword']) &&  $search_option['keyword'] != '')){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls' => 0 ] )->like('prd_name', $search_option['keyword'])->or_like('ID', substr( $search_option['keyword'], 6))->count_all_results();
        }else if( isset($search_option['keyword']) &&  $search_option['keyword'] != ''){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0])->like('prd_name', $search_option['keyword'])->or_like('ID', substr( $search_option['keyword'], 6))->count_all_results();
        }else if( isset($search_option['selected1']) && $search_option['selected1'] != '1'){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0, 'prd_group_id' => $search_option['selected1'] ] )->count_all_results();
        }else{
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0])->count_all_results();
        }
        $config[ 'base_url' ]   = 'backend/inventory/cms_load_listInventory';
        $config[ 'total_rows' ] = $total_prd;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );
        $_pagination_link = $this->pagination->create_links();


        if(( isset($search_option['selected2']) && $search_option['selected2'] == '2') && (isset($search_option['selected1']) && $search_option['selected1'] != '1')){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_origin_price')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls' => 0, 'prd_group_id' => $search_option['selected1']])->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        }else if(( isset($search_option['selected2']) && $search_option['selected2'] == '2') && ( isset($search_option['keyword']) &&  $search_option['keyword'] != '')) {
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_origin_price')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls' => 0])->like('prd_name', $search_option['keyword'])->or_like('ID', substr( $search_option['keyword'], 6))->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        }else if( (isset($search_option['selected1']) && $search_option['selected1'] != '1') && ( isset($search_option['keyword']) &&  $search_option['keyword'] != '')){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_origin_price')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0, 'prd_group_id' => $search_option['selected1']])->like('prd_name', $search_option['keyword'])->or_like('ID', substr( $search_option['keyword'], 6))->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        }else if( isset($search_option['keyword']) &&  $search_option['keyword'] != ''){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_origin_price')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0])->like('prd_name', $search_option['keyword'])->or_like('ID', substr( $search_option['keyword'], 6))->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        }else if( isset($search_option['selected1']) && $search_option['selected1'] != '1'){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_origin_price')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0, 'prd_group_id' => $search_option['selected1']])->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        }else{
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_origin_price')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0])->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        }


        $totaloinvent = $totalsinvent = $sls = 0;
        $tempdata = $data['data']['_list_product'];
        foreach( $tempdata as $item ){
            $sls += $item['prd_sls'];
            $totaloinvent += ( $item['prd_sls'] * $item['prd_origin_price'] );
            $totalsinvent += ( $item['prd_sls'] * $item['prd_sell_price'] );
        }
        $data['total_sls'] = $sls;
        $data['totaloinvent'] = $totaloinvent;
        $data['totalsinvent'] = $totalsinvent;
        $data['data']['_sl_product'] = $total_prd;
        $data['data']['_sl_category'] = $this->db->from('products_category')->count_all_results();
        $data['_pagination_link'] = $_pagination_link;
        $this->load->view( 'backend/ajax/inventory/list_inven', isset( $data ) ? $data : null );
    }

    public function ExportInventory(){
       //Load thư viện PHP Exell

        $date_inventory = gmdate( "dmY", time() + 7 * 3600 ) ;
        $today = gmdate( "d/m/Y H:i", time() + 7 * 3600 ) ;
        require_once "public/templates/backend/libs/PHPExcel/PHPExcel.php";
        $obPHPExcel = new PHPExcel();
        $obPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Ngày lập')->setCellValue('A2', 'Kho')->setCellValue('A3', 'Tổng tồn kho')->setCellValue('A4', 'Tổng giá trị tồn kho')->setCellValue('A5', 'Tổng giá trị bán');
        $obPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $obPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
        $obPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $obPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
        $obPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
        $stylehead = array(
            'font' => array(
                'color' => array('argb' => PHPExcel_Style_Color::COLOR_BLUE),
                'bold' => true
            )
        );
        $obPHPExcel->setActiveSheetIndex(0)->mergeCells('A6:E6');
        $activeSheet = $obPHPExcel->getActiveSheet();
        $activeSheet->getStyle('A1:A5')->applyFromArray($stylehead);
        $obPHPExcel->getActiveSheet()->setTitle('Báo cáo tồn kho');
        $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_origin_price')->where(['prd_status' => 1, 'prd_del_temp' => 0,'prd_sls >' => 0])->from('products')->order_by( 'created', 'desc' )->get()->result_array();

        $totaloinvent = $totalsinvent = $sls = 0;
        $tempdata = $data['data']['_list_product'];
        foreach( $tempdata as $item ){
            $sls += $item['prd_sls'];
            $totaloinvent += ( $item['prd_sls'] * $item['prd_origin_price'] );
            $totalsinvent += ( $item['prd_sls'] * $item['prd_sell_price'] );
        }

        $obPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', $today)->setCellValue('B2', 'Thái Nguyên')->setCellValue('B3', $this->cms_common->cms_currency_format($sls))->setCellValue('B4', $this->cms_common->cms_currency_format($totaloinvent))->setCellValue('B5', $this->cms_common->cms_currency_format($totalsinvent));
        $obPHPExcel->setActiveSheetIndex(0)->setCellValue('A7', 'Mã hàng')->setCellValue('B7', 'Tên hàng')->setCellValue('C7', 'Tồn kho')->setCellValue('D7', 'Giá trị tồn')->setCellValue('E7', 'Giá trị bán');
        $activeSheet->getStyle('A7:E7')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => '0B87C9')
                )
            )
        );
        $i = 8;
        $valinven = $valsinven = 0;
        foreach( $tempdata as $key => $item ){
            $valinven = $this->cms_common->cms_currency_format($item['prd_sls'] * $item['prd_origin_price']);
            $valsinven = $this->cms_common->cms_currency_format($item['prd_sls'] * $item['prd_sell_price']);
            $obPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, 'SP000'.$item['ID'])->setCellValue('B'.$i, $item['prd_name'])->setCellValue('C'.$i, $item['prd_sls'])->setCellValue('D'.$i, $valinven)->setCellValue('E'.$i, $valsinven);
            $i++;
        }
        $file_export = 'Baocaotonkho_'.$date_inventory.'.xls';
        $objWriter = PHPExcel_IOFactory::createWriter($obPHPExcel, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename='$file_export'");
        header('Cache-Control: max-age=0');
        if (isset($objWriter)) {
            $objWriter->save('php://output');
        }
    }
}

