<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-xs-12 col-md-8">
	<ol class="breadcrumb post-header">
		<li><?=$title?></li>
	</ol>
	<div class="thumbnail no-border">
		<div class="caption">
			<?php $i=1;?>
			<?php if ($katalog->num_rows() > 0) { ?>
				<h3 class="sidebar">Katalog</h3>
				<?php foreach($katalog->result() as $row) { ?>
		<div class="col-md-4">
			<div class="thumbnail no-border">
				<?php $data = $i++;?>
				<img src="<?=base_url('media_library/posts/medium/'.$row->post_image)?>" style="width: 100%; display: block;">
				<div class="caption">
					<h4><a href="<?=site_url('read/katalog/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h4>
					<p><?=substr(strip_tags($row->post_content), 0, 150)?></p>
					<p>
						<form action="<?=site_url('public/cart/add')?>" method="post">
							<input type="hidden" name="id" value="<?=$row->id?>">
							<input type="hidden" name="name" value="<?=$row->post_title?>">	
							<input type="submit" class="btn btn-danger no-border btn-sm btn-block" value="ADD TO CART">				
						</form>
						<br/>
						<a href="<?=site_url('read/katalog/'.$row->id.'/'.$row->post_slug)?>" class="btn btn-danger btn-sm btn-block no-border grey lighten-2 grey-text text-darken-2" role="button">SELENGKAPNYA</a>
					</p>
				</div>
			</div>
		</div>
				<?php } ?>	
			<?php } ?>
			<div class="col-md-12">
			<?php if ($posts->num_rows() > 0) { ?>
				<h3 class="sidebar">Posting</h3>
				<?php foreach($posts->result() as $row) { ?>
					<h4><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h4>
					<p style="text-align: justify;"><?=word_limiter(strip_tags($row->post_content), 30)?></p>
				<?php } ?>	
			<?php } ?>
			
			<?php if ($pages->num_rows() > 0) { ?>
				<h3 class="sidebar">Halaman</h3>
				<?php foreach($pages->result() as $row) { ?>
					<h4><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h4>
					<p style="text-align: justify;"><?=word_limiter(strip_tags($row->post_content), 30)?></p>
				<?php } ?>
			<?php } ?>	

			<?php if ($reports->num_rows() > 0) { ?>
				<h3 class="sidebar">Laporan</h3>
				<?php foreach($reports->result() as $row) { ?>
					<h4><a href="<?=site_url('read/reports/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h4>
					<p style="text-align: justify;"><?=word_limiter(strip_tags($row->post_content), 30)?></p>
				<?php } ?>
			<?php } ?>				
			<?php if ($pages->num_rows() == 0 && $posts->num_rows() == 0 && $reports->num_rows() == 0 && $katalog->num_rows() == 0) { ?>
				<p>Hasil pencarian tidak ditemukan.</p>
			<?php } ?>	
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('themes/cosmo/sidebar')?>