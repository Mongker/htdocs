<tr>
    <td class="text-center"><?php echo $stt++; ?></td>
    <td class="text-center">SP0000<?php echo $val['ID']; ?></td>
    <td class="text-center"><?php echo $val['prd_name']; ?></td>
    <td class="text-center"><input type="text" class=" form-control count text-center" value="1"> </td>
    <td class="text-center"><?php echo $val['prd_sell_price'];?></td>
    <td class="text-center">170025</td>
    <td class="text-center"><i class="fa fa-trash-o"></i></td>
</tr>
<?php if ( isset( $data[ '_list_orders' ] ) && count( $data[ '_list_orders' ] ) ) :
    foreach ( $data[ '_list_orders' ] as $key => $item ) : ?>
        <tr>
            <td class="text-center" onclick="cms_edit_order(<?php echo $item['ID']; ?>DHQ000<?php echo $item[ 'ID' ]; ?></td>
                <td class="text-center"><?php echo $item[ 'sell_date' ]; ?></td>
            <td class="text-center"><?php echo $data['auth_name']; ?></td>
            <td class="text-center"><?php echo cms_getNamecustomerbyID( $item['ID'] ); ?></td>

            style="margin-right: 5px; color: #C6699F; cursor: pointer;"></i>
            <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                      value="<?php echo $item[ 'ID' ]; ?>"
                                                                                      class="checkbox chk"><span style="width: 15px; height: 15px;"></span></label>
            </td>
        </tr>
    <?php endforeach;
else :
    echo '<tr><td colspan="9" class="text-center">Không có dữ liệu</td></tr>';
endif;

?>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">SL hàng hóa/SL chủng loại: <span><?php echo (isset($data['_sl_orders'])) ? $data['_sl_']: 0; ?>/<?php echo (isset($data['_sl_category'])) ? $data['_sl_category']: 0; ?></span></div>
    <div class="pull-right ajax-pagination">
        <?php echo $_pagination_link; ?>
    </div>
</div>
<td class="text-center" onclick="cms_edit_order(<?php echo $item['ID']; ?>"> DHQ000<?php echo $item[ 'ID' ]; ?></td>
<td class="text-center"><?php echo $item[ 'sell_date' ]; ?></td>
<td class="text-center"><?php echo $data['auth_name']; ?></td>
<td class="text-center"><?php echo cms_getNamecustomerbyID( $item['ID'] ); ?></td>
<td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                          value="<?php echo $item[ 'ID' ]; ?>"
                                                                          class="checkbox chk"><span style="width: 15px; height: 15px;"></span></label>
</td>