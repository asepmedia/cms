<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if ($this->session->userdata('user_type') === 'super_user' && $this->session->userdata('user_group_id') == 0) { ?>
<section class="content">
<div class="row">
<div class="col-xs-12">
<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>" type="text/javascript"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
var f=jQuery.noConflict();
f(function () {
f('#grafik').highcharts({
chart: {
zoomType: 'x'
},
title: {
text: 'Statistik Pengunjung BIB Lembang'
},
xAxis: {
type: 'datetime'
},
yAxis: {
title: {
text: 'Jumlah Pengunjung'
}
},
legend: {
enabled: false
},
plotOptions: {
area: {
fillColor: {
linearGradient: {
x1: 0,
y1: 0,
x2: 0,
y2: 1
},
stops: [
[0, Highcharts.getOptions().colors[0]],
[1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
]
},
marker: {
radius: 2
},
lineWidth: 1,
states: {
hover: {
lineWidth: 1
}
},
threshold: null
}
},
series: [{
type: 'area',
name: 'Jumlah Pengunjung',
data: [
<?php
$trackers = get_tracker();
foreach($trackers->result() as $tracker)
{?>
[Date.UTC(<?php echo date("Y,m-1,d", strtotime($tracker->date)) ?>),<?php echo $tracker->view ?>],
<?php }?>
]
}]
});
});
</script>
<div id="grafik" style="width:100%; height:400px;"></div>
<hr/>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/messages');?>">
			<span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Pesan Masuk</span>
			<span class="info-box-number"><?=$widget_box->messages;?></span>
		</div>
	</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/post_comments');?>">
			<span class="info-box-icon bg-green"><i class="fa fa-comments-o"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Komentar</span>
			<span class="info-box-number"><?=$widget_box->comments;?></span>
		</div>
	</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/posts');?>">
			<span class="info-box-icon bg-yellow"><i class="fa fa-edit"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Tulisan</span>
			<span class="info-box-number"><?=$widget_box->posts;?></span>
		</div>
	</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/pages');?>">
			<span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Halaman</span>
			<span class="info-box-number"><?=$widget_box->pages;?></span>
		</div>
	</div>
</div>
</div>
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/post_categories');?>">
			<span class="info-box-icon bg-red"><i class="fa fa-list-ul"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Kategori <br>Tulisan</span>
			<span class="info-box-number"><?=$widget_box->categories;?></span>
		</div>
	</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/tags');?>">
			<span class="info-box-icon bg-yellow"><i class="fa fa-tags"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Tags</span>
			<span class="info-box-number"><?=$widget_box->tags;?></span>
		</div>
	</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/links');?>">
			<span class="info-box-icon bg-green"><i class="fa fa-link"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Tautan</span>
			<span class="info-box-number"><?=$widget_box->links;?></span>
		</div>
	</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
		<a href="<?=site_url('blog/quotes');?>">
			<span class="info-box-icon bg-aqua"><i class="fa fa-quote-right"></i></span>
		</a>
		<div class="info-box-content">
			<span class="info-box-text">Kutipan</span>
			<span class="info-box-number"><?=$widget_box->quotes;?></span>
		</div>
	</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">INFORMASI SITUS</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 control-label">Sistem Operasi</label>
					<div class="col-sm-8">
						<p class="form-control-static"><?=$this->agent->platform();?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Browser</label>
					<div class="col-sm-8">
						<p class="form-control-static"><?=$this->agent->browser();?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Versi PHP</label>
					<div class="col-sm-8">
						<p class="form-control-static"><?=phpversion();?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Versi Database</label>
					<div class="col-sm-8">
						<p class="form-control-static"><?=ucwords($this->db->platform()).' '.$this->db->version();?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Tanggal Server</label>
					<div class="col-sm-8">
						<p class="form-control-static"><?=indo_date(date('Y-m-d'));?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Jam Server</label>
					<div class="col-sm-8">
						<p class="form-control-static"><?=date('H:i:s');?></p>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">LOGIN PENGGUNA</div>
		<table class="table table-responsive table-striped table-bordered">
			<tbody>
				<tr>
					<th width="40%">Nama Pengguna</th>
					<th>Waktu Login</th>
				</tr>
				<?php foreach($last_logged_in->result() as $row) { ?>
				<tr>
					<td><?=$row->full_name;?></td>
					<td><i class="fa fa-calendar"></i> <?=$row->last_logged_in;?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
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
<?php } ?>
<?php if ($this->session->userdata('user_type') === 'administrator' && $this->session->userdata('user_group_id') == 1) { ?>
<section class="content">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">POSTING TERBARU</div>
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
<?php } ?>