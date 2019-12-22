<style>table#cart_ccontents td{padding:10px;border:1px solid #ccc}</style>

<div class="box-center"><!-- The box-center product-->
     <div class="tittle-box-center">
        <h2>Thông tin giỏ hàng (Có <?php echo $total_items?> sản phẩm)</h2>
      </div>
      <div class="box-content-center product"><!-- The box-content-center -->
      <?php if($total_items > 0):?>
      <form action="<?php echo base_url('cart/update')?>" method="post">
            <table id="cart_ccontents">
               <thead>
                   <th>Sản phẩm</th>
                   <th>Giá bán</th>
                   <th>Số lượng</th>
                   <th>Tổng số</th>
                   <th>Xóa</th>
               </thead>
               <tbody>
                     <?php $total_amount = 0;?>
                    <?php foreach ($carts as $row):?>
                    <?php $total_amount = $total_amount + $row['subtotal'];?>
                      <tr>
                           <td>
                              <?php echo $row['name'];?>
                           </td>
                           <td>
                              <?php echo number_format($row['price']);?>đ
                           </td>
                           <td>
                              <input name="qty_<?php echo $row['id']?>" value="<?php echo $row['qty'];?>" size="5"/>
                           </td>
                           <td>
                              <?php echo number_format($row['subtotal']);?>đ
                           </td>
                           <td><a href="<?php echo base_url('cart/del/'.$row['id'])?>">Xóa</a></td>
                       </tr>
                    <?php endforeach;?>
                   
                    <tr>
                       <td colspan="5">
                       Tổng số tiền thanh toán: <b style="color:red"><?php echo number_format($total_amount)?>đ</b>
                       - <a href="<?php echo base_url('cart/del')?>">Xóa toàn bộ</a>
                       </td>
                    </tr>
                     <tr>
                       <td colspan="5">
                       <button type="submit">Cập nhât</button>
                       <a href="<?php echo site_url('order/checkout')?>" class="button">Mua hàng</a>
                       </td>
                    </tr>
               </tbody>
            </table>

            <!-- <a href="https://www.baokim.vn/payment/product/version11?business=blogphongdat.com%40gmail.com&id=&order_description=khoa+hoc+online&product_name=kh%C3%B3a+h%E1%BB%8Dc+xyz&product_price=500000&product_quantity=1&total_amount=500000&url_cancel=&url_detail=http%3A%2F%2Fphongdat.com%2Flap-trinh-huong-doi-tuong%2Flop-va-doi-tuong-trong-mo-hinh-oop.html&url_success=http%3A%2F%2Fphongdat.com%2Forder%2Fresult"><img src="http://www.baokim.vn/developers/uploads/baokim_btn/muahang-l.png" alt="Thanh toán an toàn với Bảo Kim !" border="0" title="Thanh toán trực tuyến an toàn dùng tài khoản Ngân hàng (VietcomBank, TechcomBank, Đông Á, VietinBank, Quân Đội, VIB, SHB,... và thẻ Quốc tế (Visa, Master Card...) qua Cổng thanh toán trực tuyến BảoKim.vn" ></a> -->
           </form>
           <?php else:?>
           <h4>Không có sản phẩm nào trong giỏ hàng</h4>
           <?php endif;?>
      </div>
</div>