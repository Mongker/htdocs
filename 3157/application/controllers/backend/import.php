<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// controller control user authentication
class Import extends CI_Controller {

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
        $data[ 'template' ] = 'backend/imports/index';
        $this->load->view( 'backend/layout/index', isset( $data ) ? $data : null );
    }
    public function cms_vsell_import(){
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data['data']['user'] = $this->auth;
        $this->load->view( 'backend/ajax/imports/import_bill', isset( $data ) ? $data : null );
    }
    public function cms_search_box_manuf(){
        $data = $this->input->post('data');
        $manuf = $this->db->like('manuf_name', $data['keyword'])->or_like('manuf_phone', $data['keyword'])->or_like('manuf_email', $data['keyword'])->from('manufactures')->get()->result_array();
        $data['data']['manufactures'] = $manuf;
        $this->load->view( 'backend/ajax/imports/search_box_manuf', isset( $data ) ? $data : null );
    }
    public function cms_save_import(){
        $data = $this->input->post( 'data' );
        if( empty($data['input_date']) ) {
            $data['input_date'] = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 ) ;
        }else{
            $data['input_date'] = gmdate("Y-m-d H:i:s", strtotime(str_replace('/','-',$data['input_date'])) + 7*3600); ;
        }
        // sử lý số lượng khi import
        $detail_import = $data['detail_import'];
        foreach( $detail_import as $item ){
            $product = $this->db->select('prd_sls')->from('products')->where('ID', $item['id'])->get()->row_array();
            $sls['prd_sls'] = $product['prd_sls'] + $item['count'];
            $this->db->where('ID', $item['id'] )->update('products', $sls );
        }

        $data['id_stock'] = $this->auth[ 'id_stock' ];
        $data['user_init'] = $this->auth[ 'id' ];
        $data['created'] = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        $data['detail_import'] = json_encode($data['detail_import']);
        $this->db->insert('import_stock', $data);
        echo '1';
    }
    public function cms_load_listimports( $page = 1){

        $config      = $this->cms_common->cms_pagination_custom();

        $total_imports = $this->db->from('import_stock')->where('import_del_temp', 0)->count_all_results();
        $config[ 'base_url' ]   = 'backend/import/cms_load_listimports';
        $config[ 'total_rows' ] = $total_imports;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );
        $_pagination_link = $this->pagination->create_links();


        $data['data']['_list_imports'] = $this->db->from('import_stock')->where('import_del_temp', 0)->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        $data['data']['_sl_imports'] = $total_imports;
        $data['data']['auth_name'] = $this->auth['display_name'];

        $data['_pagination_link'] = $_pagination_link;
        $this->load->view( 'backend/ajax/imports/list_imports', isset( $data ) ? $data : null );
    }
    public function cms_del_temp_import( $id ){
        $id = (int)$id;
        $import = $this->db->from('import_stock')->where('ID', $id)->get()->row_array();
        if( !empty( $import ) && count( $import ) ){
            $this->db->where('ID', $id)->update( 'import_stock', [ 'import_del_temp' => 1 ]);
            echo $this->messages = '1';
        }else{
            echo $this->messages;
        }
    }
    public function cms_edit_import(){
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $id = $this->input->post('id');
        $import = $this->db->from('import_stock')->where('ID', $id)->get()->row_array();
        $data['_list_products'] = array();

        if( isset($import) && count($import) ){
            $list_products = json_decode( $import['detail_import'], true);

            foreach( $list_products as $product ){
                $_product = $this->cms_finding_productbyID( $product['id'] );
                $_product['count'] = $product['count'];
                $data['_list_products'][] = $_product;
            }
        }

        $data['data']['_import'] = $import;
        $this->load->view( 'backend/ajax/imports/edit_import', isset( $data ) ? $data : null );
    }
    private function cms_finding_productbyID( $id ){
        $product = $this->db->select('ID,prd_name, prd_origin_price')->where('ID', $id)->from('products')->get()->row_array();
        return $product;
    }
}

