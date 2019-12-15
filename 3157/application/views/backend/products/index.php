<div class="products">
    <div class="panel-action">
        <div class="row">
            <div class="products-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Hàng Hóa</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" onclick="cms_vcrproduct('1')"><i class="fa fa-plus"></i> Tạo hàng hóa</button>
                            <button type="button" class="btn btn-success"><i class="fa fa-download"></i> Xuất Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space orders-space"></div>

    <div class="products-content">
        <div class="product-sear panel-sear">
            <form action="" class="">
                <div class="form-group col-md-5 padd-0">
                    <input type="text" class="form-control" placeholder="Nhập mã hàng hóa hoặc tên hàng hóa" id="search-pro-box">
                    <div id="pro-suggestion-box" style="border: 1px solid #444; display: none; overflow-y: auto;background-color: #fff; z-index: 2 !important; position: absolute; left: 0; width: 100%; padding: 5px 0px; max-height: 400px !important;"><div class="search-pro-inner"></div></div>
                </div>
                <div class="form-group col-md-7 ">
                    <div class="col-md-3 padd-0" style="margin-right: 10px;">
                        <select class="form-control" id="search-option-1">
                            <option value="0">Hàng đang kinh doanh</option>
                            <option value="1">Hàng đã ngừng kinh doanh</option>
                            <option value="2">Hàng đã xóa</option>
                        </select>
                    </div>
                    <div class="col-md-3 padd-0" style="margin-right: 10px;">
                        <select class="form-control search-option-2" id="prd_group_id">
                            <option value="1" selected>-- Tất cả các nhóm hàng --</option>
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
                            </optgroup>


                        </select>
                    </div>
                    <div class="col-md-3 padd-0" style="margin-right: 10px;">
                        <select class="form-control search-option-3" id="prd_category_id">
                            <option value="-1" selected="selected">-- Tất cả chủng loại --</option>
                            <optgroup label="Chọn chủng loại">
                                <?php if ( isset( $data[ '_prd_category' ] ) && count( $data[ '_prd_category' ] ) ):
                                    foreach ( $data[ '_prd_category' ] as $key => $val ) :
                                        if( $key == 1) continue;
                                        ?>
                                        <option value="<?php echo $val['ID']; ?>"><?php echo $val['prd_cat_name'];  ?></option>
                                    <?php
                                    endforeach;
                                endif;
                                ?>

                            </optgroup>
                            <option value="-1">Chưa có chủng loại</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary btn-large btn-smanuf" name="" onclick="cms_upManuf()"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
            </form>
        </div>
        <div class="product-main-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"  class="checkbox chkAll"><span></span></label></th>
                        <th class="text-center">Tên Hàng hóa</th>
                        <th class="text-center">Mã hàng hóa</th>
                        <th class="text-center">SL</th>
                        <th class="text-center">Giá bán</th>
                        <th class="text-center">Nhóm hàng</th>
                        <th class="text-center">Chủng loại</th>
                        <th class="text-center">Hình ảnh</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <tr><td colspan="9" class="text-center"><img src="public/templates/backend/images/balls.gif"/></td></tr>

                </tbody>
            </table>
            <div class="alert alert-info summany-info clearfix" role="alert">
                <div class="sm-info pull-left padd-0">SL hàng hóa/SL chủng loại: <span>0/0</span></div>
                <div class="pull-right">
                </div>
            </div>

        </div>
    </div>
</div>