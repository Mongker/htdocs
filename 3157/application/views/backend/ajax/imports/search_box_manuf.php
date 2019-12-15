<?php if( isset($data['manufactures']) && count($data['manufactures']) ) : ?>
    <ul class="list-unstyled">
        <?php
        foreach($data['manufactures'] as $key => $val ) :
            ?>
            <li style="cursor: pointer;" onclick="cms_selected_mas(<?php echo $val['ID']; ?>)">
                <ul class="list-unstyled">
                    <li style="padding: 3px 10px;" class="data-cys-name-<?php echo $val['ID']; ?>"><i class="fa fa-user" style="color: #0B87C9;" aria-hidden="true"></i> <?php echo $val['manuf_name']; ?></li>
                    <li style="padding: 3px 10px;"><i class="fa fa-barcode" style="color: #0B87C9;"></i> <?php echo 'NHK000'.$val['ID']; ?></li>
                    <li style="padding: 3px 10px;"><i class="fa fa-phone" style="color: #0B87C9;" aria-hidden="true"></i> <?php echo ( !empty($val['manuf_phone']) ) ? $val['manuf_phone'] : 'Không có'  ; ?></li>
                </ul>
            </li>
            <hr style="color: #0B87C9; margin: 10px 0;"/>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
