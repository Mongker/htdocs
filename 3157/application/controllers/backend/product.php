<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );


class Product extends CI_Controller {

    public $auth;
    private $messages = '0';

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }

    /*
     * Hàng hóa
    /****************************************/
    public function index() {
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Phần mềm quản lý";
        $sls_group = $this->cms_nestedset->dropdown('products_group',NULL,'category');
        $sls_category = $this->db->from('products_category')->get()->result_array();
        $data['data']['_prd_group'] = $sls_group;
        $data['data']['_prd_category'] = $sls_category;
        $user = $this->db->select( 'users.id, username, email, display_name, user_status, group_name ' )->from( 'users' )->join( 'users_group', 'users_group.id = users.group_id' )->get()->result_array();

        $data['data']['_user'] = $user;
        $data['data']['user'] = $this->auth;
        $data[ 'template' ] = 'backend/products/index';
        $this->load->view( 'backend/layout/index', isset( $data ) ? $data : null );
    }

    public function cms_vcrproduct(){
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $sls_group = $this->cms_nestedset->dropdown('products_group',NULL,'category');
        $sls_category = $this->db->from('products_category')->get()->result_array();
        $data['data']['_prd_group'] = $sls_group;
        $data['data']['_prd_category'] = $sls_category;
        $this->load->view( 'backend/products/add_prd', isset( $data ) ? $data : null );
    }

    public function cms_prd_category(){
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data = $this->input->post( 'data' );
        $prd_cate = $this->db->from( 'products_category' )->where('prd_cat_name', $data['prd_cat_name'] )->get()->row_array();
        if( !empty( $prd_cate) && count( $prd_cate ) ) { echo $this->messages ='0'; return; }
        else{
            $data[ 'created' ]           = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
            $data[ 'user_init' ]         = $this->auth[ 'id' ];
            $this->db->insert( 'products_category', $data );
            echo $this->messages = '1';
        }
    }

    public function cms_upprdCategory( $page = 1){
        $config      = $this->cms_common->cms_pagination_custom();
        $total_prdCate =$this->db->from( 'products_category' )->count_all_results();
        $config[ 'base_url' ]   = 'backend/product/cms_upprdCategory';
        $config[ 'total_rows' ] = $total_prdCate;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );

        $data[ '_pagination_link' ] = $this->pagination->create_links();
        $data ['_list_prd_cate' ] = $this->db->from( 'products_category' )->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();

        $this->load->view('backend/ajax/product/list_prd_category', isset( $data ) ? $data : null );
    }

    public function cms_delprdCategory( $id ){
        $id = (int) $id;
        $prd_cate = $this->db->from( 'products_category' )->where( 'ID', $id )->get()->row_array();
        if ( !isset( $prd_cate ) || count( $prd_cate ) == 0 ) {
            echo $this->messages;
            return;
        }
        else {
            $this->db->where( 'ID', $id )->delete( 'products_category' );
            echo $this->messages = '1';
        }
    }

    public function cms_save_item_prdCategory( $id ){
        $id = (int) $id;
        $data = $this->input->post( 'data' );
        $prd_cate = $this->db->from( 'products_category' )->where( 'ID', $id )->get()->row_array();
        if ( !empty( $prd_cate ) || count( $prd_cate ) != 0 ) {
            $check = $this->db->from('products_category')->where( 'prd_cat_name', $data['prd_cat_name'])->get()->result_array();
            if ( empty( $check ) && count( $check ) == 0 ) {
                $data[ 'updated' ]           = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
                $data[ 'user_upd' ]         = $this->auth[ 'id' ];
                $this->db->where( 'ID', $id )->update( 'products_category', $data );
                echo $this->messages = '1';
            }
        }
        else
            echo $this->messages = '0';
    }

    public function cms_prd_group(){
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $this->cms_nestedset->check_empty('products_group');
        $this->cms_nestedset->set('products_group');

        $data = $this->input->post( 'data' );
        if( isset($data['parentid']) ){
            $prd_group = $this->db->from( 'products_group' )->where([ 'parentid' => $data['parentid'],'prd_group_name' => $data['prd_group_name'] ] )->get()->row_array();
        }else{
            $prd_group = $this->db->from( 'products_group' )->where( [ 'parentid' => 0, 'prd_group_name' => $data['prd_group_name'] ] )->get()->row_array();
        }
        if( !empty( $prd_group) && count( $prd_group ) ) { echo $this->messages ='0'; return; }
        else{
            $data[ 'created' ]           = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
            $data[ 'user_init' ]         = $this->auth[ 'id' ];
            $this->db->insert( 'products_group', $data );
            echo $this->messages = '1';
        }
    }

    public function cms_sls_prd_group(){
        $this->cms_nestedset->check_empty('products_group');
        $this->cms_nestedset->set('products_group');
        $sls_group = $this->cms_nestedset->dropdown('products_group',NULL,'category');
        ob_start();
        foreach ( $sls_group as $key => $val ) :
            ?>
            <option value="<?php echo $key; ?>"><?php echo ($val == 'Root') ? '---Nhóm hàng cấp cha---' : $val; ?></option>
            <?php
        endforeach;
        $html = ob_get_contents();
        ob_end_clean();
        echo $this->messages = $html;
    }

    public function cms_upprdGroup( $page = 1 ){

        $this->cms_nestedset->set('products_group');
        $config      = $this->cms_common->cms_pagination_custom();
        $total_prdGroup =$this->db->from( 'products_group' )->count_all_results();
        $total_prdGroup = $total_prdGroup - 1;
        $config[ 'base_url' ]   = 'backend/product/cms_upprdGroup';
        $config[ 'total_rows' ] = $total_prdGroup;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );

        $data[ '_pagination_link' ] = $this->pagination->create_links();
        $data ['_list_prd_group' ] = $this->cms_nestedset->data('products_group', NULL, ['per_page'=> $config['per_page'], 'page' => $page ] );

        $this->load->view('backend/ajax/product/list_prd_group', isset( $data ) ? $data : null );
    }

    public function cms_save_item_prdGroup( $id ){
        $id        = (int)$id;
        $data      = $this->input->post( 'data' );
        $prd_group = $this->db->from( 'products_group' )->where( 'id', $id )->get()->row_array();
        if ( empty( $prd_group ) && count( $prd_group ) == 0 ) {
            echo $this->messages = '0';

            return;
        }
        $prd_group_check = $this->db->from( 'products_group' )->where( [ 'parentid' => $prd_group[ 'parentid' ], 'prd_group_name' => $data[ 'prd_group_name' ] ] )->get()->row_array();
        if ( empty( $prd_group_check ) || count( $prd_group_check ) == 0 ) {
            $data[ 'updated' ]  = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
            $data[ 'user_upd' ] = $this->auth[ 'id' ];
            $this->db->where( 'ID', $id )->update( 'products_group', $data );
            echo $this->messages = '1';
        }
        else
            echo $this->messages = '0';
    }
    public function cms_delprdGroup( $id ){
        $id        = (int)$id;
        $prd_group = $this->db->where( 'id', $id )->from( 'products_group' )->get()->row_array();
        if ( isset( $prd_group ) && count( $prd_group ) ) {
            $countitem     = $this->db->where( 'parentid', $prd_group[ 'ID' ] )->from( 'products_group' )->count_all_results();
            $countprd = $this->db->where( 'prd_group_id', $prd_group[ 'ID' ] )->from( 'products' )->count_all_results();
            if ( $countitem > 0 ) {
                echo $this->messages = 'Không thể xóa nhóm hàng khi có nhóm hàng cấp con.';;
            }
            elseif ( $countprd > 0 ) {
                echo $this->messages = 'Không thể xóa nhóm hàng khi có hàng hóa.';
            }
            else {
                $this->db->delete( 'products_group', [ 'id' => $id ] );
                echo $this->messages = '1';
            }
        }

    }
    public function cms_upprdGroup_option(){
        $this->cms_nestedset->check_empty( 'products_group' );
        $this->cms_nestedset->set( 'products_group' );
        $sls_group = $this->cms_nestedset->dropdown( 'products_group', null, 'category' );
        ob_start(); ?>

        <select class="form-control" id="prd_group_id">
            <optgroup label="Chọn nhóm hàng" class="prd_group-option">
                <?php foreach ( $sls_group as $key => $val ) :
                    if ( $key == 0 ) continue; ?>
                      <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                    <?php
                endforeach; ?>
                <option value="1" selected>Chưa có nhóm hàng</option>
            </optgroup>
            <optgroup label="------------------------">
                <option data-toggle="modal" data-target="#list-prd-group">Tạo mới nhóm hàng</option>
            </optgroup>
        </select>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        echo $this->messages = $html;
    }
    public function cms_add_product(){
        $data       = $this->input->post( 'data' );
        $data       = $this->cms_common_string->allow_post( $data, [ 'prd_name', 'prd_sls', 'prd_inventory', 'prd_origin_price', 'prd_sell_price', 'prd_group_id', 'prd_category_id', 'prd_vat', 'prd_image_url', 'prd_descriptions', 'display_website', 'prd_new', 'prd_hot', 'prd_highlight' ] );
        $check_name = $this->db->select( 'ID' )->from( 'products' )->where( 'prd_name', $data[ 'prd_name' ] )->get()->row_array();
        if ( !empty( $check_name ) && count( $check_name ) ) {
            echo $this->messages = 'Tên hàng hóa ' . $data[ 'prd_name' ] . ' đã tồn tại trong hệ thống. Vui lòng chọn tên khác.';
        }
        else {
            $data[ 'prd_status' ] = 1;
            $data[ 'created' ]    = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
            $data[ 'user_init' ]  = $this->auth[ 'id' ];
            $this->db->insert( 'products', $data );
            echo $this->messages = '1';
        }
    }

    public function cms_load_listProduct( $page = 1){
        $config      = $this->cms_common->cms_pagination_custom();

        $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0])->count_all_results();
        $config[ 'base_url' ]   = 'backend/product/cms_load_listProduct';
        $config[ 'total_rows' ] = $total_prd;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );
        $_pagination_link = $this->pagination->create_links();


        $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 0])->get()->result_array();
        $data['data']['_sl_product'] = $total_prd;
        $data['data']['_sl_category'] = $this->db->from('products_category')->count_all_results();
        $data['_pagination_link'] = $_pagination_link;
        $this->load->view( 'backend/ajax/product/list_products', isset( $data ) ? $data : null );
    }

    public function cms_del_temp_product( $id ){
        $id = (int)$id;
        $product = $this->db->select('prd_name')->from('products')->where('ID', $id)->get()->row_array();
        if( !empty( $product ) && count( $product ) ){
            $this->db->where('ID', $id)->update( 'products', [ 'prd_del_temp' => 1 ]);
            echo $this->messages = '1';
        }else{
            echo $this->messages;
        }
    }
    public function cms_change_status( $id ){
        $id = (int)$id;
        $product = $this->db->select('prd_name')->from('products')->get()->row_array();
        if( !empty( $product ) && count( $product ) ){
            $this->db->where('ID', $id)->update( 'products', [ 'prd_status' => 0 ]);
            echo $this->messages = '1';
        }else{
            echo $this->messages;
        }
    }
    public function cms_edit_product( $id ){
        $id = (int)$id;
        $product = $this->db->from('products')->where('ID', $id)->get()->row_array();
        if( !empty( $product) && count( $product ) ) {

            $data['_detail_product'] = $product;
            $this->load->view('backend/ajax/product/detail_product', isset( $data ) ? $data : null );
        }
    }
    public function cms_loadListproOption1( $page = 1){
        $option = $this->input->post('option');
        $config      = $this->cms_common->cms_pagination_custom();
        if( $option == '0'){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0])->count_all_results();
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 0])->get()->result_array();
        }else if( $option == '1' ){
            $total_prd = $this->db->from('products')->where(['prd_status' => 0, 'prd_del_temp' => 0])->count_all_results();
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 0, 'prd_del_temp' => 0])->get()->result_array();
        }else if( $option == '2' ){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 1])->count_all_results();
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 1])->get()->result_array();
        }

        $config[ 'base_url' ]   = 'backend/product/cms_load_listProduct';
        $config[ 'total_rows' ] = $total_prd;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );
        $_pagination_link = $this->pagination->create_links();
        if( $option == '0'){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 0])->get()->result_array();
        }else if( $option == '1' ){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 0, 'prd_del_temp' => 0])->get()->result_array();
        }else if( $option == '2' ){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 1])->get()->result_array();
        }
        $data['data']['_sl_product'] = $total_prd;
        $data['data']['_sl_category'] = $this->db->from('products_category')->count_all_results();
        $data['_pagination_link'] = $_pagination_link;
        $this->load->view( 'backend/ajax/product/list_products', isset( $data ) ? $data : null );
    }

    public function cms_loadListproOption2( $page = 1){
        $option = $this->input->post('option');
        $config      = $this->cms_common->cms_pagination_custom();

        $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0, 'prd_group_id' => $option])->count_all_results();
        if( $option == '1' ){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0])->count_all_results();
        }
        $config[ 'base_url' ]   = 'backend/product/cms_load_listProduct';
        $config[ 'total_rows' ] = $total_prd;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );

        $_pagination_link = $this->pagination->create_links();

        $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 0, 'prd_group_id'=> $option])->get()->result_array();
        if( $option == '1' ){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 0])->get()->result_array();
        }
        $data['data']['_sl_product'] = $total_prd;
        $data['data']['_sl_category'] = $this->db->from('products_category')->count_all_results();
        $data['_pagination_link'] = $_pagination_link;
        $this->load->view( 'backend/ajax/product/list_products', isset( $data ) ? $data : null );
    }

    public function cms_loadListproOption3( $page = 1){
        $option = $this->input->post('option');
        $config      = $this->cms_common->cms_pagination_custom();

        $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0, 'prd_group_id' => $option])->count_all_results();
        if( $option == '-1' ){
            $total_prd = $this->db->from('products')->where(['prd_status' => 1, 'prd_del_temp' => 0])->count_all_results();
        }
        $config[ 'base_url' ]   = 'backend/product/cms_load_listProduct';
        $config[ 'total_rows' ] = $total_prd;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );

        $_pagination_link = $this->pagination->create_links();

        $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 0, 'prd_category_id'=> $option])->get()->result_array();
        if( $option == '-1' ){
            $data['data']['_list_product'] = $this->db->select('ID,prd_name,prd_sls,prd_sell_price,prd_group_id,prd_category_id,prd_image_url,prd_status')->from('products')->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->where(['prd_status' => 1, 'prd_del_temp' => 0])->get()->result_array();
        }
        $data['data']['_sl_product'] = $total_prd;
        $data['data']['_sl_category'] = $this->db->from('products_category')->count_all_results();
        $data['_pagination_link'] = $_pagination_link;
        $this->load->view( 'backend/ajax/product/list_products', isset( $data ) ? $data : null );
    }
}