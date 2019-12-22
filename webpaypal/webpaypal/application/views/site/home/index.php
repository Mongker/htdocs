<?php $this->load->view('site/slide', $this->data);?>

<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Sản phẩm mới</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
		            <?php foreach ($product_newest as $row):?>
                        <?php $slug_product = str_slug($row->name); ?>
		            <div class="product_item">
                       <h3>
                         <a title="<?php echo $row->name?>" href="<?php echo base_url($slug_product . '-' . $row->id . '.html')?>">
                              <?php echo $row->name?>	                    
                          </a>
	                   </h3>
                       <div class="product_img">
                             <a title="<?php echo $row->name?>" href="<?php echo base_url($slug_product . '-' . $row->id . '.html')?>">
                                <img alt="<?php echo $row->name?>" src="<?php echo base_url('upload/product/'.$row->image_link)?>">
                            </a>
                       </div>
          
                       <p class="price">
                              <?php if($row->discount > 0):?>
                              <?php $price_new = $row->price - $row->discount;?>
                              <?php echo number_format($price_new)?> đ <span class="price_old"><?php echo number_format($row->price)?> đ</span>
				              <?php else:?>
				                <?php echo number_format($row->price)?> đ
				              <?php endif;?>
		                 </p>
		                 
                        <center>
                           <div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div>
                        </center>
                        
                       <div class="action">
                           <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $row->view?></b></p>
	                       <a title="Chi tiết" href="<?php echo base_url($slug_product . '-' . $row->id . '.html')?>" class="button">Chi tiết</a>
	                       <div class="clear"></div>
                       </div>
                   </div>
                   <?php endforeach;?>
                           
               
		            <div class="clear"></div>
		      </div><!-- End box-content-center -->
</div>



<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Sản phẩm được mua nhiều</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
		            <?php foreach ($product_buy as $row):?>
                  <?php $slug_product = str_slug($row->name); ?>
		            <div class="product_item">
                       <h3>
                         <a title="<?php echo $row->name?>" href="<?php echo base_url($slug_product . '-' . $row->id . '.html')?>">
                              <?php echo $row->name?>	                    
                          </a>
	                   </h3>
                       <div class="product_img">
                             <a title="<?php echo $row->name?>" href="<?php echo base_url($slug_product . '-' . $row->id . '.html')?>">
                                <img alt="<?php echo $row->name?>" src="<?php echo base_url('upload/product/'.$row->image_link)?>">
                            </a>
                       </div>
          
                       <p class="price">
                              <?php if($row->discount > 0):?>
                              <?php $price_new = $row->price - $row->discount;?>
                              <?php echo number_format($price_new)?> đ <span class="price_old"><?php echo number_format($row->price)?> đ</span>
				              <?php else:?>
				                <?php echo number_format($row->price)?> đ
				              <?php endif;?>
		                 </p>
		                 
                          <center>
                           <div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div>
                        </center>
                        
                       <div class="action">
                           <p style="float:left;margin-left:10px">Lượt mua: <b><?php echo $row->buyed?></b></p>
	                       <a title="Chi tiết" href="<?php echo base_url($slug_product . '-' . $row->id . '.html')?>" class="button">Chi tiết</a>
	                       <div class="clear"></div>
                       </div>
                   </div>
                   <?php endforeach;?>
                           
               
		            <div class="clear"></div>
		      </div><!-- End box-content-center -->
</div>


