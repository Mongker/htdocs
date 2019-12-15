<style>
.box-content-center img{
	max-width:560px;
}
</style>
<div class="box-center"><!-- The box-center news-->
             <div class="tittle-box-center">
		        <h2>Chi tiết bài viết</h2>
		      </div>
		      <div class="box-content-center news" style='width:560px'><!-- The box-content-center -->
		         
							<h1 class=""><?php echo $info->title; ?></h1>
							<div class="clear"></div>
						
							<div class=" timestamp">
								<span class="mr5"><?php echo mdate('%d-%m-%Y',$info->created)?> </span>|
								<span class="ml5">Lượt xem: <?php echo $info->count_view; ?></span>
							</div>
							<div class="clear pb10"></div>
						
							<div style="line-height:20px;font-weight:bold;">
								<?php echo $info->intro; ?>
							</div>
							<div class="clear pb10"></div>
							
							<div class="" style="line-height:20px; text-align:justify;">
								<?php echo $info->content; ?>
							</div>
							
							<div class="clear pb10"></div>
							
						    <div class="clear pb10"></div>
							
		      </div>
</div>