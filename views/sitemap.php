<div class="container">
	<div class="row">
		<h3>Sitemap</h3>
		<ul>
			<li><a href="<?=base_url()?>">BERANDA</a></li>
			<?php
			foreach ($menus as $menu) {
				echo '<li>';
						$sub_nav = recursive_list($menu['child']);
						$url = base_url() . $menu['menu_url'];
						if ($menu['menu_type'] == 'links') {
							$url = $menu['menu_url'];
						}
						echo anchor($url, strtoupper($menu['menu_title']). ($sub_nav ? ' <span class="caret"></span>':''), 'target="'.$menu['menu_target'].'"');
						if ($sub_nav) {
							echo '<ul>';
									echo recursive_list($menu['child']);
							echo '</ul>';
						}
				echo '</li>';
			}?>
		</ul>
	</div>
</div>