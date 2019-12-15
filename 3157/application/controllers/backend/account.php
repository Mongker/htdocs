<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// controller control user authentication
class Account extends CI_Controller {

    private $auth;

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }

    /* default login when acess manager system */
    public function index() {

        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Quang Na - Phần mềm quản lý";
        if( $this->input->post( 'change' ) ){
            $_post                     = $this->input->post( 'data' );
            $data[ 'data' ][ '_post' ] = $_post;
            $this->form_validation->set_error_delimiters( '<p>', '</p>' );
            $this->form_validation->set_rules( 'data[password]', 'mật khẩu', 'trim|required|min_length[6]|callback__check_password['.$this->auth['username'].']' );
            $this->form_validation->set_rules( 'data[newpassw]', 'mật khẩu mới', 'trim|required|min_length[6]' );
            if ( $this->form_validation->run() == true ) {
                $_post                    = $this->cms_common_string->allow_post( $_post, [ 'password', 'newpassw' ] );
                $_post[ 'salt' ]          = $this->cms_common_string->random( 69, true );
                $_post[ 'password' ]      = $this->cms_common_string->password_encode( $_post[ 'newpassw' ], $_post[ 'salt' ] );
                $_post[ 'updated' ]       = gmdate( "Y:m:d H:i:s", time() + 60 );
                unset( $_post['newpassw']);
                $this->db->where( 'username', $this->auth[ 'username' ] )->update( 'users', $_post );
                $this->cms_common_string->cms_jsredirect( 'Thay đổi Mật khẩu thành công!', CMS_BASE_URL . 'backend/account' );
            }
        }
        $data['data']['user'] = $this->auth;
        $data[ 'template' ] = 'backend/account/info';
        $this->load->view( 'backend/layout/index', isset( $data ) ? $data : null );
    }

    public function _check_password( $password, $username ) {
        $user     = $this->db->select( 'username,password,salt' )->where( 'username', $username )->or_where( 'email', $username )->from( 'users' )->get()->row_array();
        $password = $this->cms_common_string->password_encode( $password, $user[ 'salt' ] );
        if ( $password != $user[ 'password' ] ) {
            $this->form_validation->set_message( '_check_password', 'Mật khẩu hiện tại không chính xác.' );

            return false;
        }

        return true;
    }

}
