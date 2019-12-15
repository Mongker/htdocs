<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CMS_authentication {

    private $CI;
    private $_permissID;
    private $_messages;

    public function __construct(){
        $this->CI = & get_instance();
    }

    public function check() {
        if ( CMS_Cookie::exists( CMS_PREFIX . 'user_logged' ) ) {
            $cookie = CMS_Cookie::get( CMS_PREFIX . 'user_logged' );
            $cookie = json_decode( CMS_Cookie::decode( $cookie ), true );
            $user   = $this->CI->db->select( 'id,username,password,salt,display_name,email,group_id,id_stock' )->where( 'username', $cookie[ 'username' ] )->or_where( 'email', $cookie[ 'username' ] )->from( 'users' )->get()->row_array();
            $group = $this->CI->db->select( 'id, group_permission, group_name' )->where( 'id', $user['group_id'] )->from('users_group')->get()->row_array();
            if ( isset( $user ) && count( $user ) ) {
                if ( $user[ 'username' ] == $cookie[ 'username' ] && $user[ 'password' ] == $cookie[ 'password' ] && $user[ 'salt' ] == $cookie[ 'salt' ] ) {
                    $data = [ 'username' => $user[ 'username' ], 'password' => $user[ 'password' ], 'salt' => $user[ 'salt' ] ];
                    CMS_Cookie::put( CMS_PREFIX . 'user_logged', CMS_Cookie::encode( json_encode( $data ) ), COOKIE_EXPIRY );

                    return [ 'id' => $user[ 'id' ],
                        'username' => $user[ 'username' ],
                        'password' => $user[ 'password' ],
                        'salt' => $user[ 'salt' ],
                        'email' => $user[ 'email' ],
                        'display_name' => $user[ 'display_name' ],
                        'group_id' => $user[ 'group_id' ],
                        'group_name'  => $group['group_name'],
                        'group_permission' => json_decode( $group['group_permission'], true ),
                        'id_stock' => $user[ 'id_stock' ]
                    ];
                }
            }
        }

        return null;
    }

    public function allow( $url ,$group_per ){
        if( $this->findID( $url ) ){
        if( !in_array( $this->_permissID , $group_per ) ){
                $url_sli = explode( '/', $url );
                if( $url_sli[0]  === 'ajax' ){
                    return 'permission';
                }else{
                    $this->CI->cms_common_string->cms_jsredirect( 'Bạn không thể thực hiện chức năng này!', CMS_BASE_URL . 'backend');
                }
            }
        }
    }

    private function findID( $url ) {
        $permiss = $this->CI->db->select( 'id' )->where( 'permission_url', $url )->from( 'permissions' )->get()->row_array();
        if ( isset( $permiss ) && count( $permiss ) ) {
           $this->_permissID = $permiss['id'];
           return true;
        }

        return false;
    }
}