<div class="customer-manufacture">
    <div class="panel-action">
        <div class="row">
            <div class="customer-act act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Khách hàng</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-cust"><i class="fa fa-plus"></i> Tạo KH</button>
                            <button type="button" class="btn btn-success" name="" onclick=""><i class="fa fa-download"></i> Xuất Excel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="manufacture-act act" style="display: none;">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Nhà cung cấp</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-manuf"><i class="fa fa-plus"></i>Tạo NCC</button>
                            <button type="button" class="btn btn-success" name=""><i class="fa fa-download"></i> Xuất Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space customer"></div>

    <div class="">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tab-setting" role="tablist" style="padding-left: 20px;">
            <li role="presentation" class="active" onclick="tab_click_act( 'customer' );"><a href="#customer" aria-controls="customer" role="tab" data-toggle="tab"><i class="fa fa-user"></i> Khách hàng</a></li>
            <li role="presentation" onclick="tab_click_act( 'manufacture' );"><a href="#manufacture" aria-controls="manufacture" role="tab" data-toggle="tab"><i class="fa fa-truck"></i> Nhà cung cấp</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="customer">
                <div class="customer-sear panel-sear">
                    <form action="" class="">
                        <div class="form-group col-md-6 padd-0">
                            <input type="text" class="form-control txt-scustomer" placeholder="Nhập tên, mã hoặc SDT khách hàng">
                        </div>
                        <div class="form-group col-md-6 ">
                            <div class="col-md-4 padd-0" style="margin-right: 10px;">
                                <select name="" class="form-control">
                                    <option value="0">Tất cả</option>
                                    <option value="1">KH từng mua hàng</option>
                                    <option value="2">KH còn nợ</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary btn-large btn-sCustomer" name=""><i class="fa fa-search"></i> Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                <div class="customer-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Mã KH</th>
                            <th class="text-center">Tên KH</th>
                            <th class="text-center">Điện thoại</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Lần cuối mua hàng</th>
                            <th class="text-center" style="background-color: #fff;">Tổng tiền hàng</th>
                            <th class="text-center">Nợ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="ajax-loadlist-customer">
                        <?php if ( isset( $_list_customer ) && count( $_list_customer ) ) :
                            foreach ( $_list_customer as $key => $item ) :
                                ?>
                                <tr id="tr-item-<?php echo $item['ID']; ?>">
                                    <td class="text-center tr-detail-item" style="cursor: pointer; color: #1b6aaa;"><?php echo 'KHQ000'.$item[ 'ID' ]; ?></td>
                                    <td class="text-center tr-detail-item" style="cursor: pointer; color: #1b6aaa;"><?php echo $item[ 'customer_name' ]; ?></td>
                                    <td class="text-center"><?php echo ( !empty( $item[ 'customer_phone' ] ) ) ? $item[ 'customer_phone' ] :
                                            '-'; ?></td>
                                    <td class="text-center"><?php echo ( !empty( $item[ 'customer_addr' ] ) ) ? $item[ 'customer_addr' ] :
                                            '-'; ?></td>
                                    <td class="text-center">-</td>
                                    <td class="text-right" style="font-weight: bold; background-color: #f9f9f9;">0</td>
                                    <td class="text-right">0</td>
                                    <td class="text-center"><i class="fa fa-trash-o" style="cursor:pointer;" onclick="cms_delCustomer(<?php echo $item[ 'ID' ]; ?>);"></i></td>
                                </tr>
                                <?php
                            endforeach;
                        else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Không có dữ liệu</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="alert alert-info summany-info clearfix" role="alert">
                        <div class="sm-info pull-left padd-0">Số khách hàng: <span><?php echo (isset($_total_customer) && !empty($_total_customer) ) ? $_total_customer : '0'; ?></span> Tổng tiền: <span>0 đ</span> Tổng nợ: <span>0 đ</span></div>
                        <div class="pull-right">
                            <?php  echo $_pagination_link; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Function -->
            <div role="tabpanel" class="tab-pane" id="manufacture">
                <div class="manuf-sear panel-sear">
                    <form action="" class="">
                        <div class="form-group col-md-6 padd-0">
                            <input type="text" class="form-control txt-smanuf" placeholder="Nhập tên, mã hoặc SDT Nhà cung cấp">
                        </div>
                        <div class="form-group col-md-6 ">
                            <div class="col-md-4 padd-0" style="margin-right: 10px;">
                                <select name="" class="form-control">
                                    <option value="0">Tất cả</option>
                                    <option value="1">NCC từng nhập hàng</option>
                                    <option value="2">Còn nợ NCC</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary btn-large btn-smanuf" name="" onclick="cms_upManuf()"><i class="fa fa-search"></i> Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                <div class="manuf-body">

                </div>

            </div>
        </div>

    </div>
</div>
