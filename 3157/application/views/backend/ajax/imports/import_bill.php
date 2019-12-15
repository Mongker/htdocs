
    <div class="panel-action">
        <div class="row">
            <div class="orders-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Tạo phiếu nhập &raquo;</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" name="" onclick="cms_save_import('saved_termp')"><i class="fa fa-floppy-o"></i> Lưu tạm</button>
                            <button type="button" class="btn btn-primary" name="" onclick="cms_save_import('save')"><i class="fa fa-check"></i> Lưu</button>
                            <button type="button" class="btn btn-primary" name=""><i class="fa fa-print"></i> Lưu và in</button>
                            <button type="button" class="btn btn-default" onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i class="fa fa-arrow-left"></i> Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space orders-space"></div>

    <div class="orders-content check-order">
        <div class="row">
            <div class="col-md-8">
                <div class="order-search" style="margin: 10px 0px; position: relative;">
                    <input type="text" class="form-control" placeholder="Nhập mã hàng hóa hoặc tên hàng hóa" id="search-pro-box">
                    <div id="pro-suggestion-box" style="border: 1px solid #444; display: none; overflow-y: auto;background-color: #fff; z-index: 2 !important; position: absolute; left: 0; width: 100%; padding: 5px 0px; max-height: 400px !important;"><div class="search-pro-inner"></div></div>
                </div>
                <div class="product-results">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Mã hàng</th>
                                <th>Tên hàng hóa</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Giá gốc</th>
                                <th class="text-center">Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="pro_search_append">
                        </tbody>
                    </table>
                    <div class="alert alert-success" style="margin-top: 30px;" role="alert">Gõ mã hoặc tên hàng hóa vào hộp tìm kiếm để thêm hàng vào đơn hàng</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="lighter">
                            <i class="fa fa-info-circle blue"></i>
                            Thông tin hóa đơn
                        </h4>
                        <div class="morder-info" style="padding: 4px;">
                            <div class="tab-contents" style="padding: 8px 6px;">
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Mã phiếu</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" disabled type="text" placeholder="Hệ thống tự tạo.">
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4 padd-right-0">
                                        <label>Nhà cung cấp</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-10 padd-0" style="position: relative;">
                                            <input id="search-box-mas" class="form-control" type="text" placeholder="Tìm nhà cung cấp" style="border-radius: 3px 0 0 3px !important;"><span style="color: red; position: absolute; right: 5px; top:5px; " class="del-mas"></span>
                                            <div id="mas-suggestion-box" style="border: 1px solid #444; display: none; overflow-y: auto;background-color: #fff; z-index: 2 !important; position: absolute; left: 0; width: 100%; padding: 5px 0px; max-height: 400px !important;"><div class="search-mas-inner"></div></div>
                                        </div>
                                        <div class="col-md-2 padd-0">
                                            <button type="button" data-toggle="modal" data-target="#create-manuf" class="btn btn-primary" style="border-radius: 0 3px 3px 0; box-shadow: none; padding: 7px 11px;">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Ngày nhập</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="date-order" class="form-control datepk" type="text" placeholder="Hôm nay" style="border-radius: 0 !important;">
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Ngườ nhập</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="" id="" class="form-control">
                                            <option value="1"><?php if( isset($data['user'] ) ) echo $data['user']['display_name']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Ghi chú</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="note-order" cols="" class="form-control" rows="3" style="border-radius: 0;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 class="lighter" style="margin-top: 0;">
                            <i class="fa fa-info-circle blue"></i>
                            Thông tin thanh toán
                        </h4>
                        <div class="morder-info" style="padding: 4px;">
                            <div class="tab-contents" style="padding: 8px 6px;">
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Hình thức</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="radio" class="payment-method" name="method-pay" value="1" checked> Tiền mặt &nbsp;
                                            <input type="radio" class="payment-method" name="method-pay" value="2"> Thẻ&nbsp;
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Tiền hàng</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="monney-order">
                                            0
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Tiền thuế</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="tax">0</div>
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4 padd-right-0">
                                        <label>Chiết khấu</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control text-right txtboxToFilter txtmonney discount-import" placeholder="0"  style="border-radius: 0 !important;">
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Tổng cộng</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="count_money_import">
                                            0
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4 padd-right-0">
                                        <label>Thanh toán</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control text-right txtboxToFilter txtmonney payed-order" placeholder="0"  style="border-radius: 0 !important;">
                                    </div>
                                </div>
                                <div class="form-group marg-bot-10 clearfix">
                                    <div class="col-md-4">
                                        <label>Còn nợ</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="owe-order">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                            <button type="button" class="btn btn-primary" name="" onclick="cms_save_import('saved_termp')"><i class="fa fa-floppy-o"></i> Lưu tạm</button>
                            <button type="button" class="btn btn-primary" name="" onclick="cms_save_import('save')"><i class="fa fa-check"></i> Lưu</button>
                            <button type="button" class="btn btn-primary" name=""><i class="fa fa-print"></i> Lưu và in</button>
                            <button type="button" class="btn btn-default btn-back" onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i class="fa fa-arrow-left"></i> Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>