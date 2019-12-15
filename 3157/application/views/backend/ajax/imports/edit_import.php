
<div class="panel-action">
    <div class="row">
        <div class="orders-act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2>Phiếu nhập &raquo;<span style="font-style: italic; font-weight: 400; font-size: 16px;">EX_PN0000<?php echo $data['_import']['ID']; ?></span></h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-action text-right">
                    <div class="btn-groups">
                        <button type="button" class="btn btn-primary" name="" onclick="cms_vsell_import();"><i class="fa fa-plus"></i> Tạo phiếu nhập</button>
                        <button type="button" class="btn btn-primary" name="" onclick=""><i class="fa fa-print"></i> In phiếu nhập</button>
                        <button type="button" class="btn btn-default" onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i class="fa fa-arrow-left"></i> Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-space orders-space"></div>

<div class="orders-content">
    <div class="row">
        <div class="col-md-8">
                <table class="table table-bordered table-striped" style="margin-top: 30px;">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th>Mã hàng</th>
                        <th>Tên hàng hóa</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Giá gốc</th>
                        <th class="text-center">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if( isset( $_list_products) && count($_list_products ) ) :
                        $nstt = 1;
                        foreach($_list_products as $product ) :
                        ?>
                        <tr data-id="<?php echo $product['ID']; ?>">
                            <td class="text-center"><?php echo $nstt++; ?></td>
                            <td>SP0000<?php echo $product['ID']; ?></td>
                            <td><?php echo $product['prd_name']; ?></td>
                            <td class="text-center" style="max-width: 30px;"><?php echo $product['count']; ?> </td>
                            <td class="text-center price-order"><?php echo cms_currency_format($product['prd_origin_price']); ?></td>
                            <td class="text-center total-money"><?php echo cms_currency_format($product['prd_origin_price'] * $product['count']); ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="lighter">
                        <i class="fa fa-info-circle blue"></i>
                        Thông tin phiếu nhập
                    </h4>
                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Mã phiếu</label>
                                </div>
                                <div class="col-md-8">
                                    EX_0000<?php echo $data['_import'][ 'ID' ]; ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4 padd-right-0">
                                    <label>Nhà cung cấp</label>
                                </div>
                                <div class="col-md-8" style="font-style: italic;">
                                    <?php echo cms_getNamemanufacturebyID( $data['_import']['id_manuf'] ); ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Ngày nhập</label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo ($data['_import']['input_date'] != '0000-00-00 00:00:00') ? gmdate("H:i d/m/Y", strtotime(str_replace('-','/',$data['_import']['input_date'])) + 7*3600):'-'; ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Ngườ nhập</label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo cms_getNameAuthbyID($data['_import']['user_init'] ); ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Ghi chú</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea readonly id="note-order" cols="" class="form-control" rows="3" style="border-radius: 0;"><?php echo $data['_import']['notes']; ?></textarea>

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
                                        <input disabled type="radio" class="payment-method" name="method-pay" value="1" <?php echo ($data['_import']['payment_method'] == 1) ? 'checked' : ''; ?>> Tiền mặt &nbsp;
                                        <input disabled type="radio" class="payment-method" name="method-pay" value="2" <?php echo ($data['_import']['payment_method'] == 2) ? 'checked' : ''; ?>> Thẻ&nbsp;
                                    </div>

                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tiền hàng</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <?php echo $data['_import'][ 'total_money' ]; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tiền thuế</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">0</div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4 padd-right-0">
                                    <label>Chiết khấu</label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo cms_currency_format($data['_import'][ 'discount']); ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tổng cộng</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                    <?php echo cms_currency_format( (int)str_replace(",","",$data['_import'][ 'total_money' ]) - $data['_import'][ 'discount']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4 padd-right-0">
                                    <label>Thanh toán</label>
                                </div>
                                <div class="col-md-8 orange">
                                    <?php echo cms_currency_format($data['_import'][ 'payed']); ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Còn nợ</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <?php echo $data['_import'][ 'lack']; ?>
                                    </div>
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