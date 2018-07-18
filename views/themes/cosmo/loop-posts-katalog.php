<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	function remove_tags(input) {
		return input.replace(/(<([^>]+)>)/ig,"");
	}
	var page = 1;
	var total_page = "<?=$total_page;?>";
	$(document).ready(function() {
		if (parseInt(total_page) == page || total_page == 0) {
			$('button.load-more').remove();
		}
	});

	function load_more() {
		page++;
		var segment_1 = '<?=$this->uri->segment(1)?>';
		var segment_2 = '<?=$this->uri->segment(2)?>';
		var segment_3 = '<?=$this->uri->segment(3)?>';
		var segment_4 = '<?=$this->uri->segment(4)?>';
		var url = '';
		var data = {
			'page_number': page
		};
		if (segment_1 == 'product') {
			data['slug'] = segment_2;
			url = _BASE_URL + 'public/post_categories/more_katalog';
		}	
		if (segment_2 == 'category') {
			data['tag'] = segment_3;
			url = _BASE_URL + 'public/post_tags/more_katalog';
		}						
		if ( page <= total_page ) {
			$.post( url, data, function( response ) {
				var res = typeof response !== 'object' ? $.parseJSON( response ) : response;
				var rows = res.rows;
				var html = '';
				var idx = 3;
				for (var z in rows) {
					var result = rows[ z ];
					if (idx % 3 == 0) {
						html += '<div class="row loop-posts">';
					}
					html += '<div class="col-md-4">';
					html += '<div class="thumbnail no-border">';
					html += '<img src="' + _BASE_URL + 'media_library/posts/medium/' + result.post_image + '" style="width: 100%; display: block;">';
					html += '<div class="caption">';
					html += '<h4><a href="' + _BASE_URL + 'read/katalog/' + result.id + '/' + result.post_slug + '">' + result.post_title + '</a></h4>';
					html += '<p>' + remove_tags(result.post_content, '').substr(0, 150) + '</p>';
					html += '<p>';
					html += '<form action="<?=site_url('public/cart/add')?>" method="post">';
					html += '<input type="hidden" name="id" value="'+result.id+'">';
					html += '<input type="hidden" name="name" value="'+result.post_title+'">';	
					html += '<input type="submit" class="btn btn-danger no-border btn-sm btn-block" value="ADD TO CART">';				
					html += '</form>';		
					html += '<br/>';			
					html += '<a href="' + _BASE_URL + 'read/katalog/' +result.id + '/' + result.post_slug + '" class="btn btn-danger btn-sm btn-block no-border grey lighten-2 grey-text text-darken-2" role="button">SELENGKAPNYA</a>';
					html += '</p>';
					html += '</div>';
					html += '</div>';
					html += '</div>';
					if (idx % 3 == 2 || (res.result_rows + 2) == idx) {
						html += '</div>';
					}
					idx++;
				}
				var el = $(".loop-posts:last"); 
				$( html ).insertAfter(el);
				if (page == total_page) {
					$('button.load-more').remove();
				}
			});
		}
	}
</script>
<div class="col-xs-12 col-md-8">
	<ol class="breadcrumb post-header">
		<li><?=strtoupper($title)?></li>
	</ol>
	<?php $i=1;?>
	<?php $idx = 3; $rows = $query->num_rows(); foreach($query->result() as $row) { ?>
		<?=($idx % 3 == 0) ? '<div class="row loop-posts">':''?>
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
		<?=(($idx % 3 == 2) || ($rows+2 == $idx)) ? '</div>':''?>
	<?php $idx++; } ?>
	<button class="btn btn-success btn-sm btn-block load-more" onclick="load_more()">MORE KATALOG</button>
	<br/>
</div>
<?php $this->load->view('themes/cosmo/sidebar')?>