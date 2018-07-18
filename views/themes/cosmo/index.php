<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=isset($page_title) ? $page_title . ' | ' : ''?><?=$this->session->userdata('school_name')?></title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="keywords" content="<?=$this->session->userdata('meta_keywords');?>"/>
		<meta name="description" content="<?=$this->session->userdata('meta_description');?>"/>
		<meta name="copyright" content="<?=$this->session->userdata('school_name')?>">
		<meta name="language" content="Indonesia">
		<meta name="robots" content="index,follow" />
		<meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm" />
		<meta name="Classification" content="Organization">
		<meta name="url" content="http://biblembang.ditjenpkh.pertanian.go.id/">
		<meta name="identifier-URL" content="http://biblembang.ditjenpkh.pertanian.go.id/">
		<meta name="category" content="Organization">
		<meta name="coverage" content="Worldwide">
		<meta name="distribution" content="Global">
		<meta name="rating" content="General">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Copyright" content="<?=$this->session->userdata('school_name');?>" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="revisit-after" content="7" />
		<meta name="webcrawlers" content="all" />
		<meta name="rating" content="general" />
		<meta name="spiders" content="all" />
		<meta itemprop="name" content="<?=$this->session->userdata('school_name');?>" />
		<meta itemprop="description" content="<?=$this->session->userdata('meta_description');?>" />
		<meta itemprop="image" content="<?=base_url('media_library/images/'. $this->session->userdata('logo'));?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="<?=$this->session->userdata('csrf_token')?>">
		<link rel="icon" href="<?=base_url('media_library/images/'.$this->session->userdata('favicon'));?>">
		<?=link_tag('views/themes/cosmo/css/bootstrap.css')?>
		<?=link_tag('views/themes/cosmo/css/font-awesome.min.css')?>
		<?=link_tag('views/themes/cosmo/css/color.css')?>
		<?=link_tag('views/themes/cosmo/css/sm-core-css.css')?>
		<?=link_tag('views/themes/cosmo/css/jquery.smartmenus.bootstrap.css')?>
		<?=link_tag('assets/css/magnific-popup.css');?>
		<?=link_tag('assets/css/toastr.css');?>
		<?=link_tag('assets/css/jssocials.css');?>
		<?=link_tag('assets/css/jssocials-theme-flat.css');?>
		<?=link_tag('assets/css/bootstrap-datepicker.css');?>
		<?=link_tag('assets/fonts/roboto-condensed/roboto-condensed.css');?>
		<?=link_tag('views/themes/cosmo/css/style.css')?>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/tabs.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/tabstyles.css')?>" />
  		<script src="<?=base_url('assets/js/modernizr.custom.js')?>"></script>	
		<script type="text/javascript">
		const _BASE_URL = '<?=base_url();?>';
		</script>
		<script src="<?=base_url('assets/js/frontend.min.js');?>"></script>
		<style type="text/css">
		.carousel-inner > .item > img {
		margin: 0 auto;
		background-color: #fff!important;
		}
		.slider{
			background-color: #fff!important;
			margin: 0!important;
			padding: 0!important;
		}
		.carousel-inner > .item {
		margin: 0 auto;
		background-color: #fff!important;
		box-shadow: none!important;
		}
		.jssorb05 {position: absolute;}
		.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {position: absolute;width: 16px;height: 16px;
		overflow: hidden;cursor: pointer;}
		.jssorb05 div { background-position: -7px -7px; }
		.jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
		.jssorb05 .av { background-position: -67px -7px; }
		.jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
		.jssora22l, .jssora22r {display: block;position: absolute;width: 40px;height: 58px;cursor: pointer;}
		.jssora22l { background-position: -10px -31px; }
		.jssora22r { background-position: -70px -31px; }
		.jssora22l:hover { background-position: -130px -31px; }
		.jssora22r:hover { background-position: -190px -31px; }
		.jssora22l.jssora22ldn { background-position: -250px -31px; }
		.jssora22r.jssora22rdn { background-position: -310px -31px; }
		.jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
						.jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
		</style>
	</head>
	<body>
		<!-- Header -->
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<p align="center">
							<a href="<?=base_url()?>"><img src="<?=base_url('media_library/images/'.$this->session->userdata('logo'))?>" alt="logo" class="img-responsive"></a>
							<?php
							$array_hari = array(1=>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
							$array_bulan = array(1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
							$hari = $array_hari[date('N')];
							$bulan = $array_bulan[date('n')];
							$tanggal = date('j');
							$tahun = date('Y');
							echo $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End Header -->
		<?php
		if($content == 'themes/'.theme_folder().'/home'){
		?>
		<?php $query = get_image_sliders(); if ($query->num_rows() > 0) { ?>
		<!-- Image Slider -->
		<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
			<!-- Loading Screen -->
			<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
			</div>
			<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;"  id="test">
				<a data-u="any" style="display:none">Full Width Slider</a>
				<?php $idx = 0; foreach($query->result() as $row) { ?>
				<div><img data-u="image" src="<?=base_url('media_library/image_sliders/'.$row->image);?>" title="slider image" alt="slider image"/></div>
				<?php $idx++; } ?>
			</div>
			
		</div>
		<?php } ?>
		<!-- End Image Slider -->
		<?php } ?>
		<!-- Top Nav -->
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				Menu <i class="fa fa-bars"></i>
				</button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?=base_url()?>index">BERANDA</a></li>
					<?php
					foreach ($menus as $menu) {
						echo '<li>';
									$sub_nav = recursive_list($menu['child']);
									$url = base_url() . $menu['menu_url'];
									if ($menu['menu_type'] == 'links') {
										$url = $menu['menu_url'];
									}
									echo anchor($url, strtoupper($menu['menu_title']). ($sub_nav ? ' <span class="caret"></span>':''), 'target="'.$menu['menu_target'].'"');
										echo '<ul class="dropdown-menu">';
									if ($sub_nav) {
													echo recursive_list($menu['child']);
										echo '</ul>';
									}
						echo '</li>';
					}?>
				</ul>
			</div>
		</nav>
		<div class="container-fluid">
			<!-- Content -->
			<div class="row">
				<!-- Right Content -->
				<?php $this->load->view($content)?>
			</div>
			</div> <!-- /container -->
		<?php 
		if(!$this->auth->is_logged_in()): 
		if($content == 'themes/'.theme_folder().'/home'):
		?>
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		<div class="modal-dialog">
			<div style="width: 320px!important; margin: auto;opacity: 1">
				<div class="modal-header" style="border:none;">
					<button type="button" class="close pull-right white-text" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<br/>
					<div class="row">
						<div class="col-md-12" style="text-align:center;">
							<a href="javascript:void(0);" onclick="window.open('<?=base_url('kuisioner')?>', 'survey biblembang'); jQuery('#myModal').modal('hide'); ">
								<img src="<?=base_url('assets/img/popup-ikm.png')?>" class="img-responsive"/>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center" style="text-align:center;">
							
							<p class="white-text"><a class="orange-text" href="<?=base_url('login')?>">Masuk</a> / <a class="orange-text" href="<?=base_url('signup')?>">Daftar</a> untuk menghilangkan popup ini.</p>
						</div>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<?php 
		endif;
		endif;
		?>
		<!-- COPYRIGHT -->
		<div class="copyright" style="background-color: #fff!important;color:#666">
			<p class='text-muted'>
				<img src='<?=base_url("assets/img/logofooter.jpg");?>' style='max-width: 50px;width: 100%;' title='logo bawah' alt='logo bawah'><br/>
				Kementerian Pertanian<br/>
				Direktorat Jenderal Peternakan dan Kesehatan Hewan<br/>
				Balai Inseminasi Buatan Lembang<br/>
				Jl. Kayu Ambon, Kayuambon, Lembang, Bandung, Jawa Barat 40391 <br/>
			Telepon : (022) 2786222, 2785307 Fax.(022) 2787271</p>
		</div>
		<!-- END COPYRIGHT -->
		
		<!-- Back to Top -->
		<a href="javascript:" id="return-to-top" class="red"><i class="fa fa-angle-double-up"></i></a>
		<script src="<?=base_url('assets/js/cbpFWTabs.js')?>"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>			
		<script>
		// Scroll Top
			$(window).scroll(function() {
				if ($(this).scrollTop() >= 50) {
					$('#return-to-top').fadeIn(200);
				} else {
					$('#return-to-top').fadeOut(200);
				}
			});
			$('#return-to-top').click(function() {
				$('body,html').animate({
					scrollTop : 0
				}, 500);
			});
		</script>
		<script src="<?=base_url('assets/js/jssor.slider-22.1.8.mini.js')?>" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
			var jssor_1_options = {
			$AutoPlay: true,
			$SlideDuration: 70,
			$SlideEasing: $Jease$.$OutQuint,
			$ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$
			},
			$BulletNavigatorOptions: {
			$Class: $JssorBulletNavigator$
			}
			};
			var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
			function ScaleSlider() {
			var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
			if (refSize) {
			refSize = Math.min(refSize, 1920);
			jssor_1_slider.$ScaleWidth(refSize);
			}
			else {
			window.setTimeout(ScaleSlider, 30);
			}
			}
			ScaleSlider();
			$(window).bind("load", ScaleSlider);
			$(window).bind("resize", ScaleSlider);
			$(window).bind("orientationchange", ScaleSlider);
									});
		</script>
		<div id='fb-root'></div>
		<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = '//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.9';
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<script type="text/javascript">
		$(window).on('load',function(){
		$('#myModal').modal('show');
		});
		</script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111725855-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-111725855-1');
		</script>
		
	</body>
</html>