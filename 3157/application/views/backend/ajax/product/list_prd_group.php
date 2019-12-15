<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-left">Tên nhóm hàng</th>
        <th style="width: 80px;"></th>
    </tr>
    </thead>
    <tbody>
    <?php if ( isset( $_list_prd_group ) && count( $_list_prd_group ) > 1 ) :
        foreach ( $_list_prd_group as $key => $item ) : if( $item['ID'] == 1) continue; ?>
            <tr class='tr-item-<?php echo $item['ID']; ?>'>
                <td class="text-edit"><?php echo str_repeat('|---',$item['level']) . ' ' .$item['prd_group_name']; ?></td>
                <td class="text-center"><i class="fa fa-pencil-square-o edit-item" title="Sửa" onclick="cms_edit_prd('group', <?php echo $item['ID']; ?>)" style="margin-right: 10px; cursor: pointer;"></i><i onclick="cms_delprdGroup(<?php echo $item['ID']; ?>)" title="Xóa" class="fa fa-trash-o delete-item" style="cursor: pointer;"></i></td>
            </tr>
            <tr class='edit-tr-item-<?php echo $item['ID']; ?>' style='display: none;'>
                <td class="text-edit"><input type="text" class="form-control edit_prd_group_name-<?php echo $item['ID']; ?>" value="<?php echo cms_common_input(isset($item) ? $item : [], 'prd_group_name'); ?>"></td>
                <td class="text-center"><i class='fa fa-floppy-o' title='Lưu' onclick='cms_save_item_prdGroup(<?php echo $item['ID']; ?>)' style='color: #EC971F; cursor: pointer; margin-right: 10px;'></i><i onclick='cms_undo_item(<?php echo $item['ID']; ?> )' title='Hủy' class='fa fa-undo' style='color: green; cursor: pointer; margin-right: 5px;'></i></td>
            </tr>
        <?php endforeach;
    else: ?>
        <tr>
            <td colspan="2" class="text-center">Không có dữ liệu</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<?php if( isset( $_pagination_link ) && !empty( $_pagination_link ) ) { ?>
    <div class="alert alert-info summany-info clearfix" role="alert" style="background: #fff; margin-bottom: 0; border: none;">
        <div class="pull-right ajax-pagination">
            <?php  echo $_pagination_link; ?>
        </div>
    </div>
<?php } ?>