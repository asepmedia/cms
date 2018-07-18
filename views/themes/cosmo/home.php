<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-xs-12 col-md-8">
	<!-- Popular Posts -->
	<?php
	$query = get_post_category(1,5); if ($query->num_rows() > 0) {
		$posts = [];
		foreach ($query->result() as $post) {
			array_push($posts, $post);
		}
	?>
	<!-- Title -->
	<div class="row">
		<div class="col-md-8">
			<ol class="breadcrumb post-header red">
				<li>Berita</li>
			</ol>
			<?php if (count(array_slice($posts, 0, 1)) > 0) { ?>
			<?php foreach(array_slice($posts, 0, 1) as $row) { ?>
			<div class="thumbnail no-border">
				<h3 align="center" style="font-weight: bold"><a class="grey-text text-darken-3" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h3>
				<img src="<?=base_url('media_library/posts/medium/'.$row->post_image)?>" class="img-thumbnail img-responsive" style="width: 100%; display: block;">
				<div class="caption">
					<p class="by-author"><?=day_name(date('N', strtotime($row->created_at)))?>, <?=indo_date($row->created_at)?></p>
					<p align="justify"><?=substr(strip_tags($row->post_content), 0, 165)?></p>
				</div>
				<?php
				$query = get_post_category(1,3); if ($query->num_rows() > 0) {
					$posts2 = [];
					foreach ($query->result() as $post2) {
						array_push($posts2, $post2);
					}
				?>
				<?php if (count(array_slice($posts2, 1)) > 0) { ?>
				<div class="row">
					<?php foreach(array_slice($posts2, 1) as $row2) { ?>
					<div class="col-md-6">
						<a href="<?=site_url('read/'.$row2->id.'/'.$row2->post_slug)?>">
							<img src="<?=base_url('media_library/posts/thumbnail/'.$row2->post_image)?>" class="img-thumbnail img-responsive" style="height:200px!important">
						</a>
						<h4 align="center" style="font-weight: bold"><a class="grey-text text-darken-3" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row2->post_title?></a></h4>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php } ?>
			</div>
			<?php } ?>
			<?php } ?>
			<?php if (count(array_slice($posts, 1)) > 0) { ?>
			<ul class="media media-list main-list grey lighten-3 text-muted" style="padding: 10px;">
				<?php foreach(array_slice($posts, 1) as $row) { ?>
				<li>
					<div class="media-body">
						<a class="grey-text text-darken-3" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<?php } ?>
		<?php
		$query = get_post_category(3,5); if ($query->num_rows() > 0) {
			$posts = [];
			foreach ($query->result() as $post) {
				array_push($posts, $post);
			}
		?>
		<div class="col-md-4">
			<ol class="breadcrumb post-header red">
				<li>Artikel</li>
			</ol>
			<?php if (count(array_slice($posts, 0, 1)) > 0) { ?>
			<?php foreach(array_slice($posts, 0, 1) as $row) { ?>
			<div class="thumbnail no-border">
				<h3 align="center" style="font-weight: bold"><a class="grey-text text-darken-3" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h3>
				<img src="<?=base_url('media_library/posts/medium/'.$row->post_image)?>" class="img-thumbnail img-responsive" style="width: 100%; display: block;">
				<div class="caption">
					<p class="by-author"><?=day_name(date('N', strtotime($row->created_at)))?>, <?=indo_date($row->created_at)?></p>
					<p align="justify"><?=substr(strip_tags($row->post_content), 0, 165)?></p>
					<hr/>
					<?php if (count(array_slice($posts, 1)) > 0) { ?>
					<ul class="media media-list main-list">
						<?php foreach(array_slice($posts, 1) as $row) { ?>
						<li>
							<div class="media-body">
								<a class="grey-text text-darken-3" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a>
							</div>
						</li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
			<?php } ?>
			<div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-4 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
				<p><a href="<?=base_url('read/328/ppid')?>"><img src="<?=site_url('assets/img/btn/PPID2.jpg')?>" class="img-responsive" width="257" height="80"></a></p>
				<p><a href="<?=base_url('product/katalog')?>"><img src="<?=site_url('assets/img/btn/katalog.jpg')?>" class="img-responsive"></a></p>
				<p><a href="<?=base_url('read/44/stok-semen-beku')?>"><img src="<?=site_url('assets/img/btn/stoksemenbeku.jpg')?>" class="img-responsive"></a></p>
				<p><a href="<?=base_url('read/43/harga-semen-beku')?>"><img src="<?=site_url('assets/img/btn/hargasemenbeku.jpg')?>" class="img-responsive"></a></p>
				<p><img src="<?=site_url('assets/img/btn/statuspesanan.jpg')?>" class="img-responsive"></p></p>
				<p><a href="<?=base_url('read/54/testimoni')?>"><img src="<?=site_url('assets/img/btn/testimoni.jpg')?>" class="img-responsive"></a></p>
			</div>
		</div>
		<?php } ?>
	</div>
	<!--
	<?php $query = get_albums(2); if ($query->num_rows() > 0) { ?>
	<ol class="breadcrumb post-header">
		<li><i class="fa fa-camera"></i> PHOTO TERBARU</li>
		<span class="pull-right"><a href="<?=site_url('gallery-photo')?>"><i class="fa fa-plus"></i></a></span>
	</ol>
	<div class="row">
		<?php foreach($query->result() as $row) { ?>
		<div class="col-md-6 col-xs-12">
			<div class="thumbnail">
				<img style="cursor: pointer; width: 100%; height: 250px;" onclick="preview(<?=$row->id?>)" src="<?=base_url('media_library/albums/'.$row->album_cover)?>">
				<div class="caption">
					<h4><?=$row->album_title?></h4>
					<p><?=$row->album_description?></p>
					<button onclick="preview(<?=$row->id?>)" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	<?php $query = get_recent_video(2); if ($query->num_rows() > 0) { ?>
	<ol class="breadcrumb post-header">
		<li><i class="fa fa-film"></i> VIDEO TERBARU</li>
		<span class="pull-right"><a href="<?=site_url('gallery-video')?>"><i class="fa fa-plus"></i></a></span>
	</ol>
	<div class="row">
		<?php foreach($query->result() as $row) { ?>
		<div class="col-md-6 col-xs-12">
			<div class="thumbnail" style="width: 100%; display: block;">
				<?=$row->post_content?>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>-->
	<hr/>
<div id="terkait">
			<div class="col-lg-3">
			<p align="center"><a href="http://ppid.pertanian.go.id/" target="_self"><img src="/assets/img/logo/PPID.png" class="img-responsive" style="margin-bottom: 5px;width: 190px;"></a></p>
			</div>
			<div class="col-lg-3">
			<p align="center"><a href="http://www.pertanian.go.id/wbs/login.php" target="_self"><img src="/assets/img/logo/lapor.png" class="img-responsive" style="margin-bottom: 5px;width: 190px;"></a></p>
			</div>
			<div class="col-lg-3">
			<p align="center"><a href="https://sirup.lkpp.go.id/sirup/rup/penyedia/satker/5645" target="_self"><img src="/assets/img/logo/sirup.png" class="img-responsive" style="margin-bottom: 5px;width: 160px;"></a></p>
			</div>
			<div class="col-lg-3">
			<p align="center"><a href="http://www.pertanian.go.id/wbs/login.php" target="_self"><img src="/assets/img/logo/wbs1.png" class="img-responsive" style="margin-bottom: 5px;width: 210px;"></a></p>
			</div>
	</div>
</div>
<?php $this->load->view('themes/cosmo/sidebar')?>