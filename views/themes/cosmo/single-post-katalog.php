<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-xs-12 col-md-8">
		<ol class="breadcrumb" style="border-radius: 0;background-color: #fafafa">
			<li><a class="black-text" href="<?= site_url('/') ?>"><i class="fa fa-home"></i> Halaman Utama</a></li>
			<?php
			if ($query->post_tags) {
			$post_tags = explode(',', $query->post_tags);
			foreach ($post_tags as $tag) {?>
			<li><a class="black-text" href="<?= site_url('product/category/'.url_title(strtolower(trim($tag)))) ?>"><?=ucwords(str_replace("-"," ",$tag));?></a></li>
			<?php } } ?>
			<li class='grey-text'><?=$query->post_title?></li>
		</ol>	
	<div class="thumbnail">
		<div class="caption">
			<div class="row">
			<div class="col-md-3">
			
			</div>
			<div class="col-md-8">
			<?php
			if ($query->post_tags) {
			$post_tags = explode(',', $query->post_tags);
			foreach ($post_tags as $tag) {
			echo '<a style="margin-right:3px;" href="'.site_url('product/category/'.url_title(strtolower(trim($tag)))).'">';
						echo '<span class="label label-success">';
									echo '<i class="fa fa-tags"></i> '.ucwords(strtolower(trim($tag)));
						echo '</span>';
			echo '</a>';
			}
			}
			?>			
			<h3 style="font-weight: bold;font-family: 'Roboto Condensed', Arial, Sans-serif!important;"><?=$query->post_title?></h3>
			<hr/>
			<img src="<?=base_url('media_library/posts/large/'.$query->post_image)?>" style="width: 100%; display: block;">
			<p><?=$query->post_content?></p>
			<div class="col-md-12" style="margin-bottom: 5px;">
			<form action="<?=site_url('public/cart/add_now')?>" method="post">
				<input type="hidden" name="id" value="<?=$query->id?>">
				<input type="hidden" name="name" value="<?=$query->post_title?>">
				<button style="font-weight: bold" type="submit" class="btn btn-success red btn-block lighten-1 no-border"><i class="fa fa-check"></i> BELI SEKARANG</button>
			</form>				
			</div>
			<div class="col-md-6" style="margin-bottom: 5px;">
			<a href="" class="btn btn-default btn-block grey lighten-3 black-text" style="border-color: #ccc;font-weight: bold"><i class="fa fa-phone"></i> CHAT CS</a>
			</div>
			<div class="col-md-6" style="margin-bottom: 5px;">
			<form action="<?=site_url('public/cart/add')?>" method="post">
				<input type="hidden" name="id" value="<?=$query->id?>">
				<input type="hidden" name="name" value="<?=$query->post_title?>">
				<button style="border-color: #ccc;font-weight: bold" type="submit" class="btn btn-default btn-block grey lighten-3 black-text"><i class="fa fa-cart-plus"></i> TAMBAHKAN KE KERANJANG</button>
			</form>	
			<form action="<?=site_url('public/cart/add')?>" method="post" style="margin-bottom:5px">
				<input type="hidden" name="id" value="<?=$query->id+rand(0,900)?>">
				<input type="hidden" name="name" value="<?=ucwords(str_replace('-', ' ', $query->post_tags))?>">
				<button style="border-color: #ccc;font-weight: bold" type="submit" class="btn btn-default btn-block grey lighten-3 black-text"><i class="fa fa-cart-plus"></i> TAMBAHKAN JENIS INI</button>
			</form>						
			</div>
			</div>
			</div>
		</div>
	</div>
	<?php if (
		(
			$query->post_comment_status == 'open' &&
			$this->session->userdata('comment_registration') == 'true' &&
			$this->auth->is_logged_in()
		) ||
		(
			$query->post_comment_status == 'open' &&
			$this->session->userdata('comment_registration') == 'false'
		)
	) { ?>
	<div class="panel panel-default" style="border-color: #ddd;">
		<div class="panel-heading red">
			<h3 class="panel-title"><i class="fa fa-comments-o"></i> KOMENTARI TULISAN INI</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="comment_author" class="col-sm-3 control-label">Nama Lengkap <span style="color: red">*</span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control input-sm" id="comment_author" name="comment_author">
					</div>
				</div>
				<div class="form-group">
					<label for="comment_email" class="col-sm-3 control-label">Email <span style="color: red">*</span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control input-sm" id="comment_email" name="comment_email">
					</div>
				</div>
				<div class="form-group">
					<label for="comment_url" class="col-sm-3 control-label">URL</label>
					<div class="col-sm-9">
						<input type="text" class="form-control input-sm" id="comment_url" name="comment_url">
					</div>
				</div>
				<div class="form-group">
					<label for="comment_content" class="col-sm-3 control-label">Komentar <span style="color: red">*</span></label>
					<div class="col-sm-9">
						<textarea rows="5" class="form-control input-sm" id="comment_content" name="comment_content"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="captcha" class="col-sm-3 control-label">Captcha <span style="color: red">*</span></label>
					<div class="col-sm-9">
						<?=$captcha['image'];?>
					</div>
				</div>
				<div class="form-group">
					<label for="captcha" class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<input type="text" class="form-control input-sm" id="captcha" name="captcha" placeholder="Masukan 5 angka diatas">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="hidden" name="comment_post_id" id="comment_post_id" value="<?=$this->uri->segment(2)?>">
						<button type="button" onclick="post_comment(); return false;" class="btn btn-success"><i class="fa fa-send"></i> SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php } ?>
	<?php
	if ($query->post_type == 'katalog') {
		$posts = get_related_products($query->post_categories, $this->uri->segment(2), 10);
		if ($posts->num_rows() > 0) {
			$arr_posts = [];
			foreach ($posts->result() as $post) {
				array_push($arr_posts, $post);
			}
	?>
	<ol class="breadcrumb post-header">
		<li><i class="fa fa-sign-out"></i>KATALOG LAINNYA</li>
	</ol>
	<?php $idx = 2; $rows = $posts->num_rows(); foreach($posts->result() as $row) { ?>
	<?=($idx % 2 == 0) ? '<div class="row">':''?>
		<div class="col-md-6">
			<ul class="media-list main-list">
				<li class="media">
					<a class="pull-left" href="<?=site_url('read/katalog/'.$row->id.'/'.$row->post_slug)?>">
						<img class="media-object" src="<?=base_url('media_library/posts/thumbnail/'.$row->post_image)?>" alt="...">
					</a>
					<div class="media-body">
						<h4><a href="<?=site_url('read/katalog/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h4>
						<p class="by-author"><?=day_name(date('N', strtotime($row->created_at)))?>, <?=indo_date($row->created_at)?></p>
					</div>
				</li>
			</ul>
		</div>
	<?=(($idx % 2 == 1) || ($rows+1 == $idx)) ? '</div>':''?>
	<?php $idx++; } ?>
	<?php } ?>
	<?php } ?>
</div>
<?php $this->load->view('themes/cosmo/sidebar')?>