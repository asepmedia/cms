<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section class="sidebar">
         <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" class="form-control searchlist" id="searchSidebar" placeholder="Search..." autocomplete="off"/>
                    <span class="input-group-btn">
                        <button type='button' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <ul class="sidebar-menu list" id="menuList">
            </ul>	
	<ul class="sidebar-menu" id="menuSub">
		<li class="header">MAIN NAVIGATION</li>
		<?php if (in_array('dashboard', $this->session->userdata('user_privileges'))) { ?>
			<li class="<?=isset($dashboard) ? 'active':'';?>">
				<a href="<?=site_url('dashboard');?>">
					<i class="fa fa-dashboard"></i> <span>Beranda</span>
				</a>
			</li>
		<?php } ?>

		<li>
			<a href="<?=base_url();?>" target="_blank">
				<i class="fa fa-rocket"></i> <span>Lihat Situs</span>
			</a>
		</li>
	<?php if ($this->session->userdata('user_group_id') == 1) { ?>
			<?php if (in_array('semenbeku', $this->session->userdata('user_privileges'))) { ?>
			<li class="header">PLUGIN NAVIGATION</li>
			<li class="treeview <?=isset($semenbeku) ? 'active':'';?>">
				<a href="#">
					<i class="fa fa-edit"></i> <span>Semen Beku</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">				
					<li <?=isset($orders) ? 'class="active"':'';?>>
						<a href="#"><i class="fa fa-cart-plus"></i> Order <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?=isset($all_semenbeku) ? 'class="active"':'';?>><a href="<?=site_url('blog/semenbeku');?>"><i class="fa fa-navicon"></i> Semua Orders</a></li>
						</ul>
					</li>														
				</ul>
			</li>
			<?php } ?>
		<?php } ?>		
		<!-- @namespace Administrator Menu -->
		<?php if ($this->session->userdata('user_type') === 'super_user' || $this->session->userdata('user_type') === 'administrator') { ?>
			<?php if (in_array('blog', $this->session->userdata('user_privileges'))) { ?>
			<li class="header">PLUGIN NAVIGATION</li>
			<li class="treeview <?=isset($blog) ? 'active':'';?>">
				<a href="#">
					<i class="fa fa-edit"></i> <span>Blog</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">				
					<li <?=isset($image_sliders) ? 'class="active"':'';?>><a href="<?=site_url('blog/image_sliders');?>"><i class="fa fa-picture-o"></i> Gambar Slide</a></li>
					<li <?=isset($messages) ? 'class="active"':'';?>><a href="<?=site_url('blog/messages');?>"><i class="fa fa-envelope-o"></i> Pesan Masuk</a></li>
					<li <?=isset($links) ? 'class="active"':'';?>><a href="<?=site_url('blog/links');?>"><i class="fa fa-link"></i> Tautan</a></li>	
					<li <?=isset($pages) ? 'class="active"':'';?>><a href="<?=site_url('blog/pages');?>"><i class="fa fa-file-o"></i> Halaman</a></li>
					<li <?=isset($posts) ? 'class="active"':'';?>>
						<a href="#"><i class="fa fa-file-text-o"></i> Posting <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?=isset($all_posts) ? 'class="active"':'';?>><a href="<?=site_url('blog/posts');?>"><i class="fa fa-navicon"></i> Semua Posting</a></li>
							<li <?=isset($post_create) ? 'class="active"':'';?>><a href="<?=site_url('blog/posts/create');?>"><i class="fa fa-pencil"></i> Tambah Baru</a></li>
							<li <?=isset($post_categories) ? 'class="active"':'';?>><a href="<?=site_url('blog/post_categories');?>"><i class="fa fa-list-ul"></i> Kategori Posting</a></li>
							<li <?=isset($post_comments) ? 'class="active"':'';?>><a href="<?=site_url('blog/post_comments');?>"><i class="fa fa-comments-o"></i> Komentar</a></li>
							<li <?=isset($tags) ? 'class="active"':'';?>><a href="<?=site_url('blog/tags');?>"><i class="fa fa-tags"></i> Tags</a></li>
						</ul>
					</li>
					<li <?=isset($reports) ? 'class="active"':'';?>>
						<a href="#"><i class="fa fa-file"></i> Laporan <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?=isset($all_reports) ? 'class="active"':'';?>><a href="<?=site_url('blog/reports');?>"><i class="fa fa-navicon"></i> Semua Laporan</a></li>
							<li <?=isset($reports_create) ? 'class="active"':'';?>><a href="<?=site_url('blog/reports/create');?>"><i class="fa fa-pencil"></i> Tambah Baru</a></li>
						</ul>
					</li>
					<li <?=isset($katalog) ? 'class="active"':'';?>>
						<a href="#"><i class="fa fa-cart-plus"></i> Katalog <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?=isset($all_katalog) ? 'class="active"':'';?>><a href="<?=site_url('blog/katalog');?>"><i class="fa fa-navicon"></i> Semua Katalog</a></li>
							<li <?=isset($katalog_create) ? 'class="active"':'';?>><a href="<?=site_url('blog/katalog/create');?>"><i class="fa fa-pencil"></i> Tambah Baru</a></li>
						</ul>
					</li>	
					<li <?=isset($orders) ? 'class="active"':'';?>>
						<a href="#"><i class="fa fa-cart-plus"></i> Order <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?=isset($all_orders) ? 'class="active"':'';?>><a href="<?=site_url('blog/orders');?>"><i class="fa fa-navicon"></i> Semua Orders</a></li>
						</ul>
					</li>														
					<li <?=isset($subscribers) ? 'class="active"':'';?>><a href="<?=site_url('blog/subscribers');?>"><i class="fa fa-folder-open-o"></i> Subscribers</a></li>
				</ul>
			</li>
			<?php } ?>
		<?php } ?>

		<?php if ($this->session->userdata('user_type') === 'super_user' || $this->session->userdata('user_type') === 'administrator') { ?>
			<?php if (in_array('media', $this->session->userdata('user_privileges'))) { ?>
			<li class="treeview <?=isset($media) ? 'active':'';?>">
				<a href="#">
					<i class="fa fa-upload"></i> <span>Media</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li <?=isset($file_manager) ? 'class="active"':'';?>><a href="<?=base_url('assets/plugins/filemanager/dialog.php?akey=sadkjh89jksda8JKL98sjk98JK98skj98');?>" target="_blank"><i class="fa fa-download"></i> File  Manager</a></li>					
					<li <?=isset($files) ? 'class="active"':'';?>><a href="<?=site_url('media/files');?>"><i class="fa fa-paperclip"></i> File</a></li>
					<li <?=isset($file_categories) ? 'class="active"':'';?>><a href="<?=site_url('media/file_categories');?>"><i class="fa fa-tasks"></i> Kategori File</a></li>
					<li <?=isset($albums) ? 'class="active"':'';?>><a href="<?=site_url('media/albums');?>"><i class="fa fa-camera"></i> Album Photo</a></li>
					<li <?=isset($videos) ? 'class="active"':'';?>><a href="<?=site_url('media/videos');?>"><i class="fa fa-film"></i> Video</a></li>
				</ul>
			</li>
			<?php } ?>
		<?php } ?>

		<?php if ($this->session->userdata('user_type') === 'super_user' || $this->session->userdata('user_type') === 'administrator') { ?>
			<?php if (in_array('appearance', $this->session->userdata('user_privileges'))) { ?>
			<li class="treeview <?=isset($appearance) ? 'active':'';?>">
				<a href="#">
					<i class="fa fa-paint-brush"></i> <span>Tampilan</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li <?=isset($menus) ? 'class="active"':'';?>><a href="<?=site_url('appearance/menus');?>"><i class="fa fa-mouse-pointer"></i> Menu</a></li>
					<li <?=isset($themes) ? 'class="active"':'';?>><a href="<?=site_url('appearance/themes');?>"><i class="fa fa-desktop"></i> Tema</a></li>
				</ul>
			</li>
			<?php } ?>
		<?php } ?>
		<?php if ($this->session->userdata('user_type') === 'super_user' || $this->session->userdata('user_type') === 'administrator') { ?>
			<?php if (in_array('acl', $this->session->userdata('user_privileges'))) { ?>
			<li class="header">SETTING NAVIGATION</li>
			<li class="treeview <?=isset($acl) ? 'active':'';?>">
				<a href="#">
					<i class="fa fa-cogs"></i> <span>Pengguna</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<?php if ($this->session->userdata('user_type') == 'super_user') { ?>
					<li <?=isset($administrator) ? 'class="active"':'';?>><a href="<?=site_url('acl/administrator');?>"><i class="fa fa-smile-o"></i> Pembeli</a></li>
					<li <?=isset($superuser) ? 'class="active"':'';?>><a href="<?=site_url('acl/superuser');?>"><i class="fa fa-smile-o"></i> Super User</a></li>
					<?php } ?>
					<li <?=isset($user_groups) ? 'class="active"':'';?>><a href="<?=site_url('acl/user_groups');?>"><i class="fa fa-tasks"></i> Grup Pengguna</a></li>
					<li <?=isset($user_privileges) ? 'class="active"':'';?>><a href="<?=site_url('acl/user_privileges');?>"><i class="fa fa-random"></i> Hak Akses</a></li>
				</ul>
			</li>
			<?php } ?>
		<?php } ?>

		<?php if ($this->session->userdata('user_type') === 'super_user' || $this->session->userdata('user_type') === 'administrator') { ?>
			<?php if (in_array('settings', $this->session->userdata('user_privileges'))) { ?>
			<li class="treeview <?=isset($settings) ? 'active':'';?>">
				<a href="#">
					<i class="fa fa-wrench"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li <?=isset($discussion_settings) ? 'class="active"':'';?>><a href="<?=site_url('settings/discussion');?>"><i class="fa fa-comments-o"></i> Diskusi</a></li>
					<li <?=isset($mail_server_settings) ? 'class="active"':'';?>><a href="<?=site_url('settings/mail_server');?>"><i class="fa fa-envelope"></i> Email Server</a></li>
					<li <?=isset($social_account_settings) ? 'class="active"':'';?>><a href="<?=site_url('settings/social_account');?>"><i class="fa fa-globe"></i> Jejaring Sosial</a></li>
					<li <?=isset($writing_settings) ? 'class="active"':'';?>><a href="<?=site_url('settings/writing');?>"><i class="fa fa-pencil-square-o"></i> Menulis</a></li>
					<li <?=isset($reading_settings) ? 'class="active"':'';?>><a href="<?=site_url('settings/reading');?>"><i class="fa fa-book"></i> Membaca</a></li>					
					<li <?=isset($general_settings) ? 'class="active"':'';?>><a href="<?=site_url('settings/general');?>"><i class="fa fa-sign-out"></i> Umum</a></li>
				</ul>
			</li>
			<?php } ?>
		<?php } ?>

		<?php if ($this->session->userdata('user_type') === 'super_user' || $this->session->userdata('user_type') === 'administrator') { ?>
			<?php if (in_array('maintenance', $this->session->userdata('user_privileges'))) { ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-medkit"></i> <span>Pemeliharaan</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu" style="margin-bottom: 20px">
					<li><a href="<?=site_url('maintenance/backup_database');?>"><i class="fa fa-database"></i> Backup Database</a></li>
					<li><a href="<?=site_url('maintenance/backup_apps');?>"><i class="fa fa-download"></i> Backup Apps</a></li>
				</ul>
			</li>
			<?php } ?>
		<?php } ?>
				<?php 
				$query = get_order_lists(date('Y-m-d'));
				$query_all = get_order_lists_all();
				$query2 = get_order_lists(date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-1, date("Y"))));
				$query4 = get_order_lists(date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y"))));
				?>
		<?php if ($this->session->userdata('user_type') == 'super_user' || $this->session->userdata('user_group_id') == '0') { ?>
							<li class="profile-menu"><a href="<?=base_url('blog/orders')?>" target="_blank"><i class="fa fa-globe"></i>Today <label class="label label-warning"><?=$query->num_rows()?> news</label></a></li>
							<li class="profile-menu"><a href="<?=base_url('blog/orders')?>" target="_blank"><i class="fa fa-globe"></i>Yesterday <label class="label label-success"><?=$query2->num_rows()?> orders</label></a></li>
							<li class="profile-menu"><a href="<?=base_url('blog/orders')?>" target="_blank"><i class="fa fa-globe"></i>This month <label class="label label-success"><?=$query4->num_rows()?> orders</label></a></li>
		<?php } ?>
		<li class="profile-menu">
			<a href="<?=site_url('profile');?>">
				<i class="fa fa-power-off"></i> <span>Ubah Profil</span>
			</a>
		</li>
		<li class="change-password-menu">
			<a href="<?=site_url('change_password');?>">
				<i class="fa fa-power-off"></i> <span>Ubah Kata Sandi</span>
			</a>
		</li>
		
		<li class="power-off-menu">
			<a href="<?=site_url('logout');?>">
				<i class="fa fa-power-off"></i> <span>Keluar</span>
			</a>
		</li>
		
	</ul>
	<br>
 </section>