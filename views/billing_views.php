<?php
$grand_total = 0;
$produk = array();
// Calculate grand total.
?>
<?php
if ($this->auth->is_logged_in()){
?>
<?php if ($cart = $this->cart->contents()){ ?>
<form name="billing" method="post" action="<?php echo base_url() . 'public/cart/save_order' ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<table class="table-responsive table table-striped table-hover table-active">
					<thead>
						<tr>
							<th>No</th>
							<th>Product</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						foreach ($cart as $item):
						$grand_total = $grand_total + $item['qty'];
						$produk[] = $item['name'];
						?>
						<tr>
							<td><?=$i++?></td>
							<td><?=$item['name']?></td>
							<td><?=$item['qty']?></td>
						</tr>
						<?php
						endforeach;
						?>
						<tr>
							<td colspan="2" class="text-right"><strong>Total</strong></td>
							<td><strong><?=$grand_total?> Straw</strong></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<div class="form-row">
					<div class="form-group required">
						<div class="error form-group hide">
							<div class="alert-danger alert">
								Please correct the errors and try again.
								
							</div>
						</div>
						<label class="control-label">Nama Penerima</label>
						<input autocomplete="off" class="form-control" name="name" type="text" required="">
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group card required">
						<label class="control-label">Email</label>
						<input autocomplete="off" class="form-control" type="email" name="email" required="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group card required">
						<label class="control-label">Alamat Penerima</label>
						<input autocomplete="off" class="form-control" type="text" name="address" required="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group cvc required">
						<label class="control-label">Nomor Telepon</label>
						<input autocomplete="off" class="form-control" placeholder="Nomor telepon" name="phone" size="14" type="number">
					</div>
					<div class="form-group expiration required">
						<label class="control-label">Pengambilan</label>
						<input class="form-control datepicker" placeholder="yyyy/mm/dd *kosongkan jika ingin langsung dikirim" data-date-format="yyyy/mm/dd" name="take">
					</div>
				</div>
				
				
				<div class="form-row">
					<div class="form-group">
						<label class="control-label"></label>
						
						<button class="form-control btn btn-primary" type="submit"> Proses →</button>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php } else {?>
<div class="container">
	Keranjang anda masih kosong, silahkan pilih produk kami pada halaman <a href="<?=base_url('product/katalog/')?>">Katalog</a>
</div>
<?php }} ?>
<?php
if (!$this->auth->is_logged_in()){
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="margin-bottom:10px;>
			<form role="form" class="login-form">
				<div class="form-group">
					<input  autofocus autocomplete="off" type="text" name="username" placeholder="Username..." class="form-username form-control input-error" id="username">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password..." class="form-password form-control input-error" id="password">
				</div>
				<button onclick="login(); return false;" class="btn btn-danger btn-block"><i class="fa fa-sign-out"></i> SIGN IN</button>
			</form>
		</div>
	</div>
</div>
<?php }?>
<script type="text/javascript">
$.fn.datepicker.defaults.format = "yyyy/mm/dd";
$('.datepicker').datepicker({
startDate: '-3d'
	});
</script>