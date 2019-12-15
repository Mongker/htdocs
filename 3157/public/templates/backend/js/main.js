/**
 * Created by PvTam on 1/10/2016.
 */
$(document).ready(function ($) {
    "use strict";
   fix_height_sidebar();
    cms_del_icon_click('.del-cys', '#search-box-cys');
    cms_del_icon_click('.del-mas', '#search-box-mas');

   /* button submit */
   btnClick( '.btn-smf', '.btn-sm-after' );
    /*
     * check password match
     *************************************/
    $( '#pass2').on( 'inputkeypress',function(){
        var pass1 = $( '#pass1').val(), pass2 = $('#pass2').val();
        if( !is_match( pass1, pass2 ) ) {
            alert('Mật khẩu nhập lại không khớp!');
            $("#pass2").focus();
            return false;
        }
    });

    /*
     * Thay đổi mật khẩu
     *************************************/
    $('.form-hide').hide();
    $('.btn-changepass').on( 'click', function(){
        $(this).hide();
        $('.form-hide').slideDown( '200');
    });

    $('.btn-changep').on( 'click', function() {
        $('.form-hide').slideUp( '200');
        $('.btn-changepass').show();
    });
    $( '.form-change-password .label').hide();
    $( '.renewpassw').on( 'keypress', function(){
        var renewpassw = $.trim( $(this).val() );
        var newpassw = $.trim($( '.newpassw' ).val() );
        if( renewpassw == newpassw ){
            $( '.form-change-password .label').hide();
        }else{
            $( '.form-change-password .label').show();
        }

    });

    /*
     * Popover
     ***************************************/
    $('.ajax-success').popover('show');

    /*
     * Check box all
     ***************************************/
    $( 'body' ).on('click','.chkAll',function(){
        var $checkboxies = $(this).closest( 'table').find( '.chk' );
        if( $(this).prop('checked') ){
            $checkboxies.prop('checked', true );
        }else{
            $checkboxies.prop('checked', false );
        }
    });

    $('ul.pagination li.active').click( function( event ) { event.preventDefault(); });


});

$(document).on( 'ready ajaxComplete', function(){
    $('.chk').on('change', function( e ) {
        e.preventDefault();
        if( $(this).prop('checked') == false ){
            $('.chkAll').prop('checked', false );
        }
        if( $('.chk:checked').length == $('.chk').length ){
            $('.chkAll').prop('checked', true );
        }
    });

    $('.edit-item').on( 'click', function(){
    });

    $(".txtboxToFilter").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


});


function fix_height_sidebar( ){
    var wdth_main = $('.main-content').height(),
        wdth_sidebar = $(".sidebar").height();
    if( wdth_main > wdth_sidebar ){
        $('.sidebar').height( wdth_main );}
    //}else{
    //    $('.main-content').height( wdth_sidebar );
    //}
}
function btnClick( beforClick, afterClick ){
    $( "body" ).on( 'click',beforClick, function(){
        $( afterClick ).trigger( 'click' ) ;
    });
}
function linkAction( obj, display ){
    $( obj).on( 'click', function(e){
        e.preventDefault();
        $(this).parents( '.login-container').css('display','none');
        $(display).css( 'display', 'block' );
    });
}
function is_match( pass1, pass2 ){

    if( pass1 == pass2 ) return true;

    return false;
}
function cms_edit_usitem( id ){
    $('tr.tr-item-'+id).hide();
    cms_selboxgroup();
    $('tr.edit-tr-item-'+id).show();
}
function cms_undo_item( id ){
    $('tr.edit-tr-item-'+id).hide();
    $('tr.tr-item-'+id).show();
}
function cms_edit_gritem( id ){
    $('table.table-group tr.tr-item-'+id).hide();
    $('table.table-group tr.edit-tr-item-'+id).show();
}

function tab_click_act( act ){
    $('.act').not( this).hide();
    $( '.' + act + '-act').show();

}

function cms_javascript_redirect( url ){
    window.location.assign( url );
}
function cms_javascrip_fullURL(){
    return window.location.href;
}
function cms_edit_cusitem( obj ){
    $('.btn-hide-edit').hide();
    $('.btn-show-edit').show();
    $('.tr-item-'+obj).hide();
    $('.tr-edit-item-'+obj).show();
}
function cms_undo_cusitem( obj ){
    $('.btn-hide-edit').show();
    $('.btn-show-edit').hide();
    $('.tr-item-'+obj).show();
    $('.tr-edit-item-'+obj).hide();
}
function cms_edit_prd( $module, id ){
    $('.prd_'+$module+'-body tr.tr-item-'+id).hide();
    $('.prd_'+$module+'-body tr.edit-tr-item-'+id).show();
}
function cms_get_valCheckbox( obj, type){
    var vals = 0;
    var types = (type == 'class' ) ? '.' : '#';
    if( $(types+obj).prop('checked') == true ){
      vals = 1;
    }
    return vals;
}
Number.prototype.formatMoney = function(c, d, t){
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

function cms_load_stt(){
    var row = $(this).parent().parent().children().index($(this).parent());
    $(this).text(row);
}
function cms_del_icon_click( obs, attach ){
    $('body').on('click', obs, function(){
        $(this).html('').parent().find(attach).val('').removeAttr('data-id').prop('readonly', false);
    })
}
function cms_load_infor_order(){
    $total_order = 0;
    $('tbody#pro_search_append  tr').each(function() {
        $value_input = $(this).find('input.count-pro-order').val();
        $price = $(this).find('td.price-order').text();
        $total =  parseInt($price) * $value_input;
        $total_order += $total;
        $totalm = $total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        $(this).find('td.total-money').text($totalm);
    });
    $total_orderm = $total_order.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    $('div.monney-order').text($total_orderm);
    $payed = $('input.payed-order').val();
    if( $payed == '' ){
        $payed = 0;
    }
    $tax = $('.imports .tax').text();
    $discounti = $('input.discount-import').val();
    if( $discounti == '' ){
        $discounti = 0;
    }
    $fitotal = $total_order-($tax+$discounti);
    $('.count_money_import').text( $fitotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    if( $tax != '' ){
        $('div.owe-order').text(($fitotal - parseInt($payed)).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    }else{
        $('div.owe-order').text(($total_order - parseInt($payed)).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    }


}
function cms_currency_format( obs ){
    $('body').on('keyup', obs, function(){
        $(this).val( $(this).val().toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    });
}
