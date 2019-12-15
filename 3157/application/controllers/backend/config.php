<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );


class Config extends CI_Controller {

    private $auth;

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }

    /*
     * Cấu hình hệ thống
    /****************************************/
    public function index() {
        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Phần mềm quản lý";
        $user = $this->db->select( 'users.id, username, email, display_name, user_status, group_name ' )->from( 'users' )->join( 'users_group', 'users_group.id = users.group_id' )->get()->result_array();

        $data['data']['_user'] = $user;
        $data['data']['user'] = $this->auth;
        $data[ 'template' ] = 'backend/setting/setting';
        $this->load->view( 'backend/layout/index', isset( $data ) ? $data : null );
    }

}
