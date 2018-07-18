<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section class="content">
	<div class="row">
	  <div class="col-md-6 col-sm-6 col-xs-12">
	  		<div class="panel panel-primary">
				<div class="panel-heading">TULISAN TERBARU</div>
				<div class="panel-body">
					<ul class="products-list product-list-in-box">
				  	<?php $posts = get_recent_posts(10); foreach($posts->result() as $row) { ?>
					 <li class="item">
							<span class="product-description">
								Oleh : <?=$row->post_author;?> Pada : <?=$row->created_at;?>
							</span>					
							<a target="_blank" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>" class="product-title"><?=$row->post_title;?></a>
					 </li>
					 <?php } ?>
				  </ul>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">KOMENTAR TERBARU</div>
				<div class="panel-body">
					<ul class="products-list product-list-in-box">
						<?php foreach($recent_posts_comments->result() as $row) { ?>
						<li class="item">
							<span class="product-description">
								Pengirim : <a href="<?=$row->comment_url;?>" target="_blank"><?=$row->comment_author;?></a> on <a href="<?=site_url('read/'.$row->post_id.'/'.$row->post_slug);?>" target="_blank"><?=$row->post_title;?></a>
							</span>
							<span><?=strip_tags($row->comment_content);?></span>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
	  </div>
	</div>
 </section>