<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success text-center text-capitalize" role="alert">Chào mừng bạn đến với hệ thông quản lý bán hàng doanh nghiệp tư nhân kim khí Quang Na</div>
    </div>
</div>

<div class="row">
    <div class="report">
        <div class="col-md-12"> <h4 class="dashboard-title"><i class="fa fa-signal"></i>Hoạt động hôm nay</h4></div>
        <div class="col-md-3">
            <div class="report-box box-green">
                <div class="infobox-icon">
                    <i class="fa fa-signal"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Tiền bán hàng</h3>
                    <span class="infobox-data-number text-center"><?php echo (isset($tongtien) ) ? cms_currency_format($tongtien) : '0'; ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-box box-blue">
                <div class="infobox-icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Số đơn hàng:</h3>
                    <span class="infobox-data-number text-center"><?php echo (isset($slsorders) ) ? cms_currency_format($slsorders) : '0'; ?></span>
                    <h3 class="infobox-title">Số hàng hóa:</h3>
                    <span class="infobox-data-number text-center"><?php echo (isset($slsitem) ) ? cms_currency_format($slsitem) : '0'; ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-box box-red">
                <div class="infobox-icon">
                    <i class="fa fa-undo"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Hàng khách trả</h3>
                    <span class="infobox-data-number">0</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-box box-orange">
                <div class="infobox-icon">
                    <i class="fa fa-cloud"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Đơn hàng web</h3>
                    <span class="infobox-data-number">0</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="background: #efefef; margin: 20px 0; overflow: hidden; ">
    <div class="col-md-4">
        <div class="widget widget-blue">
            <div class="widget-header">
                <h3 class="widget-title"> <i class="fa fa-signal"></i>Hoạt động</h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="info col-xs-7">Tiền bán hàng</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($tongtien) ) ? cms_currency_format($tongtien) : '0'; ?></div>
                    <div class="info col-xs-7">Số đơn hàng</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($slsorders) ) ? cms_currency_format($slsorders) : '0'; ?></div>
                    <div class="info col-xs-7">Số hàng hóa</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($slsitem) ) ? cms_currency_format($slsitem) : '0'; ?></div>
                    <div class="info col-xs-7">Khách hàng trả</div>
                    <div class="info col-xs-5 data text-right">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget widget-orange">
            <div class="widget-header">
                <h3 class="widget-title"> <i class="fa fa-tags"></i>Thông tin kho</h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="info col-xs-7">Tồn kho</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($slsinventory) ) ? cms_currency_format($slsinventory) : '0'; ?></div>
                    <div class="info col-xs-7">Hết Hàng</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($slsaceitem) ) ? cms_currency_format($slsaceitem) : '0'; ?></div>
                    <div class="info col-xs-7">Sắp hết hàng</div>
                    <div class="info col-xs-5 data text-right">0</div>
                    <div class="info col-xs-7">Vượt định mức</div>
                    <div class="info col-xs-5 data text-right">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget widget-green">
            <div class="widget-header">
                <h3 class="widget-title"> <i class="fa fa-barcode"></i>Thông tin hàng hóa</h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="info col-xs-7">Hàng hóa/Chủng loại</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($data['_sl_product'])) ? $data['_sl_product']: 0; ?>/<?php echo (isset($data['_sl_category'])) ? $data['_sl_category']: 0; ?></div>
                    <div class="info col-xs-7">Chưa làm giá bán</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($lamgiaban) ) ? cms_currency_format($lamgiaban) : '0'; ?></div>
                    <div class="info col-xs-7">Chưa nhập giá mua</div>
                    <div class="info col-xs-5 data text-right"><?php echo (isset($lamgiamua) ) ? cms_currency_format($lamgiamua) : '0'; ?></div>
                    <div class="info col-xs-7">Hàng chưa phân loại</div>
                    <div class="info col-xs-5 data text-right">0</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin: 20px 0; overflow: hidden; ">
    <div class="chart-report">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-signal"></i>Biểu đồ doanh số tuần </div>
                    <div class="panel-body">
                        Đang xây dựng - coming soon
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-cloud"></i>Thông tin từ web</div>
                    <div class="panel-body">
                        Đang xây dựng - coming soon
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-rss"></i>Tin chuyên ngành </div>
                    <div class="panel-body">
                        Đang xây dựng - coming soon
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

