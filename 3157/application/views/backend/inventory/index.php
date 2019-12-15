<div class="inventory">


    <div class="inventory-content">
        <div class="product-sear panel-sear">
            <form action="" class="">
                <div class="form-group col-md-5 padd-0">
                    <input type="text" class="form-control txt-sinventory" placeholder="Nhập tên hoặc mã hàng hóa và nhấn Enter để tìm kiếm">
                </div>
                <div class="form-group col-md-7 padd-0" style="padding-left: 5px;">
                    <div class="col-md-11 padd-0">
                        <div class="col-md-8 padd-0">
                            <div class="col-md-6 padd-0">
                                <select class="form-control" id="prd_group_id">
                                    <optgroup label="Chọn nhóm hàng">
                                        <?php if ( isset( $data[ '_prd_group' ] ) && count( $data[ '_prd_group' ] ) ):
                                            foreach ( $data[ '_prd_group' ] as $key => $val ) :
                                                if( $key == 1) continue;
                                                ?>
                                                <option value="<?php echo $key; ?>"><?php echo $val;  ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <option value="1" selected ='selected'>-- Tất cả --</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-6 padd-right-0">
                                <select class="form-control" id="option-inventory">
                                    <option value="0">--Tất cả--</option>
                                    <option value="1" selected="selected">Chỉ lấy hàng tồn</option>
                                    <option value="2">Hết Hàng</option>
                                    <option value="3">Tồn kho lâu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 padd-0" style="padding-left: 5px;">
                            <button style="box-shadow: none;" type="button" class="btn btn-primary btn-large" name="" onclick="cms_load_listInventory()"><i class="fa fa-search"></i> Xem</button>
                            <button type="button" class="btn btn-success" name="" onclick="cms_export_inventory()"><i class="fa fa-download"></i> Xuất Excel</button>
                        </div>
                    </div>
                    <div class="col-md-1 padd-0" style="padding-left: 1px;">

                    </div>
                </div>
            </form>

        </div>

        <div class="inventory-main-body">
            <div class="quick-info report row" style="margin-bottom: 15px;">
                <div class="col-md-11 padd-0">
                    <div class="col-md-3 padd-right-0">
                        <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                            <div class="infobox-icon">
                                <i class="fa fa-clock-o cgreen" style="font-size: 45px;" aria-hidden="true"></i>
                            </div>
                            <div class="infobox-data">
                                <h3 class="infobox-title cgreen" style="font-size: 25px;" ><?php echo gmdate( "d/m/Y", time() + 7 * 3600 ) ; ?></h3>
                                <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Ngày lập</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 padd-right-0">
                        <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                            <div class="infobox-icon">
                                <i class="fa fa-tag blue"  style="font-size: 45px;" aria-hidden="true"></i>
                            </div>
                            <div class="infobox-data">
                                <h3 class="infobox-title blue" style="font-size: 25px;">145</h3>
                                <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">SL tồn kho</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 padd-right-0">
                        <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                            <div class="infobox-icon">
                                <i class="fa fa-refresh orange" style="font-size: 45px;"></i>
                            </div>
                            <div class="infobox-data">
                                <h3 class="infobox-title orange" style="font-size: 25px;">60,000,000</h3>
                                <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Tổng vốn tồn kho</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 padd-right-0">
                        <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                            <div class="infobox-icon">
                                <i class="fa fa-shopping-cart cred" style="font-size: 45px;"></i>
                            </div>
                            <div class="infobox-data">
                                <h3 class="infobox-title cred" style="font-size: 25px;">40,000,000</h3>
                                <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Tổng giá trị tồn kho</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">Mã hàng</th>
                    <th class="text-center">Tên hàng hóa</th>
                    <th class="text-center">SL</th>
                    <th class="text-center">Vốn tồn kho</th>
                    <th class="text-center">Giá trị tồn</th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="9" class="text-center"><img src="public/templates/backend/images/balls.gif"/></td></tr>
                </tbody>
            </table>
            <div class="alert alert-info summany-info clearfix" role="alert">
                <div class="sm-info pull-left padd-0"></div>
                <div class="pull-right">

                </div>
            </div>

        </div>
    </div>
</div>