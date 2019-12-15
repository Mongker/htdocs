<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Mã phiếu nhập</th>
        <th class="text-center">Kho nhập</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Ngày nhập</th>
        <th class="text-center">Người nhập</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th class="text-center"><i class="fa fa-clock-o"></i> Nợ</th>
        <th></th>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"  class="checkbox chkAll"><span style="width: 15px; height: 15px;"></span></label></th>
    </tr>
    </thead>
    <tbody>
    <?php if ( isset( $data[ '_list_imports' ] ) && count( $data[ '_list_imports' ] ) ) :
        $total_money = 0; $total_lack = 0;
        foreach ( $data[ '_list_imports' ] as $key => $item ) :
            $total_money += (int)str_replace(",","",$item['total_money']);
            $total_lack  += (int)str_replace(",","",$item['lack'])
            ?>
            <tr>
                <td style="color: #2a6496; cursor: pointer;" onclick="cms_edit_import(<?php echo $item['ID']; ?>)"> EX_PN0000<?php echo $item[ 'ID' ]; ?></td>
                <td style="background: #fff;"><?php echo cms_getNamestockbyID($item['id_stock']); ?></td>
                <td class="text-center"><?php echo cms_getNamestatusbyID( $item['import_status'] ); ?></td>
                <td class="text-center"><?php echo ($item['input_date'] != '0000-00-00 00:00:00') ? gmdate("H:i d/m/Y", strtotime(str_replace('-','/',$item['input_date'])) + 7*3600):'-'; ?></td>
                <td class="text-center"><?php echo cms_getNameAuthbyID($item['user_init']); ?></td>

                <td class="text-center" style="background-color: #F2F2F2;"><?php echo $item['total_money']; ?></td>
                <td class="text-center" style="background: #fff;"><?php echo $item['lack']; ?></td>
                <td class="text-center" style="background: #fff;"><i title="Copy" onclick="cms_copy_product(<?php echo $item['ID']; ?>);" class="fa fa fa-print blue" style="margin-right: 5px;"></i>
                    <i class="fa fa-trash-o" style="color: darkred;" title="Xóa" onclick="cms_del_temp_import(<?php echo $item['ID']; ?>)"></i></td>
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
        Tổng số hóa đơn: <span><?php echo (isset($data['_sl_imports'])) ? $data['_sl_imports']: 0; ?></span>
        Tổng tiền: <span><?php echo cms_currency_format(( isset($total_money)? $total_money : 0)); ?></span>
        Tổng nợ: <span><?php echo cms_currency_format(( isset($total_lack)? $total_lack : 0)); ?></span>
    </div>
    <div class="pull-right ajax-pagination">
        <?php echo $_pagination_link; ?>
    </div>
</div>

