<div class="alert alert-dange ajax-error" role="alert"><span style="font-weight: bold; font-size: 18px;">Thông báo!</span><br><div class="ajax-error-ct"></div></div>
<div class="alert ajax-success" role="alert" style="width: 350px;background: rgba(92,130,79,0.9); display:none; color: #fff;"><span style="font-weight: bold; font-size: 18px;">Thông báo!</span>
<br><div class="ajax-success-ct"></div></div>
<!-- Start create employee -->
<div class="modal fade" id="create-nv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;"><i class="fa fa-user"></i> Thêm tài khoản đăng nhập </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="frm-cruser">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="tennhanvien">Tên nhân viên</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="display_name" name="display_name" class="form-control" value="" placeholder="Nhập tên nhân viên">
                            <span style="color: red; font-style: italic;" class="error error-display_name"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manv">Mã nhân viên</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="manv" name="manv" class="form-control" value="" placeholder="Nhập mã nhân viên">
                            <span style="color: red; font-style: italic;" class="error error-manv"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manv">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="mail" name="email" class="form-control" value="" placeholder="Nhập email của bạn">
                            <span style="color: red; font-style: italic;" class="error error-mail"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manv">Mật khẩu</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="password" id="password" name="password" class="form-control" value="" placeholder="Nhập Mật khẩu">
                            <span style="color: red; font-style: italic;" class="error error-password"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 padd-right-0">
                            <label for="manv">Nhóm người dùng</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="group-user">
                                <div class="group-selbox">

                                </div>
                                <span style="color: red; font-style: italic;" class="error error-group"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="stock">Kho làm việc</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="stock-selbox"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crnv" onclick="cms_cruser()"><i class="fa fa-check"></i> Lưu</button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Bỏ qua</button>
            </div>
        </div>
    </div>
</div>
<!-- end create employee -->

<!-- Start create function -->
<div class="modal fade" id="create-func" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;"><i class="fa fa-user"></i> Thêm Chức năng </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="tennhanvien">URL</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="permisstion_url" name="permisstion_url" class="form-control" value="" placeholder="Nhập url cho phép của chức năng">
                            <span style="color: red; font-style: italic;" class="error error-permisstion_url"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manv">Tên chức năng</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="permisstion_name" name="permisstion_name" class="form-control" value="" placeholder="Nhập tên chức năng">
                            <span style="color: red; font-style: italic;" class="error error-permisstion_name"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crfunc"><i class="fa fa-check"></i> Lưu</button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Bỏ qua</button>
            </div>
        </div>
    </div>
</div>
<!-- end create function -->

<!-- Start create group -->
<div class="modal fade" id="create-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;"><i class="fa fa-user"></i> Thêm nhóm người dùng </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="group-name">Tên Nhóm</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="group-name" name="group_name" class="form-control" value="" placeholder="Nhập tên nhóm người dùng">
                            <span style="color: red; font-style: italic;" class="error error-group_name"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crgroup"><i class="fa fa-check"></i> Lưu</button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Bỏ qua</button>
            </div>
        </div>
    </div>
</div>
<!-- end create function -->

<!-- start create customer -->

<div class="modal fade" id="create-cust" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tạo mới khách hàng</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="frm-crcust">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_name">Tên Khách hàng</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_name" name="customer_name" class="form-control" value="" placeholder="Nhập tên khách hàng( bắc buộc )">
                            <span style="color: red; font-style: italic;" class="error error-customer_name"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_phone">Số điện thoại</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_phone" name="customer_phone" class="form-control txtboxToFilter" value="" placeholder="">
                            <span style="color: red; font-style: italic;" class="error error-customer_phone"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_email">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_email" name="customer_email" class="form-control" value="" placeholder="Nhập email khách hàng ( ví dụ: kh10@gmail.com )">
                            <span style="color: red; font-style: italic;" class="error error-customer_email"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_addr">Địa chỉ</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_addr" name="customer_addr" class="form-control timepiker" value="" placeholder="">
                            <span style="color: red; font-style: italic;" class="error error-customer_addr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_notes">Ghi chú</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_notes" name="customer_notes" class="form-control" value="" placeholder="">
                            <span style="color: red; font-style: italic;" class="error error-customer_notes"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_birthday">Sinh nhật</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_birthday" name="customer_birthday" class="form-control txttimes" value="" placeholder="dd/mm/yyyy">
                            <span style="color: red;" class="error error-customer_birthday"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_gender">Giới tính</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="radio" name="gender" checked class="customer_gender" value="0"> Nam
                            <input type="radio" name="gender" class="customer_gender" value="1"> Nữ
                            <span style="color: red; font-style: italic;" class="error error-customer_gender"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crcust" onclick="cms_crCustomer();"><i class="fa fa-check"></i> Lưu</button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Bỏ qua</button>
            </div>
        </div>
    </div>
</div>

<!-- end customer -->

<!-- start create manufacture -->

<div class="modal fade" id="create-manuf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tạo mới nhà cung cấp</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="frm-crmanuf">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manuf_name">Tên NCC</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="manuf_name" name="manuf_name" class="form-control" value="" placeholder="Nhập tên nhà cung cấp( bắc buộc )">
                            <span style="color: red; font-style: italic;" class="error error-manuf_name"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manuf_phone">Số điện thoại</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="manuf_phone" name="manuf_phone" class="form-control txtboxToFilter" value="" placeholder="">
                            <span style="color: red; font-style: italic;" class="error error-manuf_phone"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manuf_email">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="manuf_email" name="manuf_email" class="form-control" value="" placeholder="Nhập email nhà cung cấp ( ví dụ: kh10@gmail.com )">
                            <span style="color: red; font-style: italic;" class="error error-manuf_email"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manuf_addr">Địa chỉ</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="manuf_addr txttimestart" name="manuf_addr" class="form-control timepiker" value="" placeholder="">
                            <span style="color: red; font-style: italic;" class="error error-manuf_addr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="tax_code">Mã số thuế</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="tax_code" name="tax_code" class="form-control" value="" placeholder="">
                            <span style="color: red; font-style: italic;" class="error error-tax_code"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="manuf_notes">Ghi chú</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="manuf_notes" name="notes" class="form-control" value="" placeholder="">
                            <span style="color: red; font-style: italic;" class="error error-manuf_notes"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crmanuf" onclick="cms_crManuf();"><i class="fa fa-check"></i> Lưu</button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Bỏ qua</button>
            </div>
        </div>
    </div>
</div>

<!-- end manufacture -->

<!-- PRODUCTS -->
<div class="modal fade" id="list-prd-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Quản lý chủng loại</h4>
            </div>
            <div class="modal-body">
               <div class="tabtable">
                   <!-- Nav tabs -->
                   <ul class="nav nav-tabs tab-setting" role="tablist" style="background-color: #EFF3F8; padding: 5px 0 0 15px;">
                       <li role="presentation" class="active list-category-click" style="margin-right: 3px;"><a  href="#list-category" aria-controls="list-category" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Danh sách chủng loại</a></li>
                       <li role="presentation"><a href="#create-category" aria-controls="create-category" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tạo mới chủng loại</a></li>
                   </ul>

                   <!-- Tab panes -->
                   <div class="tab-content" style="padding:10px; border: 1px solid #ddd; border-top: none;">
                       <div role="tabpanel" class="tab-pane active" id="list-category">
                           <div class="prd_category-body">

                           </div>
                       </div>

                       <!-- Tab Function -->
                       <div role="tabpanel" class="tab-pane" id="create-category">
                           <div class="row form-horizontal">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <div class="col-md-7 padd-right-0">
                                           <input type="text" style="border-radius: 0 !important;" class="form-control" id="prd_cat_name" value="" placeholder="Nhập tên chủng loại">
                                       </div>
                                       <div class="input-groups-btn col-md-5 padd-0">
                                           <button type="button" class="btn btn-primary"  style="border-radius: 0 3px 3px 0;" onclick="cms_prd_category();"><i class="fa fa-check"></i> Lưu</button>
                                           <button type="button" class="btn btn-primary "  onclick=""><i class="fa fa-floppy-o"></i> Lưu và tiếp tục</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Đóng</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="list-prd-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Quản lý nhóm hàng</h4>
            </div>
            <div class="modal-body">
               <div class="tabtable">
                   <!-- Nav tabs -->
                   <ul class="nav nav-tabs tab-setting" role="tablist" style="background-color: #EFF3F8; padding: 5px 0 0 15px;">
                       <li role="presentation" class="active" style="margin-right: 3px;"><a href="#list-groups" aria-controls="list-group" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Danh sách nhóm hàng</a></li>
                       <li role="presentation"><a href="#create-groups" aria-controls="create-group" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tạo mới nhóm hàng</a></li>
                   </ul>

                   <!-- Tab panes -->
                   <div class="tab-content" style="padding:10px; border: 1px solid #ddd; border-top: none;">
                       <div role="tabpanel" class="tab-pane active" id="list-groups">
                           <div class="prd_group-body">
                               <div class="text-center"><img src="public/templates/backend/images/balls.gif"/></div>
                           </div>
                       </div>

                       <!-- Tab Function -->
                       <div role="tabpanel" class="tab-pane" id="create-groups">
                           <div class="row form-horizontal">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <div class="col-md-4 text-right">
                                           <label>Tên nhóm hàng</label>
                                       </div>
                                      <div class="col-md-8">
                                          <input type="text" id="prd_group_name" class="form-control" placeholder="Nhập tên nhóm hàng.">
                                      </div>
                                   </div>
                                   <div class="form-group">
                                       <div class="col-md-4 text-right">
                                           <label>Nhóm hàng cấp cha</label>
                                       </div>
                                       <div class="col-md-8">
                                           <select  id="parentid" class="form-control">

                                           </select>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <div class="col-md-8 col-md-offset-4">
                                           <button type="button" class="btn btn-primary"  style="border-radius: 0 3px 3px 0;" onclick="cms_prd_group();"><i class="fa fa-check"></i> Lưu</button>
                                           <button type="button" class="btn btn-primary "  onclick="cms_sls_prd_group();"><i class="fa fa-floppy-o"></i> Lưu và tiếp tục</button>
                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Đóng</button>
            </div>
        </div>
    </div>
</div>
