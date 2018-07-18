<div class="col-sm-6 col-sm-offset-3 form-box">
	<div class="form-top">
		<div class="form-top-left">
			<h2>Daftar</h2>
		</div>
	</div>
	<div class="form-bottom">
		<?php if((validation_errors()))
		{?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo validation_errors(); ?>
		</div>
		<?php }
		?>
		<?php
		if(($this->session->flashdata('success')))
		{?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php }
		?>
		<?php
		if(($this->session->flashdata('failure')))
		{?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $this->session->flashdata('failure'); ?>
		</div>
		<?php }
		?>
		<form role="form" class="login-form" method="post" action="<?=base_url('signup/process')?>">
			<div class="form-group">
				<label for="email">Name</label>
				<input autofocus autocomplete="off" type="text" name="name" placeholder="Name..." class="form-username form-control input-error" id="username" required>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input  autofocus autocomplete="off" type="text" name="email" placeholder="Email..." class="form-username form-control input-error" id="username" required>
			</div>
			<div class="form-group">
				<label for="email">Password</label>
				<input type="password" name="password" placeholder="Password..." class="form-password form-control input-error" id="password" required>
			</div>
			<div class="form-group">
				<label for="repeat_password">Repeat Password</label>
				<input type="password" name="repeat_password" placeholder="Password..." class="form-password form-control input-error" id="repeat_password" required>
			</div>
			<div class="form-group">
				<label for="biography">Biography</label>
				<textarea class="form-password form-control input-error" name="biography" placeholder="Biography"></textarea>
			</div>
			<button class="btn btn-block btn-danger" type="submit"><i class="fa fa-sign-out"></i> SIGN UP</button>
		</form>
		<form action="<?=base_url('login')?>">
			<br/>
			<button class="btn pull-right btn-primary" type="submit"><i class="fa fa-sign-in"></i> SIGN IN</button>
		</form>
	</div>
</div>