<?php if( isset($data['products']) && count($data['products']) ) : ?>
        <table class="table table-bordered table-striped">
            <tbody>
            <?php $stt = 1;
            foreach($data['products'] as $key => $val ) :
            ?>
                <tr style="cursor: pointer;" onclick="cms_selected_pro(<?php echo $val['ID']; ?>)">
                    <td class="text-center"><?php echo $stt++; ?></td>
                    <td class="text-center " style="font-weight: 600;"><?php echo $val['prd_name']; ?></td>
                    <td class="text-center">Mã hàng: SP0000<?php echo $val['ID']; ?></td>
                    <td class="text-center">Giá: <?php echo $val['prd_sell_price'];?> Tồn: <?php echo $val['prd_sls'] . ' Kg' ?> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
<?php endif; ?>
