<div class="products">
    <div class="panel-action">
        <div class="row">
            <div class="products-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2><i class="fa fa-refresh" style="font-size: 14px; cursor: pointer;" onclick="cms_vcrproduct('1')"></i>Tạo hàng hóa</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary"  onclick="cms_add_product( 'save' );"><i class="fa fa-check"></i> Lưu</button>
                            <button type="button" class="btn btn-primary "  onclick="cms_add_product( 'saveandcontinue' );"><i class="fa fa-floppy-o"></i> Lưu và tiếp tục</button>
                            <button type="button" class="btn btn-default" onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i class="fa fa-arrow-left"></i> Trở về</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space customer"></div>

    <div class="products-content" style="margin-bottom: 25px;">
        <div class="basic-info">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 padd-0">
                        <h4>Thông tin cơ bản</h4>
                        <small>Nhập tên và các thông tin cơ bản của hàng hóa</small>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group">
                                <label>Tên hàng hóa</label>
                                <input type="text" id="prd_name" value="" class="form-control" placeholder="Nhập tên hàng hóa"/>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Số lượng(kg)</label>
                                    <input type="text" id="prd_sls"  value="" placeholder="0" class="form-control text-right txtboxToFilter" />
                                </div>
                                <div class="col-md-6">
                                    <label class="checkbox" style="display: block;"><input type="checkbox" id="prd_inventory"  class="checkbox" name="confirm" value=""><span></span> Theo dõi tồn kho?</label>
<!--                                    <label class="checkbox"><input type="checkbox" id="prd_allow_negative"  class="checkbox" name="confirm" value=""><span></span> Cho phép bán âm?</label>-->
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Giá vốn</label>
                                    <input type="text" id="prd_origin_price" value="" class="form-control text-right txtboxToFilter" placeholder="Nhập giá vốn" />
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Giá bán</label>
                                    <input type="text" id="prd_sell_price" value="" class="form-control txtboxToFilter text-right"  placeholder="0"/>
                                </div>

                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Nhóm hàng</label>
                                    <div class="col-md-11 padd-0">
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
                                                <option value="1" selected>Chưa có nhóm hàng</option>
                                            </optgroup>
                                            <optgroup label="------------------------">
                                                <option data-toggle="modal" data-target="#list-prd-group">Tạo mới nhóm hàng</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-1 padd-0">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#list-prd-group" style="border-radius: 0 3px 3px 0; box-shadow: none;">...</button>
                                    </div>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Chủng loại</label>
                                    <div class="col-md-11 padd-0">
                                        <select class="form-control" id="prd_category_id">
                                            <optgroup label="Chọn nhóm hàng">
                                                <?php if ( isset( $data[ '_prd_category' ] ) && count( $data[ '_prd_category' ] ) ):
                                                    foreach ( $data[ '_prd_category' ] as $key => $val ) :
                                                        if( $key == 1) continue;
                                                        ?>
                                                        <option value="<?php echo $val['ID']; ?>"><?php echo $val['prd_cat_name'];  ?></option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                                <option value="-1" selected>Chưa có chủng loại</option>
                                            </optgroup>
                                            <optgroup label="------------------------">
                                                <option data-toggle="modal" data-target="#list-prd-category">Tạo mới chủng loại</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-1 padd-0">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#list-prd-category" style="border-radius: 0 3px 3px 0; box-shadow: none;">...</button>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Mã hàng hóa</label>
                                    <input type="text"  class="form-control" disabled placeholder="Mã hàng hóa hệ thống tự sinh."/>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Thuế VAT</label>
                                    <select class="form-control" id="prd_vat">
                                        <option value="0">Không tính thuế</option>
                                        <option value="0">0%</option>
                                        <option value="5">5%</option>
                                        <option value="10">10%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="expand-info">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="border-bottom: 1px solid #0B87C9; padding-bottom: 10px;"><i class="fa fa-th-large blue"></i> <a style="color: #0B87C9; text-decoration: none;" data-toggle="collapse" href="#collapseproductinfo" aria-expanded="false" aria-controls="collapseExample">Thông tin mở rộng(<small> Nhấn để thêm các thông tin cho thuộc tính web</small>)</a></h4>
                </div>
                <div class="col-md-12">
                    <div style="margin-top: 5px;"></div>
                    <div class="collapse" id="collapseproductinfo">
                        <div class="col-md-4 padd-0">
                            <h4>Mô tả chi tiết</h4>
                            <small">Hình ảnh và mô tả hàng hóa.</small>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12 padd-0">
                                    <div class="jumbotron text-center" id="img_upload" style="border-radius: 0; margin-bottom: 10px; padding: 15px 20px;">
                                        <h3>Upload hình ảnh hàng hóa</h3>
                                        <small style="font-size: 14px; margin-bottom: 5px; display: inline-block;">(Để tải và hiện thị nhanh, mỗi ảnh lên có dung lượng 500KB. Tải tối đa 10MB.)</small>
                                        <p><button class="btn" style="background-color: #337ab7; " onclick="browseKCFinder('img_upload','image');return false;"><i class="fa fa-picture-o" style="font-size: 40px;color: #fff; "></i></button></p>
                                    </div>
                                </div>
                                <div class="col-md-12 padd-0">
                                  <h4 style="margin-top: 0;">Mô tả  <small style="font-style: italic;">(Nhập thông tin mô tả chi tiết hơn để khách hàng hiểu hàng hoá của bạn)</small></h4>
                                  <textarea class="tiny_editor" id="prd_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 padd-0">
                            <h4>Thông tin cho web</h4>
                            <small">Hiện thị trên trang web, tối ưu SEO.</small>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="checkbox-group" style="margin-top: 20px;">
                                    <label class="checkbox"><input type="checkbox"  class="checkbox" id="display_website"><span></span> Hiện thị ra website</label>
                                    <br>
                                    <label class="checkbox"><input type="checkbox" id="prd_highlight" class="checkbox" ><span></span> Nổi bật</label>&nbsp;&nbsp;<label class="checkbox"><input type="checkbox"  class="checkbox" id="prd_new"><span></span> Hàng mới</label>&nbsp;&nbsp;&nbsp;<label class="checkbox"><input type="checkbox"  class="checkbox" id="prd_hot"><span></span> Đang bán chạy</label>
                                </div>
                            </div>
                            <div class="btn-groups pull-right" style="margin-top: 15px;">
                                <button type="button" class="btn btn-primary"  onclick="cms_add_product( 'save' );"><i class="fa fa-check"></i> Lưu</button>
                                <button type="button" class="btn btn-primary "  onclick="cms_add_product( 'saveandcontinue' );"><i class="fa fa-floppy-o"></i> Lưu và tiếp tục</button>
                                <button type="button" class="btn btn-default btn-back" onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i class="fa fa-arrow-left"></i> Trở về</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
