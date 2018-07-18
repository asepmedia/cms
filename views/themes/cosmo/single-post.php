<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-xs-12 col-md-8">
	<?php if($query->post_password == 'no'){?>
	<div class="thumbnail no-border">
		<ol class="breadcrumb orange" style="border-radius: 0;">
			<li><a class="black-text" href="<?= site_url('/') ?>"><i class="fa fa-home"></i> Halaman Utama</a></li>
			<li class='white-text'><?=$query->post_title?></li>
		</ol>
		<div class="caption">
			<h1 style="font-weight: bold;font-family: 'Roboto Condensed', Arial, Sans-serif!important;"><?=$query->post_title?></h1>
			<p class="by-author">
				Terakhir Diperbaharui pada :
				<?=day_name(date('N', strtotime($query->updated_at)))?>,
				<?=indo_date(substr($query->updated_at, 0, 10))?>
				~ Dilihat <?=$query->post_counter?> Kali
			</p>
			<hr/>
			<?php if ($post_type == 'post' && file_exists('./media_library/posts/large/'.$query->post_image)) { ?>
			<img src="<?=base_url('media_library/posts/large/'.$query->post_image)?>" style="width: 100%; display: block;">
			<?php } ?>
			<?=$query->post_content?>
			<div id="share1"></div>
			<script>
			$("#share1").jsSocials({
				shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
			});
			</script>
			<?php
			if ($query->post_tags) {
			$post_tags = explode(',', $query->post_tags);
			foreach ($post_tags as $tag) {
			echo '<a style="margin-right:3px;" href="'.site_url('tag/'.url_title(strtolower(trim($tag)))).'">';
					echo '<span class="label label-success">';
							echo '<i class="fa fa-tags"></i> '.ucwords(strtolower(trim($tag)));
					echo '</span>';
			echo '</a>';
			}
			}
			?>
		</div>
	</div>
<?php } else {?>
	<div class="thumbnail no-border">
		<div class="row" id="password_content">
			<h3>Content Locked</h3>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" name="post_password" id="post_password" class="form-control" placeholder="Masukan sandi">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<button type="submit" class="btn btn-danger btn-block" id="btn_unlock">Buka</button>
				</div>
			</div>
	</div>
	<div id="content_unlock" class="hidden">
	<ol class="breadcrumb orange" style="border-radius: 0;">
		<li><a class="black-text" href="<?= site_url('/') ?>"><i class="fa fa-home"></i> Halaman Utama</a></li>
		<li class='white-text'><?=$query->post_title?></li>
	</ol>
	<div class="caption">
		<h1 style="font-weight: bold;font-family: 'Roboto Condensed', Arial, Sans-serif!important;"><?=$query->post_title?></h1>
		<p class="by-author">
			Terakhir Diperbaharui pada :
			<?=day_name(date('N', strtotime($query->updated_at)))?>,
			<?=indo_date(substr($query->updated_at, 0, 10))?>
			~ Dilihat <?=$query->post_counter?> Kali
		</p>
		<hr/>
		<?php if ($post_type == 'post' && file_exists('./media_library/posts/large/'.$query->post_image)) { ?>
		<img src="<?=base_url('media_library/posts/large/'.$query->post_image)?>" style="width: 100%; display: block;">
		<?php } ?>
		<?=$query->post_content?>
		<div id="share1"></div>
		<script>
		$("#share1").jsSocials({
			shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
		});
		</script>
		<?php
		if ($query->post_tags) {
		$post_tags = explode(',', $query->post_tags);
		foreach ($post_tags as $tag) {
		echo '<a style="margin-right:3px;" href="'.site_url('tag/'.url_title(strtolower(trim($tag)))).'">';
				echo '<span class="label label-success">';
						echo '<i class="fa fa-tags"></i> '.ucwords(strtolower(trim($tag)));
				echo '</span>';
		echo '</a>';
		}
		}
		?>
	</div>
</div>
</div>
<?php } ?>
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
</div>
<?php $this->load->view('themes/cosmo/sidebar')?>

<script>
$('#btn_unlock').on('click', function(){
	var password = $('#post_password').val();
	if(password == "<?=$query->post_password;?>"){
		$('#content_unlock').removeClass('hidden');
		$('#password_content').addClass('hidden');
	} else {
		alert('Password Invalid!');
	}
});
</script>
