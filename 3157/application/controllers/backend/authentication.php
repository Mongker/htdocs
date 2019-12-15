<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// controller control user authentication
class Authentication extends CI_Controller {

    private $auth;

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }

    /* default login when acess manager system */
    public function index() {
        if ( $this->auth != null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Login - Quang Na - Phần mềm quản lý";

        if ( $this->input->post( 'login' ) ) {
            $_post                     = $this->input->post( 'data' );
            $data[ 'data' ][ '_post' ] = $_post;

            $this->form_validation->set_error_delimiters( '<li>', '</li>' );
            $this->form_validation->set_rules( 'data[username]', 'tên đăng nhập', 'trim|required|min_length[3]|max_length[100]|regex_match[/^([a-z0-9_@\.])+$/i]|callback__check_user' );
            $this->form_validation->set_rules( 'data[password]', 'mật khẩu', 'trim|required|min_length[6]|callback__check_password[' . $_post[ 'username' ] . ']' );
            if ( $this->form_validation->run() == true ) {
                $user = $this->db->select( 'username,password,salt' )->where( 'username', $_post[ 'username' ] )->or_where( 'email', $_post[ 'username' ] )->from( 'users' )->get()->row_array();
                CMS_Cookie::put( CMS_PREFIX . 'user_logged', CMS_Cookie::encode( json_encode( $user ) ), COOKIE_EXPIRY );
                CMS_Session::put('username', $user['username'] );
                $this->db->where( 'username', $user[ 'username' ] )->update( 'users', [ 'logined' => gmdate( "Y:m:d H:i:s", time() + 7 * 3600 ), 'ip_logged' => $_SERVER[ 'SERVER_ADDR' ] ] );
                $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
            }
        }
        $data[ 'template' ] = 'backend/auth/login';
        $this->load->view( 'backend/layout/auth', isset( $data ) ? $data : null );
    }

    public function _check_user( $username ) {

        $count = $this->db->where('user_status', 1)->where( 'username', $username )->or_where( 'email', $username )->from( 'users' )->count_all_results();
        if ( $count == 0 ) {
            $this->form_validation->set_message( '_check_user', 'Tài khoản đăng nhập không hợp lệ.' );//tự tạo câu lệnh xuất riêng vs hàm riêng
            return false;
        }

        return true;
    }

    public function _check_password( $password, $username ) {
        if ( $this->_check_user( $username ) == true ) {
            $user     = $this->db->select( 'username,password,salt' )->where( 'username', $username )->or_where( 'email', $username )->from( 'users' )->get()->row_array();
            $password = $this->cms_common_string->password_encode( $password, $user[ 'salt' ] );
            if ( $password != $user[ 'password' ] ) {
                $this->form_validation->set_message( '_check_password', 'Mật khẩu không chính xác.' );

                return false;
            }
        }

        return true;
    }

    /* Create Root account */
    public function root_create_account() {

        $data[ 'id' ]       = 0;
        $data[ 'username' ] = "Adminstrator";
        $data[ 'salt' ]     = $this->cms_common_string->random( 69 );
        $data[ 'password' ] = $this->cms_common_string->password_encode( 'Adminstrator', $data[ 'salt' ] );
        $data[ 'created' ]  = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        $data[ 'email' ]    = "frdevhero@gmail.com";
        $data[ 'display_name' ] = "Adminstrator";
        $data[ 'user_status' ] = 1;
        $data[ 'group_id' ] = 1;

        $this->db->insert( 'users', $data );

    }

    public function fg_password() {
        if ( $this->auth != null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Lấy lại mật khẩu - Quang Na - Phần mềm quản lý";

        if ( $this->input->post( 'forgot' ) ) {
            $_post                     = $this->input->post( 'data' );
            $data[ 'data' ][ '_post' ] = $_post;
            $this->form_validation->set_error_delimiters( '<span>', '</span>' );
            $this->form_validation->set_rules( 'data[email]', 'Email', 'trim|required|min_length[3]|max_length[150]|regex_match[/^([a-z0-9_@\.])+$/i]|callback__email' );
            if ( $this->form_validation->run() == true ) {

                $_post = $this->cms_common_string->allow_post( $_post, [ 'email' ] );
                $user  = $this->db->select( 'username,password,salt' )->where( 'email', $_post[ 'email' ] )->from( 'users' )->get()->row_array();
                if ( isset( $user ) && !empty( $user ) ) {

                    $dataup[ 'recode' ]        = $this->cms_common_string->random( 69, true );
                    $dataup[ 'code_time_out' ] = time() + 3600;
                    $html = "<div class='alert-container' style='background: #DDD; padding: 20px 0; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color:#464646;font-size: 14px;'>
                            <div class='alert' style='background: #fff; width: 80%; margin: 20px auto;'>
                                <div class='alert-heading' style='background: #0B87C9; color: #fff; padding: 15px 10px; font-size: 20px; font-family: tahoma,arial, sans-serif;'>
                                    Quang Na
                                </div>
                                <div class='alert-body' style='padding: 25px 20px;'>
                                    Quang Na xin chào,<br /><br />

                                    Bạn vừa yêu cầu lấy lại thông tin tài khoản!<br /><br />

                                    Xin hãy bấm vào liên kết để hoàn tất quá trình!<br /><br />
                                    <div class='link' style='margin: 0 auto; text-align: center;'>
                                     <a href='".CMS_BASE_URL . 'backend/authentication/reset/?email=' . urlencode( $_post[ 'email' ] )  . '&code=' . $dataup[ 'recode' ]."' style='display: inline-block; margin: 0 auto; padding: 10px 90px; background: #0B87C9; color: #fff; text-decoration: none; text-align: center; '>Lấy lại mật khẩu</a>
                                    </div>
                                    <br/><br/>
                                        Hoặc bạn có thể copy liên kết sau vào trình duyệt  ".CMS_BASE_URL . 'backend/authentication/reset/?email=' . base64_encode( urlencode( $_post[ 'email' ] ) ) . '&code=' . $dataup[ 'recode' ]."
                                    <br/><br/>
                                    Xin cám ơn!
                                </div>
                                <div class='alert-footer' style='padding: 25px 20px; border-top: 1px solid #ddd;' >
                                    Quangna.vn - 128 Nguyễn Trãi P. 17, Q. Gang Thép, Thái Nguyên. ĐT: 1900 2045
                                </div>
                            </div>
                          </div>";
                    $param = array( 'name' => 'Quang Na', 'from' => 'nguoihayhoiweb@gmail.com', 'password' => '0973870336', 'to' => $_post[ 'email' ], 'subject' => 'Lấy lại thông tin tài khoản - Quangna.vn', 'message' => $html );
                    if ( $this->cms_common->sentMail( $param ) ) {
                        $this->db->where( 'username', $user[ 'username' ] )->update( 'users', $dataup );
                        $this->cms_common_string->cms_redirect(  CMS_BASE_URL . 'backend/authentication/alert/?email=' . base64_encode( $_post[ 'email' ] ) . '' );
                    }

                }


            }
        }

        $data[ 'template' ] = 'backend/auth/fg_pass';
        $this->load->view( 'backend/layout/auth', isset( $data ) ? $data : null );
    }

    public function _email( $email ) {
        $count = $this->db->where( 'email', $email )->from( 'users' )->count_all_results();
        if ( $count == 0 ) {
            $this->form_validation->set_message( '_email', 'Email Không tồn tại.' );//tự tạo câu lệnh xuất riêng vs hàm riêng
            return false;
        }

        return true;
    }

    public function alert() {
        $data[ 'seo' ][ 'title' ] = "Lấy lại mật khẩu - Quang Na - Phần mềm quản lý";

        $data[ 'template' ] = 'backend/auth/alert';
        $this->load->view( 'backend/layout/auth', isset( $data ) ? $data : null );
    }
    /*
     * Reset password
     ****************************************************/
    public function reset() {
        if ( $this->auth != null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        $data[ 'seo' ][ 'title' ] = "Lấy lại mật khẩu - Quang Na - Phần mềm quản lý";

        $mail = urldecode( $this->input->get( 'email' ) );
        $code = $this->input->get( 'code' );

        if ( isset( $mail ) && !empty( $mail ) && isset( $mail ) && !empty( $code ) ) {
            $user = $this->db->select( 'username, recode, code_time_out' )->where( [ 'email' => $mail, 'recode' => $code ] )->from( 'users' )->get()->row_array();
            if ( !isset( $user ) || ( count( $user ) == 0 ) || $user[ 'code_time_out' ] <= time() ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend/authentication/n_link' );
            if ( $this->input->post( 'reset' ) ) {
                $_post                     = $this->input->post( 'data' );
                $data[ 'data' ][ '_post' ] = $_post;
                $this->form_validation->set_error_delimiters( '<li>', '</li>' );
                $this->form_validation->set_rules( 'data[email]', 'email', 'trim|required|min_length[3]|max_length[100]|regex_match[/^([a-z0-9_@\.])+$/i]' );
                $this->form_validation->set_rules( 'data[password]', 'mật khẩu', 'trim|required|min_length[6]' );
                if ( $this->form_validation->run() == true ) {
                    $_post                    = $this->cms_common_string->allow_post( $_post, [ 'email', 'password' ] );
                    $_post[ 'salt' ]          = $this->cms_common_string->random( 69, true );//tạo ra một chuỗi ngẫu nhiên
                    $_post[ 'password' ]      = $this->cms_common_string->password_encode( $_post[ 'password' ], $_post[ 'salt' ] );//mã hóa mật khẩu bằng cách nối chuỗi theo thứ tự định sẵn.
                    $_post[ 'updated' ]       = gmdate( "Y:m:d H:i:s", time() + 60 );
                    $_post[ 'recode' ]        = '';
                    $_post[ 'code_time_out' ] = '';
                    $this->db->where( 'username', $user[ 'username' ] )->update( 'users', $_post );
                    $this->cms_common_string->cms_jsredirect( 'Thay đổi tài khoản thành công!', CMS_BASE_URL . 'backend' );
                }
            }
        }
        $data[ 'template' ] = "backend/auth/reset";
        $this->load->view( 'backend/layout/auth', isset( $data ) ? $data : null );

    }
    /*
     * Alert link expired
     ****************************************************/
    public function n_link()
    {
        $data['seo']['title']='Thông báo - Quang Na - Phần mềm quany lý';

        $data[ 'template' ] = 'backend/auth/n_link';
        $this->load->view( 'backend/layout/auth', isset( $data ) ? $data : null );
    }

    public function logout() {

        if ( $this->auth == null ) $this->cms_common_string->cms_redirect( CMS_BASE_URL . 'backend' );
        CMS_Cookie::delete( CMS_PREFIX . 'user_logged' );
        $this->cms_common_string->cms_redirect( CMS_BASE_URL . '/backend' );

    }


}
