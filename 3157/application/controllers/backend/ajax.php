<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );


class Ajax extends CI_Controller {

    private $auth;
    private $messages = '0';

    public function __construct() {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();

    }


    public function cms_cruser() {
        $_post = [ 'display', 'mail', 'password', 'group', 'username','id_stock' ];

        foreach ( $_post as $item ) {
            $data[] = $this->input->post( $item );
        }
        $user[ 'display_name' ] = $data[ 0 ];
        $user[ 'username' ]     = $data[ 4 ];
        $user[ 'email' ]        = $data[ 1 ];
        $user[ 'group_id' ]     = $data[ 3 ];
        $user[ 'id_stock' ]     = $data[ 5 ];

        $user[ 'salt' ]         = $this->cms_common_string->random( 69 );
        $user[ 'password' ]     = $this->cms_common_string->password_encode( $data[ 2 ], $user[ 'salt' ] );
        $user[ 'created' ]      = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        if ( $this->_check_user( $user ) ) {
            $this->db->insert( 'users', $user );
            echo $this->messages = '1';
        }
        else {
            echo $this->messages = 'Mã nhân viên hoặc Email đã tồn tại!';
        }


    }

    public function cms_upuser() {
        $users = $this->db->select( 'users.id, username, email, display_name, user_status, group_name ' )->from( 'users' )->join( 'users_group', 'users_group.id = users.group_id' )->get()->result_array();
        if ( !empty( $users ) && count( $users ) != 0 ) {
            $ind  = 0;
            $html = '';
            foreach ( $users as $user ) {
                $ind++;
                $html .= "<tr class='tr-item-{$user['id']}'>";
                $html .= '<td class="text-center">' . $ind . '</td>';
                $html .= '<td>' . $user[ 'username' ] . '</td>';
                $html .= '<td>' . $user[ 'display_name' ] . '</td>';
                $html .= '<td>' . $user[ 'email' ] . '</td>';
                $html .= '<td>' . '<span class="user_group"><i class="fa fa-male"></i> ' . $user[ 'group_name' ] . '</span>' . '</td>';
                $html .= '<td class="text-center">' . cms_render_html( $user[ 'user_status' ], 'user_status', [ 'fa-unlock', 'fa-lock' ], [ 'Hoạt động', 'Tạm ngừng' ] ) . '</td>';
                $html .= '<td class="text-center"><i class="fa fa-pencil-square-o edit-item" title="Sửa" onclick="cms_edit_usitem(' . $user[ 'id' ] . ')" style="margin-right: 10px; cursor: pointer;"></i><i onclick="cms_del_usitem(' . $user[ 'id' ] . ')" title="Xóa" class="fa fa-trash-o delete-item" style="cursor: pointer;"></i></td>';
                $html .= '</tr>';

                $html .= "<tr class='edit-tr-item-{$user['id']}' style='display: none;'>";
                $html .= "<td class='text-center'>{$ind}</td>";
                $html .= "<td class='itmanv'><input type='text' class='form-control' value='{$user['username']}' disabled /></td>";
                $html .= "<td class='itdisplay_name'><input type='text' class='form-control' value='{$user['display_name']}' /></td>";
                $html .= "<td class='itemail'><input type='text' class='form-control' value='{$user['email']}'/></td>";
                $html .= "<td class='itgroup_name'><div class='group-user'><div class='group-selbox'></div></div></td>";
                $html .= "<td class='text-center ituser_status'><select name='' class='ituser_status'><option value='1'>Hoạt động</option><option value='0'>Tạm dừng</option></select></td>";
                $html .= "<td class='text-center'><i class='fa fa-floppy-o' title='Lưu' onclick='cms_save_item_user( {$user['id']} )' style='color: #EC971F; cursor: pointer; margin-right: 10px;'></i><i onclick='cms_undo_item( {$user['id']} )' title='Hủy' class='fa fa-undo' style='color: green; cursor: pointer; margin-right: 5px;'></i></td>";
                $html .= "</tr>";
            }
            echo $this->messages = $html;

        }
        else {
            echo $this->messages;
        }
    }

    private function _check_user( $user ) {

        $count = $this->db->where( 'username', $user[ 'username' ] )->or_where( 'email', $user[ 'email' ] )->from( 'users' )->count_all_results();
        if ( $count == 0 ) {
            return true;
        }

        return false;
    }

    public function cms_save_item_user() {
        $data = $this->input->post( 'data' );
        $id   = $data[ 'id' ];
        $user = $this->db->where( 'id', $data[ 'id' ] )->from( 'users' )->get()->row_array();
        if ( !isset( $user ) && count( $user ) == 0 ) {
            echo $this->messages;
        }
        else {
            if ( $data[ 'email' ] == $user[ 'email' ] ) {
                $data              = $this->cms_common_string->allow_post( $data, [ 'display_name', 'group_id', 'user_status' ] );
                $data[ 'updated' ] = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
                $this->db->where( 'id', $id )->update( 'users', $data );
                echo $this->messages = '1';
            }
            else {
                if ( $this->_check_mail( $data[ 'email' ] ) ) {
                    $data              = $this->cms_common_string->allow_post( $data, [ 'display_name', 'email', 'group_id', 'user_status' ] );
                    $data[ 'updated' ] = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
                    $this->db->where( 'id', $id )->update( 'users', $data );

                    echo $this->messages = '1';
                }
                else {
                    echo $this->messages = 'Email đã tồn tại!';
                }
            }
        }

    }

    private function _check_mail( $mail ) {

        $count = $this->db->where( 'email', $mail )->from( 'users' )->count_all_results();
        if ( $count == 0 ) {
            return true;
        }

        return false;
    }

    public function cms_del_usitem() {
        $id   = (int)$this->input->post( 'id' );
        $user = $this->db->where( 'id', $id )->from( 'users' )->get()->row_array();
        if ( !isset( $user ) || count( $user ) == 0 ) {
            echo $this->messages;
        }
        else {
            $this->db->where( [ 'id' => $id ] )->delete( 'users' );
            echo $this->messages = '1';
        }
    }

    /*
     * Tạo chức năng cho hệ thống
     /****************************************/
    public function cms_crfunc() {
        $url  = $this->input->post( 'url' );
        $name = $this->input->post( 'name' );

        $permisstion = $this->_check_url( $url );
        if ( empty( $permisstion ) && count( $permisstion ) == 0 ) {
            $data[ 'permission_url' ]  = $url;
            $data[ 'permission_name' ] = $name;
            $this->db->insert( 'permissions', $data );
            $this->messages = '1';

            echo $this->messages;
        }
        else {
            echo $this->messages = 'Chức năng <strong>' . $permisstion[ 'permission_name' ] . '</strong> đã tồn tại trong hệ thống.Vui lòng chọn url chức năng khác';
        }
    }

    private function _check_url( $url ) {
        $permistion = $this->db->where( 'permission_url', $url )->from( 'permissions' )->get()->row_array();
        if ( !empty( $permisstion ) && count( $permistion ) != 0 ) {
            return $permistion;
        }

        return $permistion;
    }

    /*
     * Load danh sách các chức năng của hệ thống
     /*************************************************/
    public function cms_upfunc() {
        $permissions = $this->db->select( 'id, permission_name' )->from( 'permissions' )->get()->result_array();
        if ( !empty( $permissions ) && count( $permissions ) != 0 ) {
            $ind  = 0;
            $html = '';
            foreach ( $permissions as $permission ) {
                $ind++;
                $html .= '<tr>';
                $html .= '<td class="text-center">' . $ind . '</td>';
                $html .= '<td>' . $permission[ 'permission_name' ] . '</td>';
                $html .= '<td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox" name="permission" value="' . $permission[ 'id' ] . '" class="checkbox chk"><span style="width: 15px; height: 15px;"></span></label></td>';
                $html .= '</tr>';
            }
            echo $this->messages = $html;

        }
        else {
            echo $this->messages;
        }

    }

    /*
     * Tạo nhóm người dùng
     /****************************************/
    public function cms_crgroup() {
        $group_name = $this->input->post( 'group_name' );
        $count      = $this->db->where( 'group_name', $group_name )->from( 'users_group' )->count_all_results();
        if ( $count == 0 ) {
            $data = [ 'group_name' => $group_name, 'group_registered' => gmdate( "Y:m:d H:i:s", time() + 7 * 3600 ) ];
            $this->db->insert( 'users_group', $data );
            echo $this->messages = '1';
        }
        else {
            echo $this->messages = 'Nhóm Chức năng '.$group_name.' đã tồn tại trong hệ thống.Vui lòng tạo tên nhóm khác.';
        }
    }

    /*
     * Load dánh sách nhóm người dùng
     /****************************************/
    public function cms_upgroup() {
        $groups = $this->db->select( 'id, group_name, group_registered' )->from( 'users_group' )->get()->result_array();
        if ( !empty( $groups ) && count( $groups ) != 0 ) {
            $ind  = 0;
            $html = '';
            foreach ( $groups as $group ) {
                $ind++;
                $date = ( $group[ 'group_registered' ] != '1970-01-01 07:00:00' ) ?
                    gmdate( "H:i d/m/Y", strtotime( str_replace( '-', '/', $group[ 'group_registered' ] ) ) + 7 * 3600 ) :
                    '-';
                $html .= "<tr class='tr-item-{$group['id']}'>";
                $html .= '<td class="text-center ind">' . $ind . '</td>';
                $html .= '<td>' . $group[ 'group_name' ] . '</td>';
                $html .= '<td>' . $date . '</td>';
                $html .= '<td class="text-center">' . cms_getEmployee( $group[ 'id' ] ) . '</td>';
                $html .= '<td class="text-center"><i class="fa fa-pencil-square-o edit-item" title="Sửa" onclick="cms_edit_gritem(' . $group[ 'id' ] . ')" style="margin-right: 10px; cursor: pointer;"></i><i onclick="cms_del_gritem(' . $group[ 'id' ] . ' )" title="Xóa" class="fa fa-trash-o delete-item" style="cursor: pointer;"></i></td>';
                $html .= '</tr>';

                $html .= "<tr class='edit-tr-item-{$group['id']}' style='display: none;'>";
                $html .= '<td class="text-center ind">' . $ind . '</td>';
                $html .= '<td class="itgr_name"> <input type="text" class="form-control" value="' . $group[ 'group_name' ] . '"/> </td>';
                $html .= '<td class="itgr_registered"><input type="text" class="form-control" value="' . $date . '" disabled/></td>';
                $html .= '<td class="itgr_nbuser text-center"><input type="text" class="form-control text-center" value="' . cms_getEmployee( $group[ 'id' ] ) . '" disabled/></td>';
                $html .= "<td class='text-center'><i class='fa fa-floppy-o' title='Lưu' onclick='cms_save_item_group( {$group['id']} )' style='color: #EC971F; cursor: pointer; margin-right: 10px;'></i><i onclick='cms_undo_item( {$group['id']} )' title='Hủy' class='fa fa-undo' style='color: green; cursor: pointer; margin-right: 5px;'></i></td>";
                $html .= '</tr>';
            }
            echo $this->messages = $html;

        }
        else {
            echo $this->messages;
        }

    }

    /*
     * Load danh sách người dùng theo radio button
    /*******************************************************/
    public function cms_radiogroup() {
        $groups = $this->db->select( 'id, group_name' )->from( 'users_group' )->get()->result_array();
        if ( isset( $groups ) && count( $groups ) ) {
            $html = '';
            foreach ( $groups as $group ) {
                $html .= '<input type="radio" name="group" value="' . $group[ 'id' ] . '" /> <span>' . $group[ 'group_name' ] . '</span> &nbsp;&nbsp;';
            }
            $html .= '<button style="color: green; font-size: 16px;" class="btn btn-default btn-sm create-group" data-toggle="modal" data-target="#create-group"><i class="fa fa-plus"></i></button>';
            echo $this->messages = $html;
        }
        else {
            echo $this->messages;
        }
    }

    public function cms_selboxgroup() {
        $groups = $this->db->select( 'id, group_name' )->from( 'users_group' )->get()->result_array();
        if ( isset( $groups ) && count( $groups ) ) {
            $html = '';
            $html .= '<select name="group" id="sel-group" class="form-control">';;
            foreach ( $groups as $group ) {
                $html .= '<option value="' . $group[ 'id' ] . '">' . $group[ 'group_name' ] . '</option>';
            }
            $html .= '</select>';
            echo $this->messages = $html;
        }
        else {
            echo $this->messages;
        }
    }
    public function cms_selboxstock() {
        $groups = $this->db->select( 'ID, stock_name' )->from( 'stocks' )->get()->result_array();
        if ( isset( $groups ) && count( $groups ) ) {
            $html = '';
            $html .= '<select name="stock" id="sel-stock" class="form-control">';;
            foreach ( $groups as $group ) {
                $html .= '<option value="' . $group[ 'ID' ] . '">' . $group[ 'stock_name' ] . '</option>';
            }
            $html .= '</select>';
            echo $this->messages = $html;
        }
        else {
            echo $this->messages;
        }
    }
    /*
     * Xóa nhóm người dùng
    /****************************************/
    public function cms_del_gritem() {
        $gid   = $this->input->post( 'id' );
        $gid   = (int)$gid;
        $group = $this->db->where( 'id', $gid )->from( 'users_group' )->get()->row_array();
        if ( !isset( $group ) || count( $group ) == 0 ) $this->cms_common_string->cms_jsredirect( 'Thao tác không thành công!', CMS_BASE_URL . 'backend/config' );
        $count = $this->db->from( 'users' )->where( 'group_id', $group[ 'id' ] )->count_all_results();
        if ( $count != 0 ) {
            echo $this->messages;
        }
        else {
            $this->db->where( [ 'id' => $gid ] )->delete( 'users_group' );
            echo $this->messages = '1';
        }

    }

    public function cms_save_item_group() {
        $gid        = (int)$this->input->post( 'gid' );
        $group_name = $this->input->post( 'group_name' );
        $group      = $this->db->where( 'id', $gid )->from( 'users_group' )->get()->row_array();
        if ( !isset( $group ) || empty( $group ) ) {
            echo $this->messages;
        }
        else {
            $count = $this->db->where( 'group_name', $group_name )->from( 'users_group' )->count_all_results();
            if ( $count == 0 ) {
                $data = [ 'group_name' => $group_name, 'group_updated' => gmdate( "Y:m:d H:i:s", time() + 7 * 3600 ) ];
                $this->db->where( 'id', $gid )->update( 'users_group', $data );
                echo $this->messages = '1';
            }
            else {
                echo $this->messages = "Nhóm người dùng $group_name đã tồn tại trong hệ thống.";
            }
        }

    }

    /*
     * Lưu chức năng cho nhóm người dùng của hệ thống
    /**********************************************************/
    public function cms_savefunc() {
        $re = $this->cms_authentication->allow( 'ajax/cms_savefunc', $this->auth[ 'group_permission' ] );

        $gid    = $this->input->post( 'gid' );
        $gid    = (int)$gid;
        $listid = $this->input->post( 'listid' );
        $group  = $this->db->where( 'id', $gid )->from( 'users_group' )->get()->row_array();
        if ( !isset( $group ) || count( $group ) == 0 ) {
            echo $this->messages;
            return;
        }

        $data = [ 'group_permission' => json_encode( $listid ), 'group_updated' => gmdate( "Y:m:d H:i:s", time() + 7 * 3600 ) ];
        $this->db->where( 'id', $gid )->update( 'users_group', $data );
        echo $this->messages = '1';
    }

    /*
     * CUSTOMER
    /***********************/
    public function cms_crcustomer() {
        $data = $this->input->post( 'data' );

        $data                        = $this->cms_common_string->allow_post( $data, [ 'customer_name', 'customer_phone', 'customer_email', 'customer_addr', 'notes', 'customer_birthday', 'customer_gender' ] );
        $data[ 'customer_birthday' ] = gmdate( "Y-m-d H:i:s", strtotime( str_replace( '/', '-', $data[ 'customer_birthday' ] ) ) + 7 * 3600 );
        $data[ 'created' ]           = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        $data[ 'user_init' ]         = $this->auth[ 'id' ];
        $this->db->insert( 'customers', $data );
        $this->messages = $this->db->insert_id();
        echo $this->messages;
    }

    public function cms_upcustomer() {
        $customers = $this->db->select('ID,customer_name,customer_phone,customer_addr')->from( 'customers' )->get()->result_array();
        if ( !empty( $customers ) && count( $customers ) != 0 ) {
            ob_start();
            foreach ( $customers as $customer ) : ?>
                <tr>
                    <td class="text-center"><?php echo $customer[ 'ID' ]; ?></td>
                    <td class="text-center"><?php echo $customer[ 'customer_name' ]; ?></td>
                    <td class="text-center"><?php echo ( !empty( $customer[ 'customer_phone' ] ) ) ?
                            $customer[ 'customer_phone' ] : '-'; ?></td>
                    <td class="text-center"><?php echo ( !empty( $customer[ 'customer_addr' ] ) ) ?
                            $customer[ 'customer_addr' ] : '-'; ?></td>
                    <td class="text-center"><?php echo ( !empty( $customer[ 'customer_addr' ] ) ) ?
                            $customer[ 'customer_addr' ] : '-'; ?></td>
                    <td class="text-right"
                        style="font-weight: bold; background-color: #f9f9f9;"><?php echo $customer[ 'ID' ]; ?></td>
                    <td class="text-right"><?php echo $customer[ 'ID' ]; ?></td>
                    <td class="text-center"><i class="fa fa-trash-o" style="cursor:pointer;"
                                               onclick="cms_delCustomer(<?php echo $customer[ 'ID' ]; ?>);"></i></td>
                </tr>
            <?php endforeach;
            $html = ob_get_contents();
            ob_end_clean();

            echo $this->messages = $html;

        }
        else {
            echo $this->messages;
        }
    }


    public function cms_delCustomer() {
        $id       = (int)$this->input->post( 'id' );
        $customer = $this->db->from( 'customers' )->where( 'ID', $id )->get()->row_array();
        if ( !isset( $customer ) && count( $customer ) == 0 ) {
            echo $this->messages;

            return;
        }
        else {
            $this->db->where( 'ID', $id )->delete( 'customers' );
            echo $this->messages = '1';
        }
    }

    public function cms_edit_customer(){
        $id = (int)$this->input->post( 'id' );
        $customer = $this->db->from( 'customers' )->where( 'id', $id )->get()->row_array();
        if( !isset($customer) && count( $customer ) == 0 ){
            echo $this->messages;
            return;
        }else{
            ob_start();

            $html = ob_get_contents();
            ob_end_clean();

        }
    }
    public function cms_detail_itemcust( $id ){
        $id = (int)$id;
        $customer = $this->db->from( 'customers' )->where( 'id', $id )->get()->row_array();
        if( !isset($customer) && count( $customer ) == 0 ){
            echo $this->messages;
            return;
        }else{
            $data['_list_customer'] = $customer;
            $data['_list_customer']['customer_birthday'] = ($customer['customer_birthday'] != '1970-01-01 07:00:00')?gmdate("d/m/Y", strtotime(str_replace('-','/',$customer['customer_birthday'])) + 7*3600):'';
            $this->load->view( 'backend/ajax/customer-manfacture/detail_customer', isset( $data ) ? $data : null );
        }
    }

    public function cms_save_edit_customer( $id ){
        $id = (int)$id;
        $data = $this->input->post( 'data' );
        $data                        = $this->cms_common_string->allow_post( $data, [ 'customer_name', 'customer_phone', 'customer_email', 'customer_addr', 'notes', 'customer_birthday', 'customer_gender' ] );
        $data[ 'customer_birthday' ] = gmdate( "Y-m-d H:i:s", strtotime( str_replace( '/', '-', $data[ 'customer_birthday' ] ) ) + 7 * 3600 );
        $data[ 'updated' ]           = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        $data[ 'user_upd' ]         = $this->auth[ 'id' ];
        $this->db->where('ID', $id )->update( 'customers', $data );
        echo $this->messages = '1';


    }

    public function cms_crManuf() {
        $data                = $this->input->post( 'data' );
        $data                = $this->cms_common_string->allow_post( $data, [ 'manuf_name', 'manuf_phone', 'manuf_email', 'manuf_addr', 'tax_code', 'notes' ] );
        $data[ 'created' ]   = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        $data[ 'user_init' ] = $this->auth[ 'id' ];

        $this->db->insert( 'manufactures', $data );
        echo $this->messages = '1';


    }

    public function cms_upManuf( $page = 1 ) {

        $config      = $this->cms_common->cms_pagination_custom();
        $keyword = $this->input->post('keyword');
        if( !empty($keyword) ){
            $total_manuf = $this->db->from( 'manufactures' )->like( 'manuf_name', $keyword  )->or_like( 'ID', substr( $keyword, 6) )->or_like( 'manuf_phone', $keyword )->count_all_results();
        }else{
            $total_manuf =$this->db->from( 'manufactures' )->count_all_results();
        }


        $config[ 'base_url' ]   = 'backend/ajax/cms_upManuf';
        $config[ 'total_rows' ] = $total_manuf;
        $config[ 'per_page' ]   = 10;
        $this->pagination->initialize( $config );
        $_pagination_link = $this->pagination->create_links();

        if( !empty( $keyword ) ) {
            $manufs = $this->db->select('ID,manuf_phone,manuf_addr,manuf_name')->from( 'manufactures' )->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->like( 'manuf_name', $keyword  )->or_like( 'ID', substr( $keyword, 6) )->or_like( 'manuf_phone', $keyword )->order_by( 'created', 'desc' )->get()->result_array();
        }else{
            $manufs = $this->db->select('ID,manuf_phone,manuf_addr,manuf_name')->from( 'manufactures' )->limit( $config[ 'per_page' ], ( $page - 1 ) * $config[ 'per_page' ] )->order_by( 'created', 'desc' )->get()->result_array();
        }


        ob_start(); ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Mã NCC</th>
                <th class="text-center">Tên NCC</th>
                <th class="text-center">Điện thoại</th>
                <th class="text-center">Địa chỉ</th>
                <th class="text-center">Lần cuối mua hàng</th>
                <th class="text-center" style="background-color: #fff;">Tổng tiền hàng</th>
                <th class="text-center">Nợ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if ( !empty( $manufs ) && count( $manufs ) ) :
                foreach ( $manufs as $key => $item ) : ?>

                    <tr>
                        <td class="text-center"  onclick="cms_detail_manufacture(<?php echo $item[ 'ID' ]; ?>)" style="cursor: pointer; color: #1b6aaa;"><?php echo 'NKH000' . $item[ 'ID' ]; ?></td>
                        <td class="text-center"  onclick="cms_detail_manufacture(<?php echo $item[ 'ID' ]; ?>)" style="cursor: pointer; color: #1b6aaa;"><?php echo $item[ 'manuf_name' ]; ?></td>
                        <td class="text-center"><?php echo ( !empty( $item[ 'manuf_phone' ] ) ) ?
                                $item[ 'manuf_phone' ] : '-'; ?></td>
                        <td class="text-left"><?php echo ( !empty( $item[ 'manuf_addr' ] ) ) ? $item[ 'manuf_addr' ] :
                                '-'; ?></td>
                        <td class="text-center">-</td>
                        <td class="text-right"
                            style="font-weight: bold; background-color: #f9f9f9;">0</td>
                        <td class="text-right">0</td>
                        <td class="text-center"><i class="fa fa-trash-o" style="cursor:pointer;"
                                                   onclick="cms_delManuf(<?php echo $item[ 'ID' ]; ?>);"></i></td>
                    </tr>
                <?php endforeach;
            else : ?>
                <tr>
                    <td colspan="8" class="text-center">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="alert alert-info summany-info clearfix" role="alert">
            <div class="sm-info pull-left padd-0">Số NCC: <span><?php echo $total_manuf; ?></span> Tổng tiền: <span>0 đ</span> Tổng nợ:
                <span>0 đ</span></div>
            <div class="pull-right ajax-pagination">
                <?php echo $_pagination_link; ?>
            </div>
        </div>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        echo $this->messages = $html;
    }

    public function cms_delManuf(){
        $id = (int)$this->input->post( 'id' );

        $manuf = $this->db->from( 'manufactures' )->where( 'id', $id )->get()->row_array();
        if ( !isset( $manuf ) && count( $manuf ) == 0 ) {
            echo $this->messages;

            return;
        }
        else {
            $this->db->where( 'ID', $id )->delete( 'manufactures' );
            echo $this->messages = '1';
        }
    }

    public function cms_detail_manufacture( $id ){
        $id = (int)$id;
        $manuf = $this->db->from( 'manufactures' )->where( 'id', $id )->get()->row_array();
        if( !isset($manuf) && count( $manuf ) == 0 ){
            echo $this->messages;
            return;
        }else{
            $data['_list_manuf'] = $manuf;
            $this->load->view( 'backend/ajax/customer-manfacture/detail_manuf', isset( $data ) ? $data : null );
        }
    }

    public function cms_save_edit_manuf( $id ){
        $id = (int)$id;
        $data = $this->input->post( 'data' );
        $data                        = $this->cms_common_string->allow_post( $data, [ 'manuf_name', 'manuf_phone', 'manuf_email', 'manuf_addr', 'notes', 'tax_code' ] );
        $data[ 'updated' ]           = gmdate( "Y:m:d H:i:s", time() + 7 * 3600 );
        $data[ 'user_upd' ]         = $this->auth[ 'id' ];
        $this->db->where('ID', $id )->update( 'manufactures', $data );
        echo $this->messages = '1';

    }

}

