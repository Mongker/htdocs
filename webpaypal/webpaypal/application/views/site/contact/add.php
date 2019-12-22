
<div class="box-center"><!-- The box-center contact-->
             <div class="tittle-box-center">
		        <h2>Liên hệ</h2>
		      </div>
		      <div class="box-content-center contact"><!-- The box-content-center -->
            <form class="t-form form_action" method="POST" action="">
            
                  <div class="form-row">
						<label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
						<div class="form-item">
							<input type="text" class="input" id="name" name="name" value="<?php echo set_value('name')?>">
							<div class="clear"></div>
							<div class="error" id="name_error"><?php echo form_error('name')?></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
                  <div class="form-row">
						<label for="param_email" class="form-label">Email:<span class="req">*</span></label>
						<div class="form-item">
							<input type="text" class="input" id="email" name="email" value="<?php echo set_value('email')?>">
							<div class="clear"></div>
							<div class="error" id="email_error"><?php echo form_error('email')?></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  <div class="form-row">
						<label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
						<div class="form-item">
							<input type="text" class="input" id="phone" name="phone" value="<?php echo set_value('phone')?>">
							<div class="clear"></div>
							<div class="error" id="phone_error"><?php echo form_error('phone')?></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  <div class="form-row">
						<label for="param_address" class="form-label">Địa chỉ:<span class="req">*</span></label>
						<div class="form-item">
							<textarea  class="input" id="address" name="address"><?php echo set_value('address')?></textarea>
							<div class="clear"></div>
							<div class="error" id="address_error"><?php echo form_error('address')?></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  
				  <div class="form-row">
						<label for="param_title" class="form-label">Tiêu đề liên hệ:<span class="req">*</span></label>
						<div class="form-item">
							<input type="text" class="input" id="title" name="title" value="<?php echo set_value('title')?>">
							<div class="clear"></div>
							<div class="error" id="title_error"><?php echo form_error('title')?></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				   <div class="form-row">
						<label for="param_address" class="form-label">Nội dung liên hệ:<span class="req">*</span></label>
						<div class="form-item">
							<textarea  class="input" id="content" name="content"><?php echo set_value('content')?></textarea>
							<div class="clear"></div>
							<div class="error" id="content_error"><?php echo form_error('content')?></div>
						</div>
						<div class="clear"></div>
				  </div>
                
				  
				  <div class="form-row">
						<label class="form-label">&nbsp;</label>
						<div class="form-item">
				           	<input type="submit" class="button" value="Liên hệ" name='submit'>
				           	<div class="load"></div>
						</div>
				   </div>
            </form>
            <div class='clear'></div>
            <div id='content_contact'>
            
            </div>
            
         </div><!-- End box-content-center contact-->
 </div><!-- End box-center -->
 