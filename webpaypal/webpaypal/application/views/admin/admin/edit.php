<!-- head -->
<?php $this->load->view('admin/admin/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Cập nhật thông tin quản trị viên</h6>
		   </div>
 
      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $info->name?>" name="name"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Username:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->username?>" id="param_username" name="username"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('username')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Password:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo">
                		<input type="password" _autocheck="true" id="param_password" name="password">
                		<p>Nếu cập nhật mật khẩu thì mới nhập giá trị</p>
                		</span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('password')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Nhập lại mật khẩu:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="password" _autocheck="true" id="param_re_password" name="re_password"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('re_password')?></div>
                	</div>
                	<div class="clear"></div>
                </div>



                 <div class="formRow">
                  <label for="param_username" class="formLeft">Quyền<span class="req">*</span></label>
                  <div class="formRight">



                    <?php foreach($config_permissions as $controller => $actions):?>

  
                      <?php 
                      
                      $permissions_actions = array();
                      if(isset($info->permissions->{$controller}))
                      {
                          $permissions_actions = $info->permissions->{$controller};

                      }
                    ?>

                      <div class="quyen">
                          
                          <div id="right">
                          <p class="left"><?php echo $controller;?>:</p>
                            <?php foreach($actions as $action):?>
                            
                                <label><input type="checkbox" name="permissions[<?php echo $controller;?>][]" value="<?php echo $action; ?>" <?php echo (in_array($action, $permissions_actions)) ? 'checked' : ''?> /> <?php echo $action;?></label>

                            <?php endforeach;?>
                          </div>

                      </div>
                    <?php endforeach;?>
                  </div>
                  <div class="clear"></div>
                </div>

                <style>
                  .quyen
                  {
                    width:100%;
                  }
                  .quyen .left{
                    width:20%;
                    padding:10px 5px;
                  }
                  .quyen #right
                  {
                    width:75%;
                    float:right;
                    
                  }
                </style>

                
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
