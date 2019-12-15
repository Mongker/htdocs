/**
 * Created by PvTam on 01/20/2016.
 */
$(document).ready( function () {
    "use strict";

    $('body').on('click', function(){
        cms_load_infor_order();
    });
    //Search option product


    //end

    cms_loadListOption();

    cms_func_common();


    cms_detail_item();
    cms_upManuf();
    cms_del_pro_order();



    if(window.location.pathname == '/cmsquangna/backend/product'){
        cms_load_listProduct();
        cms_sls_prd_group();
        cms_upprdCategory();
        cms_upprdGroup();
        cms_loadListproOption1();
        cms_loadListproOption2();
        cms_loadListproOption3();
    }
    if(window.location.pathname == '/cmsquangna/backend/order'){
        cms_load_listorders();
    }
    if(window.location.pathname == '/cmsquangna/backend/import'){
        cms_load_listimports();
    }
    if(window.location.pathname == '/cmsquangna/backend/inventory'){
        cms_load_listInventory();
    }
    if(window.location.pathname == '/cmsquangna/backend/config'){
        cms_crfunc();
        cms_upfunc();
        cms_crgroup();
        cms_radiogroup();
        cms_selboxgroup();
        cms_selboxstock();
    }
    if(window.location.pathname == '/cmsquangna/backend/customer'){

    }

    cms_ajax_pagination( 'manuf' );
    cms_ajax_pagination( 'prd_category' );
    cms_ajax_pagination( 'prd_group' );
    cms_ajax_pagination( 'product-main' );
    cms_search_box_products();
    cms_search_box_products2();
    cms_search_box_customer();
    cms_search_box_manuf();


});

/*
 * Chức năng chung
 /****************************************/
function cms_func_common() {

    $('.btn-close').on('click', function () {
        $('.ajax-error-ct').hide();
    });

}
/*
 * Process ajax request
 *
 * $param là một object {'type','url', 'data', 'callback'}
 *
 * default type POST
 /*********************************************************************/
function cms_adapter_ajax($param) {
    $.ajax({
        url: $param.url,
        type: $param.type,
        data: $param.data,
        async: true,
        success: $param.callback
    });
}

function cms_ajax_pagination( $module ){
    $('body').on( 'click', 'div.ajax-pagination ul.pagination li a', function( event ){
        event.preventDefault();
        $href = $(this).attr( 'href' );

        var $keyword = $('.txt-s'+ $module).val();
        var $data = null;
        if( $keyword != '' ){
            $data = { 'keyword' : $keyword };
        }
        var $url = $href;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
                $('.'+ $module +'-body').html( data );
            }
        };
        cms_adapter_ajax($param);

    });
}
/*
 * Tạo nhân viên
 /****************************************/
function cms_cruser() {
    "use strict";

    var $display = $.trim($('#frm-cruser #display_name').val());
    var $username = $.trim($('#frm-cruser #manv').val());
    var $mail = $.trim($('#frm-cruser #mail').val());
    var $password = $.trim($('#frm-cruser #password').val());
    var $group = $('#frm-cruser .group-user .group-selbox #sel-group').val();
    var $stock = $('#frm-cruser .stock-selbox #sel-stock').val();
    $('#frm-cruser .group-user .group-selbox #sel-group').on('change', function () {
        $group = $(this).val();
    });
    if ($display.length == 0) {
        $('.error-display_name').text('Vui lòng nhập tên hiển thị!');
    } else {
        $('.error-display_name').text('');
    }
    if ($username.length == 0) {
        $('.error-manv').text('Vui lòng nhập email!');
    } else {
        $('.error-manv').text('');
    }
    if ($mail.length == 0) {
        $('.error-mail').text('Vui lòng nhập email!');
    } else {
        $('.error-mail').text('');
    }
    if ($password.length == 0) {
        $('.error-password').text('Vui lòng nhập mật khẩu!');
    } else {
        $('.error-password').text('');
    }

    if ($display && $mail && $password && $group && $username) {

        var $data = {'display': $display, 'username': $username, 'mail': $mail, 'group': $group, 'password': $password, 'id_stock': $stock};
        var $url = 'backend/ajax/cms_cruser';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
                if (data != '1') {
                    $('.ajax-error-ct').html(data).parent().fadeIn().delay(1500).fadeOut('slow');
                } else {
                    $('.btn-close').trigger('click');

                    $('.ajax-error-ct').hide();
                    cms_upuser();
                    $('.ajax-success-ct').html('Thêm thành viên mới thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_upuser() {
    var $url = 'backend/ajax/cms_upuser';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if (data != '0') {
                $('#user .table-user tbody').html(data);
            } else {
                var $html = '<tr><td colspan="7" class="text-center">Không có người dùng để hiển thị</td> </tr>';
                $('#user.table-user tbody').html($html);
            }
        }
    };
    cms_adapter_ajax($param);
}
/*
 * Lưu nhân viên
 /***************************/
function cms_save_item_user(id) {

    var $display_name = $('#user .table-user tr.edit-tr-item-' + id + ' td.itdisplay_name input').val();
    var $mail = $('#user .table-user tr.edit-tr-item-' + id + ' td.itemail input').val();
    var $group = $('#user .table-user tr.edit-tr-item-' + id + ' td.itgroup_name #sel-group').val();
    var $status = $('#user .table-user tr.edit-tr-item-' + id + ' td.ituser_status .ituser_status').val();

    var $data = {
        'data': {
            'id': id,
            'display_name': $display_name,
            'email': $mail,
            'group_id': $group,
            'user_status': $status
        }
    };
    var $url = 'backend/ajax/cms_save_item_user';

    var $param = {
        'type': 'POST',
        'url': $url,
        'data': $data,
        'callback': function (data) {
            if (data == '1') {
                cms_upuser();
                cms_upgroup();
            } else if (data == '0') {
                alert('Lưu không thành công!');
            } else {
                $('.ajax-error-ct').html(data).parent().fadeIn().delay(1500).fadeOut('slow');
            }
        }
    };
    cms_adapter_ajax($param);


}
/*
 * Xóa nhân viên
 /***************************/
function cms_del_usitem($id) {
    var conf = confirm('Bạn chắc chắn muốn xóa!');
    if (conf) {
        var $url = 'backend/ajax/cms_del_usitem';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'id': $id},
            'callback': function (data) {
                if (data != '0') {
                    cms_upuser();
                    $('.ajax-success-ct').html('Xóa thành viên thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                } else {
                    alert('Không thể xóa nhân viên!');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
/*
 * Tạo chức năng
 /****************************************/
function cms_crfunc() {
    "use strict";
    $('.btn-crfunc').on('click', function (e) {
        e.preventDefault();
        var $permiss_url = $.trim($('#permisstion_url').val());
        var $permiss_name = $.trim($('#permisstion_name').val());

        if ($permiss_url.length == 0) {
            $('.error-permisstion_url').text('Vui lòng nhập url');
        } else {
            $('.error-permisstion_url').text('');
        }
        if ($permiss_name.length == 0) {
            $('.error-permisstion_name').text('Vui lòng nhập tên chức năng');
        } else {
            $('.error-permisstion_name').text('');
        }
        if ($permiss_url && $permiss_name) {
            var $url = 'backend/ajax/cms_crfunc';
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': {'url': $permiss_url, 'name': $permiss_name},
                'callback': function (data) {
                    if (data != '1') {
                        $('.ajax-error-ct').html(data).parent().fadeIn().delay(1500).fadeOut('slow');
                    } else {
                        $('.btn-close').trigger('click');
                        $('.ajax-error-ct').hide();
                        cms_upfunc();
                    }
                }
            };
            cms_adapter_ajax($param);
        }
    });
}
/*
 * Danh sách chức năng
 /****************************************/
function cms_upfunc() {
    "use strict";
    var $url = 'backend/ajax/cms_upfunc';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if (data != '0') {
                $('#functions .table-function tbody').html(data);
            } else {
                var $html = '<tr><td colspan="3" class="text-center">Không có chức năng để hiển thị</td> </tr>';
                $('#functions .table-function tbody').html($html);
            }
        }
    };
    cms_adapter_ajax($param);

}
/*
 * Thêm nhóm người dùng
 /****************************************/
function cms_crgroup() {
    "use strict";
    $('.btn-crgroup').on('click', function (e) {
        e.preventDefault();
        var $group_name = $.trim($('#group-name').val());

        if ($group_name.length == 0) {
            $('.error-group_name').text('Vui lòng nhập tên nhóm người dùng');
        } else {
            $('.error-group_name').text('');
        }
        if ($group_name) {
            var $url = 'backend/ajax/cms_crgroup';
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': {'group_name': $group_name},
                'callback': function (data) {
                    if (data != '1') {
                        $('.ajax-error-ct').html('Nhóm người dùng đã tồn tại hoặc không đúng!').parent().fadeIn().delay(1500).fadeOut('slow');
                    } else {
                        $('.btn-close').trigger('click');
                        cms_upgroup();
                        cms_radiogroup();
                        $('.ajax-success-ct').html('Bạn đã tạo mới Nhóm người dùng thành công!').parent().fadeIn().delay(1500).fadeOut('slow');

                    }
                }
            };
            cms_adapter_ajax($param);
        }
    });
}
/*
 * Danh sách Nhóm
 /****************************************/
function cms_upgroup() {
    "use strict";
    var $url = 'backend/ajax/cms_upgroup';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if (data != '0') {
                $('#functions .table-group tbody').html(data);
            } else {
                var $html = '<tr><td colspan="3" class="text-center">Không có Group để hiển thị</td> </tr>';
                $('#functions .table-group tbody').html($html);
            }
        }
    };
    cms_adapter_ajax($param);

}

/*
 * Load list group
 /****************************************/
function cms_radiogroup() {
    "use strict";
    var $url = 'backend/ajax/cms_radiogroup';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if (data != '0') {
                $('#functions .group-user .group-radio').html(data);
            } else {
                var $html = ' <button style="color: green; font-size: 16px;" class="btn btn-default btn-sm create-group" data-toggle="modal" data-target="#create-group"><i class="fa fa-plus"></i></button>';
                $('#functions .group-user .group-radio').html($html);
            }
        }
    };
    cms_adapter_ajax($param);
}
function cms_selboxgroup() {
    "use strict";
    var $url = 'backend/ajax/cms_selboxgroup';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if (data != '0') {
                $('.group-user .group-selbox').html(data);
                cms_upgroup();
            } else {
                $('.group-user .group-selbox').html($html);
            }
        }
    };
    cms_adapter_ajax($param);
}
/*
 * Xóa Group
 /***********/
function cms_del_gritem($id) {
    "use strict";
    var conf = confirm('Bạn chắc chắn muốn xóa!');
    if (conf) {
        var $url = 'backend/ajax/cms_del_gritem';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'id': $id},
            'callback': function (data) {
                if (data != '0') {
                    cms_upgroup();
                    cms_radiogroup();
                } else {
                    alert('Không thể xóa nhóm khi đang có nhân viên trong nhóm!');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
/*
 * Lưu quyền cho group
 /***************************/
function cms_savefunc() {
    "use strict";
    var $group_id = $('div.group-user .group-radio input:checked').val();
    if (!$group_id) {
        $('.ajax-error-ct').html('Vui lòng chọn nhóm người sử dụng trước khi thực hiện lưu quyền!').parent().fadeIn().delay(1500).fadeOut('slow');
        return;
    }
    var $chkval = [];
    $('.chk:checked').each(function () {
        $chkval.push($(this).val());
    });
    var $url = 'backend/ajax/cms_savefunc';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': {'gid': $group_id, 'listid': $chkval},
        'callback': function (data) {
            if (data == '1') {
                $('.ajax-success-ct').html('Lưu chức năng cho nhóm thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
            } else if (data == '0') {
                $('.ajax-error-ct').html('Thực hiện không thành công do Nhóm không tồn tại!').parent().fadeIn().delay(1500).fadeOut('slow');
            } else {
                $('.ajax-error-ct').html('Lỗi hệ thống vui lòng liên hệ nhà cung cấp phần mềm!').parent().fadeIn().delay(1500).fadeOut('slow');
            }
        }
    };
    cms_adapter_ajax($param);

}
function cms_save_item_group($id) {
    "use strict";
    var $group_name = $('.table-group tr.edit-tr-item-' + $id + ' td.itgr_name input').val();
    if ($group_name.length == 0) {
        alert('Tên nhóm người dùng không được bỏ trống!');
    } else {
        var $data = {'gid': $id, 'group_name': $group_name};
        var $url = 'backend/ajax/cms_save_item_group';

        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
                if (data == '1') {
                    cms_upgroup();
                } else if (data == '0') {
                    $('.ajax-error-ct').html('Thực hiện không thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                } else {
                    $('.ajax-error-ct').html(data).parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }

}

/*
 * CUSTOMER
 /***************************/
function cms_crCustomer() {
    "use strict";
    var $name = $.trim($('#customer_name').val());
    var $phone = $.trim($('#customer_phone').val());
    var $mail = $.trim($('#customer_email').val());
    var $address = $('#customer_addr').val();
    var $notes = $('#customer_notes').val();
    var $birthday = $('#customer_birthday').val();
    var $gender = 0;
    $('.customer_gender').each( function( index ){
        if( $(this).prop( 'checked') == true ){
            $gender = $(this).val();
        }
    });

    if ($name.length == 0) {
        $('.error-customer_name').text('Vui lòng nhập tên khách hàng.');
    } else {
        $('.error-group_name').text('');
        if( $phone.length != 0 ){
            if (!$.isNumeric($phone)) {
                $('.error-customer_phone').text('Số điện thoại phải là số.');
                return;
            } else {
                $('.error-customer_phone').text('');
            }
        }
        var $data = {
            'data': {
                'customer_name': $name,
                'customer_phone': $phone,
                'customer_email': $mail,
                'customer_addr': $address,
                'notes': $notes,
                'customer_birthday': $birthday,
                'customer_gender': $gender
            }
        };
        var $url = 'backend/ajax/cms_crcustomer';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
                if( data != '0' ){
                    $('.btn-close').trigger('click');
                    $('.ajax-error-ct').hide();
                    $('.ajax-success-ct').html('Bạn đã tạo mới khách hàng thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                    $("#search-box-cys").prop('readonly', true).attr('data-id',data).val($name);
                    $(".del-cys").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_upCustomer() {
    'use strict';
    var $url = 'backend/ajax/cms_upCustomer';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if( data != '0' ){
                $('tbody.ajax-loadlist-customer').html( data );
            }else{
                $('tbody.ajax-loadlist-customer').html('<tr><td colspan="8" class="text-center">Không có dữ liệu</td> </tr>');
            }
        }
    };
    cms_adapter_ajax($param);
}

function cms_delCustomer( $id ){
    'use strict';
    var conf = confirm('Bạn chắc chắn muốn xóa khách hàng này!');
    if (conf) {
        var $url = 'backend/ajax/cms_delCustomer';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'id': $id},
            'callback': function (data) {
                if (data == '0') {
                    $('.ajax-error-ct').html('Lỗi! không thể xóa Khách hàng').parent().fadeIn().delay(1500).fadeOut('slow');

                } else {
                    $('.ajax-success-ct').html('Bạn đã xóa khách hàng thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                    cms_javascript_redirect( 'http://localhost/cmsquangna/backend/customer/index');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}

function cms_save_edit_customer(){
    'use strict';
    var $ids = $('.tr-item-customer').attr('id');
    var $id = parseInt( $ids.replace ( /[^\d.]/g, '' ) );

    var $name = $.trim( $('.customer-manufacture #customer_name').val() );
    var $phone = $.trim($('.customer-manufacture #customer_phone').val());
    var $mail = $.trim($('.customer-manufacture #customer_email').val());
    var $address = $('.customer-manufacture #customer_addr').val();
    var $notes = $('.customer-manufacture #notes').val();
    var $birthday = $('.customer-manufacture #customer_birthday').val();
    var $gender = 0;
    $('.customer-manufacture .customer_gender').each( function( index ){
        if( $(this).prop( 'checked') == true ){
            $gender = $(this).val();
        }
    });
    if ($name.length == 0) {
        $('.error-customer_name').text('Tên khách hàng không được để trống.');
    } else {
        $('.error-customer_name').text('');
        if( $phone.length != 0 ){
            if (!$.isNumeric($phone)) {
                $('.error-customer_phone').text('Số điện thoại phải là số.');
                return;
            } else {
                $('.error-customer_phone').text('');
            }
        }
        var $data = {
            'data': {
                'customer_name': $name,
                'customer_phone': $phone,
                'customer_email': $mail,
                'customer_addr': $address,
                'notes': $notes,
                'customer_birthday': $birthday,
                'customer_gender': $gender
            }
        };
        var $url = 'backend/ajax/cms_save_edit_customer/' + $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
                if( data == '1' ){
                    $('.ajax-success-ct').html('Bạn đã cập nhật khách hàng thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                    cms_detail_after_edit( $id );
                }
            }
        };
        cms_adapter_ajax($param);
    }

}
function cms_detail_item(){
    'use strict';
    $('.tr-detail-item').on( 'click',function(){
      var $ids = $(this).parent().attr('id');
      var $id = parseInt( $ids.replace ( /[^\d.]/g, '' ) );
        var $url = 'backend/ajax/cms_detail_itemcust/'+ $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': null,
            'callback': function (data) {
               $('.customer-manufacture').html( data );
            }
        };
        cms_adapter_ajax($param);

    });
}

function cms_detail_after_edit( $id ){
    var $url = 'backend/ajax/cms_detail_itemcust/'+ $id;
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.customer-manufacture').html( data );
        }
    };
    cms_adapter_ajax($param);
}

function cms_crManuf(){
    $name = $.trim($('#manuf_name').val());
    $phone = $.trim($('#manuf_phone').val());
    $mail = $.trim($('#manuf_email').val());
    $addr = $.trim($('#manuf_addr').val());
    $tax_code = $.trim($('#tax_code').val());
    $notes = $.trim($('#manuf_notes').val());

    if ($name.length == 0) {
        $('.error-manuf_name').text('Tên nhà cung cấp không được để trống.');
    } else {
        $('.error-manuf_name').text('');
        if( $phone.length != 0 ){
            if (!$.isNumeric($phone)) {
                $('.error-manuf_phone').text('Số điện thoại phải là số.');
                return;
            } else {
                $('.error-manuf_phone').text('');
            }
        }
        var $data = {
            'data': {
                'manuf_name': $name,
                'manuf_phone': $phone,
                'manuf_email': $mail,
                'manuf_addr': $addr,
                'tax_code': $tax_code,
                'notes': $notes
            }
        };
        var $url = 'backend/ajax/cms_crManuf';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
               if( data == '1' ){
                   $('.btn-close').trigger('click');
                   $('.ajax-error-ct').hide();
                   $('.ajax-success-ct').html('Bạn đã tạo mới nhà cung cấp thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                   cms_upManuf();
                   $("#search-box-mas").prop('readonly', true).attr('data-id',data).val($name);
                   $(".del-mas").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>');
               }else{
                   $('.ajax-error-ct').html('Lỗi hệ thống.').parent().fadeIn().delay(1500).fadeOut('slow');
               }
            }
        };
        cms_adapter_ajax($param);

    }

}

function cms_upManuf(){
    'use strict';
    var $keyword = $('.txt-smanuf').val();
    var $data = null;
    if( $keyword != '' ){
        $data = { 'keyword' : $keyword };
    }

    var $url = 'backend/ajax/cms_upManuf';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': $data,
        'callback': function (data) {
            $('.manuf-body').html( data );
        }
    };
    cms_adapter_ajax($param);
}
function cms_delManuf( $id ){
    'use strict';

    var conf = confirm('Bạn chắc chắn muốn xóa nhà cung cấp này!');
    if (conf) {
        var $url = 'backend/ajax/cms_delManuf';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'id': $id},
            'callback': function (data) {
                if (data == '0') {
                    $('.ajax-error-ct').html('Lỗi! không thể xóa nhà cung cấp này').parent().fadeIn().delay(1500).fadeOut('slow');
                } else {
                    $('.ajax-success-ct').html('Bạn đã xóa nhà cung cấp thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                    cms_upManuf();
                }
            }
        };
        cms_adapter_ajax($param);
    }
}

function cms_detail_manufacture( $id ){
    'use strict';
    var $url = 'backend/ajax/cms_detail_manufacture/'+ $id;
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.customer-manufacture').html( data );
        }
    };
    cms_adapter_ajax($param);
}
function cms_save_edit_manuf(){
    'use strict';
    var $ids = $('.tr-item-manuf').attr('id');
    var $id = parseInt( $ids.replace ( /[^\d.]/g, '' ) );

    var $name = $.trim( $('.customer-manufacture #manuf_name').val() );
    var $phone = $.trim($('.customer-manufacture #manuf_phone').val());
    var $mail = $.trim($('.customer-manufacture #manuf_email').val());
    var $address = $('.customer-manufacture #manuf_addr').val();
    var $tax_code = $('.customer-manufacture #tax_code').val();
    var $notes = $('.customer-manufacture #notes').val();

    if ($name.length == 0) {
        $('.error-manuf_name').text('Tên Nhà cung cấp không được để trống.');
    } else {
        $('.error-manuf_name').text('');
        if( $phone.length != 0 ){
            if (!$.isNumeric($phone)) {
                $('.error-manuf_phone').text('Số điện thoại phải là số.');
                return;
            } else {
                $('.error-manuf_phone').text('');
            }
        }
        var $data = {
            'data': {
                'manuf_name': $name,
                'manuf_phone': $phone,
                'manuf_email': $mail,
                'manuf_addr': $address,
                'notes': $notes,
                'tax_code' : $tax_code
            }
        };
    var $url = 'backend/ajax/cms_save_edit_manuf/' + $id;
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': $data,
        'callback': function (data) {
            if( data == '1' ){
                $('.ajax-success-ct').html('Bạn đã cập nhật nhà cung cấp thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                cms_detail_manufacture( $id );
            }
        }
    };
    cms_adapter_ajax($param);
    }
}
/*
 * PRODUCT
 /***************************/
function cms_vcrproduct( $name ){
    var $url = 'backend/product/cms_vcrproduct';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if( $name != '1' ){
                $('.products').html(data);
                $('#prd_name').val($name+ ' - Copy 1' );
            }else{
                $('.products').html(data);
            }

        }
    };
    cms_adapter_ajax($param);
}

function cms_prd_category(){
    'user strict';

    var $prd_cat_name = $.trim( $('#prd_cat_name').val() );
    if( $prd_cat_name.length == 0 ){
        alert( 'Nhập tên chủng loại hàng hóa.' );
    }else{
        var $url = 'backend/product/cms_prd_category';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': { 'data': {'prd_cat_name': $prd_cat_name } },
            'callback': function (data) {
                if( data == '1' ){
                    cms_upprdCategory();
                    $('.ajax-success-ct').html('Tạo mới chủng loại thành công!').parent().fadeIn().delay(1500).fadeOut('slow');
                }else{
                    $('.ajax-error-ct').html('Tên chủng loại đã có trong hệ thống. Vui lòng chọn tên khác.').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }

}
function cms_upprdCategory(){
    var $url = 'backend/product/cms_upprdCategory';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.prd_category-body').html( data );
        }
    };
    cms_adapter_ajax($param);
}

function cms_delprdCategory( $id ){
    var conf = confirm('Bạn chắc chắn muốn xóa chủng loại hàng hóa này!');
        if (conf) {
            var $url = 'backend/product/cms_delprdCategory/'+$id;
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': null,
                'callback': function (data) {
                    if (data == '0') {
                        $('.ajax-error-ct').html('Lỗi! không thể xóa chủng loại hàng hóa này').parent().fadeIn().delay(1500).fadeOut('slow');
                    } else {
                        $('.ajax-success-ct').html('Xóa loại hàng hóa thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                        cms_upprdCategory();
                    }
                }
            };
            cms_adapter_ajax($param);
    }
}
function cms_save_item_prdCategory( $id ){
    'use strict';
    var $prd_cat_name = $.trim( $('.edit_prd_cat_name-' + $id).val() );
    if( $prd_cat_name.length == 0 ){
        alert( 'Nhập tên chủng loại hàng hóa.' );
    }else{
        var $url = 'backend/product/cms_save_item_prdCategory/'+ $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': { 'data': {'prd_cat_name': $prd_cat_name } },
            'callback': function (data) {
                if( data == '1' ){
                    cms_upprdCategory();
                    $('.ajax-success-ct').html('Cập nhật chủng loại hàng hóa thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                }else{
                    $('.ajax-error-ct').html('Tên chủng loại đã có trong hệ thống. Vui lòng chọn tên khác.').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_prd_group(){
    'use strict';

    var $prd_group_name = $.trim( $('#prd_group_name').val() );
    var $parentid = $( '#parentid').val();
    var $data = { 'data': {'prd_group_name': $prd_group_name, 'parentid': $parentid } };
    if( $parentid == 1 ) $data = { 'data': {'prd_group_name': $prd_group_name} }
    if( $prd_group_name.length == 0 ){
        alert( 'Nhập tên nhóm hàng.' );
    }else{
        var $url = 'backend/product/cms_prd_group';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
               if( data == '1'){
                   cms_upprdGroup();
                   cms_sls_prd_group();
                   $('.ajax-success-ct').html('Tạo nhóm hàng thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
               }else if( data == '0' ){
                   $('.ajax-error-ct').html('Tên nhóm hàng cùng cấp đã tồn tại trong hệ thống. Vui lòng chọn tên khác.').parent().fadeIn().delay(1500).fadeOut('slow');
               }else{
                   $('.ajax-error-ct').html('Opps! Something went wrong. please try again!').parent().fadeIn().delay(1500).fadeOut('slow');
               }
            }
        };
        cms_adapter_ajax($param);
    }

}
function cms_sls_prd_group(){
    var $url = 'backend/product/cms_sls_prd_group';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('#parentid').html( data );
        }
    };
    cms_adapter_ajax($param);
}
function cms_upprdGroup(){
    var $url = 'backend/product/cms_upprdGroup';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.prd_group-body').html( data );
        }
    };
    cms_adapter_ajax($param);
}
function cms_save_item_prdGroup( $id ){
    'use strict';
    var $prd_group_name = $.trim( $('.edit_prd_group_name-' + $id).val() );
    if( $prd_group_name.length == 0 ){
        alert( 'Nhập tên nhóm hàng hóa.' );
    }else{
        var $url = 'backend/product/cms_save_item_prdGroup/'+ $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': { 'data': {'prd_group_name': $prd_group_name } },
            'callback': function (data) {
                if( data == '1' ){
                    cms_upprdGroup();
                    $('.ajax-success-ct').html('Cập nhật nhóm hàng thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                }else{
                    $('.ajax-error-ct').html('Tên nhóm hàng đã có trong hệ thống. Vui lòng chọn tên khác.').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_delprdGroup( $id ) {
    'use strict';
    var conf = confirm('Bạn chắc chắn muốn xóa nhóm hàng này?');
    if (conf) {
        var $url = 'backend/product/cms_delprdGroup/' + $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': null,
            'callback': function (data) {
                if (data == '1') {
                    cms_upprdGroup();
                    $('.ajax-success-ct').html('Xóa nhóm hàng thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                } else if (data == '0') {
                    $('.ajax-error-ct').html('Oops! This system is errors! please try again.').parent().fadeIn().delay(1500).fadeOut('slow');
                } else {
                    $('.ajax-error-ct').html(data).parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_add_product( type ){
    'use strict';
    /* Get data: prd_name,prd_sls,prd_inventory,prd_origin_price,prd_sell_price
    * prd_group_id,prd_category_id,
    * */
    var $name = $.trim( $('#prd_name').val());
    var $sls = $.trim( $('#prd_sls').val() );
    var $inventory = cms_get_valCheckbox( 'prd_inventory', 'id');
    var $origin_price = $('#prd_origin_price').val();
    var $sell_price = $('#prd_sell_price').val();
    var $group_id = $('#prd_group_id').val();
    var $category_id = $('#prd_category_id').val();
    var $vat = $('#prd_vat').val();
    var $img_url;
    var $img_afurl = $('#prd_image_urls').attr('src');
    $img_url = (typeof $img_afurl == 'undefined' ) ? '' : $img_afurl;
    tinyMCE.triggerSave();
    var $description = $('#prd_description').val();
    var $display_wb = cms_get_valCheckbox('display_website', 'id');
    var $new = cms_get_valCheckbox('prd_new', 'id');
    var $hot = cms_get_valCheckbox('prd_hot', 'id');
    var $highlight = cms_get_valCheckbox('prd_highlight', 'id');
    if( $name.length == 0 ){
        $('.ajax-error-ct').html('Vui lòng nhập tên hàng hóa.').parent().fadeIn().delay(1500).fadeOut('slow');
    }else {
        var $data = { 'data': {
            'prd_name': $name,
            'prd_sls': $sls,
           'prd_inventory': $inventory,
            'prd_origin_price': $origin_price,
            'prd_sell_price': $sell_price,
            'prd_group_id': $group_id,
            'prd_category_id': $category_id,
            'prd_vat': $vat,
            'prd_image_url': $img_url,
            'prd_descriptions': $description,
            'display_website': $display_wb,
            'prd_new': $new,
            'prd_hot': $hot,
            'prd_highlight': $highlight
        }};
        var $url = 'backend/product/cms_add_product';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
                if( data == '1' ){
                    if( type == 'save' ){
                        $('.btn-back').trigger('click');
                        $('.ajax-success-ct').html('Tạo hàng hóa '+$name+' thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                    }else{
                        $('.ajax-success-ct').html('Tạo hàng hóa '+$name+' thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                        $('.products').find('input:text').val('');
                        tinymce.get('prd_description').setContent('');
                        $('.products').find('input:checkbox').prop('checked', false);
                    }
                }else{
                    $('.ajax-error-ct').html( data ).parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_load_listProduct(){
    var $url = 'backend/product/cms_load_listProduct/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.product-main-body').html(data);
        }
    };
    cms_adapter_ajax($param);
}
function cms_del_temp_product( $id ){
    var conf = confirm('Bạn chắc chắn muốn xóa hàng hóa này?');
    if (conf) {
        var $url = 'backend/product/cms_del_temp_product/' + $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': null,
            'callback': function (data) {
                if (data == '1') {
                    cms_load_listProduct();
                    $('.ajax-success-ct').html('Xóa hàng hóa thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                } else if (data == '0') {
                    $('.ajax-error-ct').html('Oops! This system is errors! please try again.').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_change_status( $id ){
    var conf = confirm('Bạn có thực sự muốn ngừng kinh doanh hàng hóa này không?');
    if (conf) {
        var $name = $('td.prd_name_copy').text();
        var $url = 'backend/product/cms_change_status/' + $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': null,
            'callback': function (data) {
                if (data == '1') {
                    cms_load_listProduct();
                    $('.ajax-success-ct').html('Ngừng kinh doanh hàng hóa '+$name+' thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                } else if (data == '0') {
                    $('.ajax-error-ct').html('Oops! This system is errors! please try again.').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_copy_product( $id ){
    var $name = $('td.prd_name_copy-'+$id).text();
    cms_vcrproduct( $name );
}
function cms_edit_product( $id ){


    var $url = 'backend/product/cms_edit_product/' + $id;
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.products').html(data);
        }
    };
    cms_adapter_ajax($param);

}

/*========================== ORDER ============================*/

function cms_vsell_order(){
    var $url = 'backend/order/cms_vsell_order/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.orders').html(data);
        }
    };
    cms_adapter_ajax($param);
}
function cms_search_box_products(){
    $("body").on('keyup ajaxComplete', '#search-pro-box',function(){
        $('#pro-suggestion-box').show();
        $key = $(this).val();
        if( $key.length == 0 ){
            $('.search-pro-inner').html('Không có kết quả phù hợp').parent().hide().delay(1000);
        }else {
            var $url = 'backend/order/cms_search_box_products/';
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': {'data': {'keyword': $key}},
                'callback': function (data) {
                    if( data.length != 0 ){
                        $('.search-pro-inner').html(data);
                    }else{
                        $('.search-pro-inner').html('Không có kết quả phù hợp');
                    }
                }
            };
            cms_adapter_ajax($param);
        }
    });

}
// search cho product
function cms_search_box_products2(){
    $("body").on('keyup ajaxComplete', '.products-content #search-pro-box',function(){
        $('.products-content #pro-suggestion-box').show();
        $key = $(this).val();
        if( $key.length == 0 ){
            $('.products-content .search-pro-inner').html('Không có kết quả phù hợp').parent().hide().delay(1000);
        }else {
            var $url = 'backend/order/cms_search_box_products2/';
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': {'data': {'keyword': $key}},
                'callback': function (data) {
                    if( data.length != 0 ){
                        $('.products-content .search-pro-inner').html(data);
                    }else{
                        $('.products-content .search-pro-inner').html('Không có kết quả phù hợp');
                    }
                }
            };
            cms_adapter_ajax($param);
        }
    });

}
function cms_search_box_customer(){
    $("body").on('keyup ajaxComplete', '#search-box-cys',function(){
        $('#cys-suggestion-box').show();
        $key = $(this).val();
        if( $key.length == 0 ){
            $('.search-cys-inner').html('Không có kết quả phù hợp').parent().hide().delay(1000);
        }else {
            var $url = 'backend/order/cms_search_box_customer/';
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': {'data': {'keyword': $key}},
                'callback': function (data) {
                    if( data.length != 0 ){
                        $('.search-cys-inner').html(data);
                    }else{
                        $('.search-cys-inner').html('Không có kết quả phù hợp');
                    }
                }
            };
            cms_adapter_ajax($param);
        }
    });

}
function cms_search_box_manuf(){
    $("body").on('keyup ajaxComplete', '#search-box-mas',function(){
        $('#mas-suggestion-box').show();
        $key = $(this).val();
        if( $key.length == 0 ){
            $('.search-mas-inner').html('Không có kết quả phù hợp').parent().hide().delay(1000);
        }else {
            var $url = 'backend/import/cms_search_box_manuf/';
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': {'data': {'keyword': $key}},
                'callback': function (data) {
                    if( data.length != 0 ){
                        $('.search-mas-inner').html(data);
                    }else{
                        $('.search-mas-inner').html('Không có kết quả phù hợp');
                    }
                }
            };
            cms_adapter_ajax($param);
        }
    });

}
function cms_selected_pro( $id ){
    if( $('tbody#pro_search_append  tr').length != 0){
        $flag = 0;
        $('tbody#pro_search_append  tr').each(function() {
            $id_temp = $(this).attr('data-id');

            if( $id == $id_temp ){
                value_input = $(this).find('input.count-pro-order');
                value_input.val( parseInt(value_input.val()) + 1 );
                $('#pro-suggestion-box').hide();
                $flag = 1;
                return false;
            }
        });
        if( $flag == 0 ) {
            var $url = 'backend/order/cms_selected_pro/';
            var $param = {
                'type': 'POST',
                'url': $url,
                'data': {'id': $id},
                'callback': function (data) {
                    $('#pro_search_append').append(data);
                    $('#pro-suggestion-box').hide();
                }
            };
            cms_adapter_ajax($param);
        }
    }else{
        var $url = 'backend/order/cms_selected_pro/';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'id': $id},
            'callback': function (data) {
                $('#pro_search_append').append(data);
                $('#pro-suggestion-box').hide();
                cms_load_infor_order();
            }
        };
        cms_adapter_ajax($param);
    }

}
function cms_selected_cys( $id ){
    $name = $('li.data-cys-name-'+$id).text();
    $("#search-box-cys").prop('readonly', true).attr('data-id', $id).val($name);
    $(".del-cys").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>');
    $('#cys-suggestion-box').hide();
}
function cms_selected_mas( $id ){
    $name = $('li.data-cys-name-'+$id).text();
    $("#search-box-mas").prop('readonly', true).attr('data-id', $id).val($name);
    $(".del-mas").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>');
    $('#mas-suggestion-box').hide();
}
function cms_del_pro_order(){
    $('body').on('click', '.del-pro-order', function(){
        $(this).parents('tr').remove();
    });
}
function cms_save_orders( type ){
    if( $('tbody#pro_search_append  tr').length == 0) {
        $('.ajax-error-ct').html('Xin vui lòng chọn ít nhất 1 hàng hóa cần xuất trước khi lưu đơn hàng. Xin cảm ơn!').parent().fadeIn().delay(1500).fadeOut('slow');
    }else{
        $idkhach = $('#search-box-cys').attr('data-id');
        $date = $('#date-order').val();
        $note = $('#note-order').val();
        $payment_method = $("input:radio[name ='method-pay']:checked").val();
        $discount = $('.discount-order').val();
        $khachdua = $('.payed-order').val();
        $lack = $('.owe-order').text();
        $detail = [];
        $('tbody#pro_search_append  tr').each(function() {
            $id = $(this).attr('data-id');
            $value_input = $(this).find('input.count-pro-order').val();
            $detail.push(
                { id: $id, count: $value_input }
            );
        });
        $total_money = $('.count_money_order').text();
        if( type == 'save'){ $order_status = 1 }
        $data = { 'data': {
            'id_customer': $idkhach,
            'sell_date' : $date,
            'notes' : $note,
            'payment_method': $payment_method,
            'coupon' : $discount,
            'total_money': $total_money,
            'count_money_pay': $khachdua,
            'lack': $lack,
            'detail_order': $detail,
            'order_status' : $order_status
        }};

        var $url = 'backend/order/cms_save_orders/';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {

                if( data == '1' ){
                    if( type == 'save' ){
                        $('.ajax-success-ct').html('Đã lưu thành công đơn hàng.').parent().fadeIn().delay(1500).fadeOut('slow');
                        $('.btn-back').delay('1500').trigger('click');
                    }else{
                        $('.ajax-success-ct').html('Đã lưu thành công đơn hàng.').parent().fadeIn().delay(1500).fadeOut('slow');
                        cms_vsell_order();
                    }
                }else{
                    $('.ajax-error-ct').html('Oops! This system is errors! please try again.').parent().fadeIn().delay(1500).fadeOut('slow');
                }

            }
        };
        cms_adapter_ajax($param);

    }
}

function cms_load_listorders(){
    var $url = 'backend/order/cms_load_listorders/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.orders-main-body').html(data);
        }
    };
    cms_adapter_ajax($param);
}
function cms_del_temp_order( $id ){
    var conf = confirm('Bạn chắc chắn muốn xóa đơn hàng này?');
    if (conf) {
        var $url = 'backend/order/cms_del_temp_order/' + $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': null,
            'callback': function (data) {
                if (data == '1') {
                    cms_load_listorders();
                    $('.ajax-success-ct').html('Xóa đơn hàng thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                } else if (data == '0') {
                    $('.ajax-error-ct').html('Oops! This system is errors! please try again.').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_edit_order($id){

    var $url = 'backend/order/cms_edit_order/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': { 'id': $id },
        'callback': function (data) {
            console.log( data );
            $('.orders').html(data);
        }
    };
    cms_adapter_ajax($param);
}


/*=================== Module Imports ===========================*/
function cms_vsell_import(){
    var $url = 'backend/import/cms_vsell_import/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.orders').html(data);
        }
    };
    cms_adapter_ajax($param);
}
function cms_save_import( type ){
    if( $('tbody#pro_search_append  tr').length == 0) {
        $('.ajax-error-ct').html('Xin vui lòng chọn ít nhất 1 hàng hóa cần xuất trước khi lưu hóa đơn nhập. Xin cảm ơn!').parent().fadeIn().delay(1500).fadeOut('slow');
    }else{
        $idmanuf = $('#search-box-mas').attr('data-id');
        $date = $('#date-order').val();
        $note = $('#note-order').val();
        $payment_method = $("input:radio[name ='method-pay']:checked").val();
        $discounti = $('.discount-import').val();

        $khachdua = $('.payed-order').val();
        $lack = $('.owe-order').text();

        $detail = [];
        $('tbody#pro_search_append  tr').each(function() {
            $id = $(this).attr('data-id');
            $value_input = $(this).find('input.count-pro-order').val();
            $detail.push(
                { id: $id, count: $value_input }
            );
        });
        $total_money = $('.count_money_import').text();

        if( type == 'save'){ $import_status = 1 }

        $data = { 'data': {
            'id_manuf': $idmanuf,
            'input_date' : $date,
            'notes' : $note,
            'payment_method': $payment_method,
            'discount' : $discounti,
            'total_money': $total_money,
            'payed': $khachdua,
            'lack': $lack,
            'detail_import': $detail,
            'import_status' : $import_status
        }};

        var $url = 'backend/import/cms_save_import/';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {

                if( data == '1' ){
                    if( type == 'save' ){
                        $('.ajax-success-ct').html('Đã lưu thành công đơn nhập.').parent().fadeIn().delay(1500).fadeOut('slow');
                        $('.btn-back').delay('1500').trigger('click');
                    }else{
                        $('.ajax-success-ct').html('Đã lưu thành công đơn nhập.').parent().fadeIn().delay(1500).fadeOut('slow');
                        cms_vsell_import();
                    }
                }else{
                    console.log(data);
                    $('.ajax-error-ct').html('Oops! This system is errors! please try again.').parent().fadeIn().delay(1500).fadeOut('slow');
                }

            }
        };
        cms_adapter_ajax($param);

    }
}
function cms_selboxstock() {
    "use strict";
    var $url = 'backend/ajax/cms_selboxstock';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            if (data != '0') {
                $('.stock-selbox').html(data);
            } else {
                $('.stock-selbox').html($html);
            }
        }
    };
    cms_adapter_ajax($param);
}
function cms_load_listimports(){
    var $url = 'backend/import/cms_load_listimports/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': null,
        'callback': function (data) {
            $('.imports-main-body').html(data);
        }
    };
    cms_adapter_ajax($param);
}
function cms_del_temp_import( $id ){
    var conf = confirm('Bạn chắc chắn muốn xóa phiếu nhập này?');
    if (conf) {
        var $url = 'backend/import/cms_del_temp_import/' + $id;
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': null,
            'callback': function (data) {
                if (data == '1') {
                    cms_load_listimports();
                    $('.ajax-success-ct').html('Xóa phiếu nhập thành công.').parent().fadeIn().delay(1500).fadeOut('slow');
                } else if (data == '0') {
                    $('.ajax-error-ct').html('Oops! This system is errors! please try again.').parent().fadeIn().delay(1500).fadeOut('slow');
                }
            }
        };
        cms_adapter_ajax($param);
    }
}
function cms_edit_import($id){

    var $url = 'backend/import/cms_edit_import/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': { 'id': $id },
        'callback': function (data) {
            $('.orders').html(data);
        }
    };
    cms_adapter_ajax($param);
}
function cms_load_listInventory(){
    $keyword = $('.txt-sinventory').val();
    $selected1 = $('#prd_group_id').val();
    $selected2 = $('#option-inventory').val();

    $data = { 'data': { 'keyword': $keyword, 'selected1': $selected1, 'selected2': $selected2 } };
    var $url = 'backend/inventory/cms_load_listInventory/';
    var $param = {
        'type': 'POST',
        'url': $url,
        'data': $data,
        'callback': function (data) {
            $('.inventory-main-body').html(data);
            console.log(data);
        }
    };
    cms_adapter_ajax($param);
}
function cms_loadListOption(){
    $('#option-inventory').on('change',function(){
        $value = $(this).val();
        $keyword = $('.txt-sinventory').val();
        $selected1 = $('#prd_group_id').val();
        $data = { 'data': { 'keyword': $keyword, 'selected1': $selected1, 'selected2': $value } };
        var $url = 'backend/inventory/cms_load_listInventory/';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': $data,
            'callback': function (data) {
                $('.inventory-main-body').html(data);
            }
        };
        cms_adapter_ajax($param);
    });
}

// Option Seach for module product
function cms_loadListproOption1(){
    $('#search-option-1').on('change',function(){
        $option = $(this).val();
        var $url = 'backend/product/cms_loadListproOption1/';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'option': $option},
            'callback': function (data) {
                $('.product-main-body').html(data);
            }
        };
        cms_adapter_ajax($param);
    });
}
function cms_loadListproOption2(){
    $('.search-option-2').on('change',function(){
        $option = $(this).val();
        var $url = 'backend/product/cms_loadListproOption2/';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'option': $option},
            'callback': function (data) {
                $('.product-main-body').html(data);
            }
        };
        cms_adapter_ajax($param);
    });
}
function cms_loadListproOption3(){
    $('.search-option-3').on('change',function(){
        $option = $(this).val();
        var $url = 'backend/product/cms_loadListproOption3/';
        var $param = {
            'type': 'POST',
            'url': $url,
            'data': {'option': $option},
            'callback': function (data) {
                $('.product-main-body').html(data);
            }
        };
        cms_adapter_ajax($param);
    });
}
//Eport Exel
function cms_export_inventory(){
   return cms_javascript_redirect('backend/inventory/ExportInventory');
}