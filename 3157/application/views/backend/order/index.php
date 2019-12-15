<div class="orders">
    <div class="panel-action">
        <div class="row">
            <div class="orders-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Đơn hàng</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" name="" onclick="cms_vsell_order();"><i class="fa fa-shopping-cart"></i> Đặt hàng</button>
                            <button type="button" class="btn btn-primary" name="" onclick="cms_vsell_order();"><i class="fa fa-desktop"></i> Bán hàng</button>
                            <button type="button" class="btn btn-success" name=""><i class="fa fa-download"></i> Xuất Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space orders-space"></div>

    <div class="orders-content">
        <div class="product-sear panel-sear">
            <form action="" class="">
                <div class="form-group col-md-4 padd-0">
                    <input type="text" class="form-control txt-smanuf" placeholder="Nhập mã đơn hàng hoặc thông tin khách hàng( mã, họ tên, SDT ) và nhấn Enter">
                </div>
                <div class="form-group col-md-8 padd-0" style="padding-left: 5px;">
                    <div class="col-md-5 padd-0">
                        <div class="col-md-7 padd-0">
                            <select name="" class="form-control">
                                <option value="0">Đơn hàng</option>
                                <option value="1">Đơn hàng đã xóa</option>
                                <option value="2">Đơn hàng còn nợ</option>
                            </select>
                        </div>
                        <div class="col-md-5 padd-0" style="padding-left: 5px;">
                            <button style="box-shadow: none;" type="button" class="btn btn-primary btn-large" name="" onclick=""><i class="fa fa-search"></i> Tìm kiếm</button>
                        </div>
                    </div>
                    <div class="col-md-7 padd-0" style="padding-left: 1px;">
                        <div class="col-md-7 padd-0">
                            <div class="row">
                                <div class="col-md-5 padd-0 input-icon">
                                    <input type="text" class="form-control datepk" name="datefrom1" placeholder="Từ ngày" />
                                    <i class="fa fa-calendar icon-right datepk" style="font-size: 20px; height: 100%;"></i>
                                </div>
                                <div class="col-md-1 padd-0 text-center">
                                    <span style="vertical-align: middle;">-</span>
                                </div>
                                <div class="col-md-5 padd-0 input-icon">
                                    <input type="text" class="form-control datepk" name="datefrom2" placeholder="Đến ngày" >
                                    <i class="fa fa-calendar icon-right datepk" style="font-size: 20px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 padd-0">
                            <div class="btn-group order-btn-calendar">
                                <button type="button" class="btn btn-default">Tuần</button>
                                <button type="button" class="btn btn-default">Tháng</button>
                                <button type="button" class="btn btn-default">Quý</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="orders-main-body">
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="9" class="text-center"><img src="public/templates/backend/images/balls.gif"/></td></tr>
                </tbody>
            </table>
            <div class="alert alert-info summany-info clearfix" role="alert">
                <div class="sm-info pull-left padd-0">Tổng số hóa đơn: <span>0</span> Tổng tiền: <span>0</span> Tổng nợ: <span>0</span></div>
                <div class="pull-right">
                </div>
            </div>

        </div>
    </div>
</div>