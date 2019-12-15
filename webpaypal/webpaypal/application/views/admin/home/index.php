<?php
if(isset($message) && $message)
{
	echo $message;
} 
?>
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>
		
		<div class="clear"></div>
	</div>
</div>

<div class="line"></div>

<div class="wrapper">
	
	<div class="widgets">
	     <!-- Stats -->
		<?php $this->load->view('admin/home/stats', $this->data); ?>
		<div class="clear"></div>
    </div>
	
</div>


<div class="clear mt30"></div>

