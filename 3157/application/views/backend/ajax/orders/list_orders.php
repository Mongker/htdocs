<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Mã đơn hàng</th>
        <th class="text-center">Ngày bán</th>
        <th class="text-center">Thu ngân</th>
        <th class="text-center">Khách hàng</th>
        <th class="text-center">Trạng thái</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th class="text-center"><i class="fa fa-clock-o"></i> Nợ</th>
        <th></th>
            <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"  class="checkbox chkAll"><span style="width: 15px; height: 15px;"></span></label></th>
    </tr>
    </thead>
    <tbody>
    <?php if ( isset( $data[ '_list_orders' ] ) && count( $data[ '_list_orders' ] ) ) :
        $total_money = 0; $total_lack = 0;
        foreach ( $data[ '_list_orders' ] as $key => $item ) :
            $total_money += (int)str_replace(",","",$item['total_money']);
            $total_lack  += (int)str_replace(",","",$item['lack'])
            ?>
            <tr>
                <td class="text-center" style="color: #2a6496; cursor: pointer;" onclick="cms_edit_order(<?php echo $item['ID']; ?>)"> DHQ000<?php echo $item[ 'ID' ]; ?></td>
                <td class="text-center"><?php echo ($item['sell_date'] != '0000-00-00 00:00:00') ? gmdate("H:i d/m/Y", strtotime(str_replace('-','/',$item['sell_date'])) + 7*3600):'-'; ?></td>
                <td class="text-center"><?php echo $data['auth_name']; ?></td>
                <td class="text-center"><?php echo cms_getNamecustomerbyID( $item['id_customer'] ); ?></td>
                <td class="text-center"><?php echo cms_getNamestatusbyID( $item['order_status'] ); ?></td>
                <td class="text-center" style="background-color: #F2F2F2;"><?php echo $item['total_money']; ?></td>
                <td class="text-center" style="background: #fff;"><?php echo $item['lack']; ?></td>
                <td class="text-center" style="background: #fff;"><i title="Copy" onclick="cms_copy_product(<?php echo $item['ID']; ?>);" class="fa fa fa-print blue" style="margin-right: 5px;"></i>
                    <i class="fa fa-trash-o" style="color: darkred;" title="Xóa" onclick="cms_del_temp_order(<?php echo $item['ID']; ?>)"></i></td>
                <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                          value="<?php echo $item[ 'ID' ]; ?>"
                                                                                          class="checkbox chk"><span style="width: 15px; height: 15px;"></span></label>

            </tr>
        <?php endforeach;
    else :
        echo '<tr><td colspan="9" class="text-center">Không có dữ liệu</td></tr>';
    endif;

    ?>
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">
        Tổng số hóa đơn: <span><?php echo (isset($data['_sl_orders'])) ? $data['_sl_orders']: 0; ?></span>
        Tổng tiền: <span><?php echo cms_currency_format(( isset($total_money)? $total_money : 0)); ?></span>
        Tổng nợ: <span><?php echo cms_currency_format(( isset($total_lack)? $total_lack : 0)); ?></span>
    </div>
    <div class="pull-right ajax-pagination">
        <?php echo $_pagination_link; ?>
    </div>
</div>

