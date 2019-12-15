<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Customer extends CI_Controller {

    private $auth;

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }


    public function index( $page = 1 ) {
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Phần mềm quản lý";
        $config = $this->cms_common->cms_pagination_custom();
        $total_customer = $this->db->from('customers')->count_all_results();

        $config['base_url'] = 'backend/customer/index';
        $config['total_rows'] = $total_customer;
        $config['per_page'] = 10;

        $this->pagination->initialize( $config );

        $data['data']['_pagination_link'] = $this->pagination->create_links();
        $data['data']['_list_customer'] = $this->db->from('customers')->limit( $config['per_page'], ( $page - 1 ) * $config['per_page'] )->order_by('created','desc')->get()->result_array();
        $data['data']['user'] = $this->auth;
        $data['data']['_total_customer'] = $total_customer;
        $data[ 'template' ] = 'backend/customer/index';
        $this->load->view( 'backend/layout/index', isset( $data ) ? $data : null );
    }

}
