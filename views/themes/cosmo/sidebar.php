<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Sidebar -->
<div class="col-xs-12 col-md-4">
	<h3 class="sidebar">Pencarian</h3>
	<form action="<?=site_url('hasil-pencarian')?>" method="POST">
		<div class="input-group">
			<input type="text" placeholder="Cari berita, halaman, katalog, dll.. Ex: Sapi Potong" name="keyword" class="input-sm required form-control">
			<span class="input-group-btn">
				<input type="submit" class="button btn btn-default btn-sm" value="Search" name=" subscribe" id="mc-embedded-subscribe">
			</span>
		</div>
	</form>
	<?php
	if($content != 'themes/'.theme_folder().'/home'):
	?>
	<?php
	if(!$this->auth->is_logged_in()):
	?>
	<h3 class="sidebar">Masuk</h3>
	Tidak punya akun? Daftar di <a href="<?=base_url('signup')?>">Sini</a>
					<form role="form" class="login-form">
						<div class="form-group">
							<input autocomplete="off" type="text" name="username" placeholder="Username..." class="form-username form-control input-error" id="username">
						</div>
						<div class="form-group">
							<input type="password" name="password" placeholder="Password..." class="form-password form-control input-error" id="password">
						</div>
						<button onclick="login(); return false;" class="btn btn-danger btn-block"><i class="fa fa-sign-out"></i> SIGN IN</button>
					</form>
	<?php endif;?>
	<h3 class="sidebar">Fanspage</h3>
	<div class="fb-page" data-href="https://www.facebook.com/biblembang/" data-tabs="timeline" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/biblembang/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/biblembang/">Balai Inseminasi Buatan Lembang</a></blockquote>
</div>
<div id="cart" >
	<div id="text">
		<?php $cart_check = $this->cart->contents();
		// If cart is empty, this will show below message.
		if(empty($cart_check)) {
	} ?> </div>
	<?php if ($cart = $this->cart->contents()): ?>
	<h3 class="sidebar">Keranjang</h3>
	<?php endif?>
	<table id="table" border="0" cellpadding="5px" cellspacing="1px" class="table table-responsive no-border grey lighten-4">
		<?php
		// All values of cart store in "$cart".
		if ($cart = $this->cart->contents()): ?>
		<tr>
			<th>Serial</th>
			<th>Name</th>
			<th>Qty</th>
			<th>Cancel Product</th>
		</tr>
		<?php
		// Create form and send all values in "shopping/update_cart" function.
		echo form_open('public/cart/update_cart');
		$grand_total = 0;
		$i = 1;
		foreach ($cart as $item):
		// echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
		// Will produce the following output.
		// <input type="hidden" name="cart[1][id]" value="1" />
		echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
		echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
		echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
		echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
		?>
		<tr>
			<td>
				<?php echo $i++; ?>
			</td>
			<td>
				<?php echo $item['name']; ?>
			</td>
			<td>
				<input class="input-sm form-control text-right" type="number" name="cart[<?=$item['id']?>][qty]" value="<?=$item['qty']?>" maxlength="10"/>
			</td>
			<?php $grand_total = $grand_total + $item['qty']; ?>
			<td>
				<?php
				// cancle image.
				$path = "Cancel";
				echo anchor('public/cart/remove/' . $item['rowid'], $path, 'class="btn grey lighten-2 btn-sm grey-text text-darken-3"'); ?>
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td><b>Total: <?php
									//Grand Total.
			echo $grand_total; ?> Straw</b></td>
			<?php // "clear cart" button call javascript confirmation message ?>
			<td colspan="5" align="right"><input style="font-weight:bold;" class ="btn btn-sm grey lighten-3 grey-text text-darken-4" type="button" value="Clear Cart" onclick="location.href = '<?=site_url('public/cart/empty_cart')?>'">
			<?php //submit button. ?>
			<input style="font-weight:bold;" class ="btn btn-sm grey lighten-3 grey-text text-darken-4" type="submit" value="Update Cart">
			<?php echo form_close(); ?>
			<!-- "Place order button" on click send "billing" controller -->
			<input style="font-weight:bold;" class ='btn btn-warning btn-sm' type="button" value="Place Order" onclick="window.location = '<?=site_url('public/cart/billing_view')?>'"></td>
		</tr>
		<?php endif; ?>
	</table>
</div>
<h3 class="sidebar">Posts & Katalog</h3>
		<section>
			<div class="tabs tabs-style-iconbox">
				<nav>
					<ul>
						<li><a href="#section-iconbox-1"><span><i class="fa fa-dashboard fa-lg"></i><br/>Recent Posts</span></a></li>
						<li><a href="#section-iconbox-2"><span><i class="fa fa-fire fa-lg"></i><br/>Popular Posts</span></a></li>
						<li><a href="#section-iconbox-2"><span><i class="fa fa-cart-plus fa-lg"></i><br/>Katalog</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
					<section id="section-iconbox-1">
						<?php
						$query = get_recent_posts(5); if ($query->num_rows() > 0) {
						$posts = [];
						foreach ($query->result() as $post) {
						array_push($posts, $post);
						}
						?>
						<?php if (count(array_slice($posts, 0)) > 0) { ?>
						<?php foreach(array_slice($posts, 0) as $row) { ?>
						<div class='row' style='margin-bottom: 15px;'>
							<div class='col-xs-4 col-sm-3 col-md-3'>
								<img src='<?=base_url('media_library/posts/medium/'.$row->post_image)?>' class='img-responsive' style='height:60px;width: 60px;'>
							</div>
							<div class='col-xs-8 col-sm-9 col-md-9'>
								<a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a>
							</div>
						</div>
						<?php }?>
						<?php }?>
						<?php }?>
					</section>
					<section id="section-iconbox-2">
						<?php
						$query = get_popular_posts(5); if ($query->num_rows() > 0) {
							$posts = [];
							foreach ($query->result() as $post) {
								array_push($posts, $post);
							}
						?>
						<?php if (count(array_slice($posts, 0)) > 0) { ?>
						<?php foreach(array_slice($posts, 0) as $row) { ?>
						<div class='row' style='margin-bottom: 15px;'>
							<div class='col-xs-4 col-sm-3 col-md-3'>
								<img src='<?=base_url('media_library/posts/medium/'.$row->post_image)?>' class='img-responsive' style='height:60px;width: 60px;'>
							</div>
							<div class='col-xs-8 col-sm-9 col-md-9'>
								<a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a>
							</div>
						</div>
						<?php }?>
						<?php }?>
						<?php }?>
					</section>
					<section id="section-iconbox-3"><p>3</p></section>
					
					</div><!-- /content -->
					</div><!-- /tabs -->
				</section>
<?php
endif;
?>
<?php
if($content == 'themes/'.theme_folder().'/home'){
?>
<div class='row' style='margin-top: 15px;'>
	<div class='col-lg-8 col-lg-offset-2'>
		<ul class='nav navbar-nav' align='center'>
			<li><a href=""><img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/sosmed/2.png' alt='facebook' class='img-responsive' style='max-width: 35px;' title='faceook'></a></li>
			<li><a href=""><img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/sosmed/3.png' alt='twitter' class='img-responsive' style='max-width: 35px;' title='twitter'></a></li>
			<li><a href=""><img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/sosmed/4.png' alt='instagram' class='img-responsive' style='max-width: 35px;' title='instagram'></a></li>
			<li><a href=""><img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/sosmed/youtube.png' alt='youtube' class='img-responsive' style='max-width: 39px;' title='youtube'></a></li>
		</ul>
	</div>
</div>
<div class="embed-responsive embed-responsive-16by9" style="margin-top: 15px;">
<iframe id="ytplayer" type="text/html" width="640" height="360"
  src="https://www.youtube.com/embed?listType=playlist&list=PLFuJBu7xiTBFCZlq-psYLuctqsSVn2DM9"
  frameborder="0" allowfullscreen></iframe>
</div>
<div class='row' style='margin-top: 20px;'>
	<div class='col-xs-12 col-sm-6 col-md -6 col-lg-6'>
		<img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/iso.png' class='img-responsive' alt='logo iso' title='logo iso'/>
		<div class='row'>
			<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
				<a href='http://biblembang.ditjenpkh.pertanian.go.id/kuisioner'>
					<img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/icon-ikm.png' class='img-responsive' alt='logo ikm' title='logo ikm'/>
				</a>
			</div>
			<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
				<a href='http://biblembang.ditjenpkh.pertanian.go.id/kuisioner'>
					<img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/icon-pengaduan.png' class='img-responsive' alt='logo ikm' title='logo ikm'/>
				</a>
			</div>
		</div>
	</div>
	<div class='col-xs-12 col-sm-6 col-md -6 col-lg-6'>
		<div style='background-color: #ccc;padding: 5px;' class='text-center'>
			<p>Pengunjung BIB Lembang</p>
			<?php
			$query = get_counters();
			?>
			<p>
				<?php
				foreach($query->result() as $data){
				echo 'Hari ini : '.$data->view;
				}
				?>
			</p>
			<?php
			$query = get_counters_yes();
			?>
			<p>
				<?php
				foreach($query->result() as $data){
				echo 'Kemarin : '.$data->view;
				}
				?>
			</p>
			<?php
			$query = get_counters_week();
			?>
			<p>
				<?php
				foreach($query->result() as $data){
				echo 'Minggu ini : '.$data->view;
				}
				?>
			</p>
			<?php
			$query = get_counters_month();
			?>
			<p>
				<?php
				foreach($query->result() as $data){
				echo 'Bulan ini : '.$data->view;
				}
				?>
			</p>
			<?php
			$query = get_counters_all();
			?>
			<p>
				<?php
				foreach($query->result() as $data){
				echo 'Total Pengunjung : '.$data->jumlah_total;
				}
				?>
			</p>
			<p>
			 <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
			<!-- Histats.com  START  (aync)-->
			<script type="text/javascript">var _Hasync= _Hasync|| [];
			_Hasync.push(['Histats.start', '1,3979447,4,1035,150,25,00000001']);
			_Hasync.push(['Histats.fasi', '1']);
			_Hasync.push(['Histats.track_hits', '']);
			(function() {
			var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
			hs.src = ('//s10.histats.com/js15_as.js');
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
			})();</script>
			<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3979447&101" alt="" border="0"></a></noscript>
			<!-- Histats.com  END  -->
			</p>
		</div>
	</div>
</div>
<?php
$query = get_post_category(2,5); if ($query->num_rows() > 0) {
	$posts = [];
	foreach ($query->result() as $post) {
		array_push($posts, $post);
	}
?>
<h3 class="sidebar">Pengumuman</h3>
<?php if (count(array_slice($posts, 1)) > 0) { ?>
<?php foreach($posts as $row) { ?>
<div class='row'>
	<div class='col-xs-3 col-md-3'>
		<p align='center'>
			<img src="<?=base_url('media_library/posts/thumbnail/'.$row->post_image)?>" class="img-responsive" style="height: 50px!important;">
		</p>
	</div>
	<div class='col-xs-9 col-md-9'>
		<h5><a class="grey-text text-darken-3" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h5>
	</div>
</div>
<br/>
<?php } ?>
<?php } ?>
<?php } ?>
<h3 class="sidebar">Lokasi Kami</h3>
<div class='col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2'>
	<a href='https://www.google.co.id/maps/place/Balai+Inseminasi+Buatan+Lembang/@-6.821552,107.6281593,17z/data=!3m1!4b1!4m5!3m4!1s0x2e68e0e6f896c91f:0x1152b8ea5643663a!8m2!3d-6.821552!4d107.630348' target='_self'><img src='http://biblembang.ditjenpkh.pertanian.go.id/b/img/MAP.png' class='img-responsive' style='width: 200px;' alt='lokasi kami' title='lokasi kami'></a>
</div>
<?php }?>
</div>