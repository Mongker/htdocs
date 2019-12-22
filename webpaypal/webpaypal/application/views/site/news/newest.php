<div class="box-right">
                <div class="title tittle-box-right">
			        <h2> Bài viết mới </h2>
			    </div>
			    <div class="content-box">
			       <ul class='news'>
			            <?php foreach ($newss as $row):?>
			            <li>
			                <a href="<?php echo site_url('news/view/'.$row->id); ?>" title="<?php echo $row->title?>">
			                <img src="<?php echo public_url('site')?>/images/li.png">
			                <?php echo $row->title?>
	                        </a>
	                     </li>
	                    <?php endforeach;?>
	             </ul>
	    </div>
   </div>