<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?=link_tag('assets/css/jquery-ui.css');?>
<script type="text/javascript" src="<?=base_url('assets/js/jquery-ui.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/tinymce/tinymce.min.js');?>"></script>
<script type="text/javascript">
	/** @namespace tinymce */
	tinymce.init({
      selector: "#post_content",
      menubar : false,
		external_filemanager_path:"../filemanager/",
		filemanager_title:"Filemanager" ,
		filemanager_access_key:"sadkjh89jksda8JKL98sjk98JK98skj98" ,	     
      toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent table",
      toolbar2: "fontsizeselect styleselect | link unlink anchor image | forecolor backcolor code",
      image_advtab: true,
      fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
      relative_urls: false,
		remove_script_host: false,
      plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
         "table contextmenu directionality emoticons paste textcolor",
         "code autoresize"
      ],
      external_filemanager_path:_BASE_URL + "assets/plugins/filemanager/",
      filemanager_title:"Media",
      external_plugins: { 
         "filemanager" : _BASE_URL + "assets/plugins/filemanager/plugin.min.js"
      }
   });

	/* Save Post Category */
	function save_post_category() {
		var values = {
			category: $('#category').val()
		}
		$.post(_BASE_URL + 'blog/post_categories/save', values, function(response) {
			var res = H.stringToJSON(response);
			if (res.type == 'error') {
				H.growl(res.type, H.message(res.message));
			}
			if (res.type == 'success') {
				var str = '<div class="checkbox">' 
				+ '<label>' 
				+ '<input type="checkbox" class="checkbox" name="post_categories[]" value="'+res.insert_id+'">' 
				+ values.category
				+ '</label>'
				+ '</div>';
				var el = $("div.checkbox:last"); 
				$( str ).insertAfter(el);
				$('.category-form').modal('hide');
			}
		});
	}

	/** @namespace posts */
	$( document ).ready( function() {
		/* Show Form Add New category */
		$('.add-new-category').on('click', function(e) {
			e.preventDefault();
			$('#category').val('');
			$('.category-form').modal('show');
		});

		/* Triger Tinymce plugins */
		$('.tiny-text').on('click', function (e) {
			e.preventDefault();
			$('.tiny-text').addClass('btn-success');
			$('.tiny-visual').removeClass('btn-success').addClass('btn-default');
			tinymce.EditorManager.execCommand('mceRemoveEditor',true, 'post_content');
		});

		/* Remove Tinymce plugins */
		$('.tiny-visual').on('click', function (e) {
			e.preventDefault();
			$('.tiny-visual').addClass('btn-success');
			$('.tiny-text').removeClass('btn-success').addClass('btn-default');
			tinymce.EditorManager.execCommand('mceAddEditor',true, 'post_content');
		});

		// Image Preview 
		$('#post_image').on('change', function() {
			$('#preview').show();
			H.preview(this);
		});

		// Image Preview 
		$('#preview').on('dblclick', function() {
			$('#preview')
				.hide()
				.removeAttr('src');
		});

		/* Tags */
		$('#post_tags').tagsInput({
			'width': 'auto',
			'autocomplete_url': _BASE_URL + 'blog/tags/autocomplete',
		   'interactive':true,
		   'defaultText':'Add New',
		   'delimiter': [', '],   // Or a string with a single delimiter. Ex: ';'
		   'removeWithBackspace' : true,
		   'minChars' : 0,
		   'maxChars' : 0, // if not provided there is no limit
		   'placeholderColor' : '#666666'
		});

		/* Submit Posts */
		$( '#submit' ).on('click', function(event) {
			event.preventDefault();
			var categories = $("input.checkbox:checked");
			var post_categories = [];
			categories.each( function() {
			  post_categories.push($(this).val());
			});

			var fill_data = new FormData();
			fill_data.append('products', $('#products').val());
			fill_data.append('status', $('#status').val());
			// send data
			$.ajax({
				url: '<?=$action;?>',
				type: 'POST',
				data: fill_data,
				contentType: false,
				processData: false,
				success : function( response ) {
					var res = typeof response !== 'object' ? $.parseJSON( response ) : response;
					H.growl(res.type, H.message(res.message));
					if (res.action == 'save')  {
						$('#status').val('belum bayar');
						$('#products').focus();
					}
				}
			});   
		});  
	});
</script>
<section class="content-header">
   <h1><i class="fa fa-edit"></i> <?=$title;?></h1>
</section>
<section class="content">
	<form>
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group" style="margin-bottom: 10px;">
							<input id="products" name="products" value="<?=($query ? $query->products : '');?>" autofocus required="true" type="text" class="form-control input-lg" placeholder="Enter title here..." style="font-size: 16px" disabled>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-send-o"></i> Publikasi</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label" for="status">Status</label>
									<?=form_dropdown('status', ['selesai' => 'Selesai', 'pengiriman' => 'Pengiriman', 'proses pengiriman' => 'Sedang diproses', 'belum bayar' => 'Belum melakukan Transaksi'], ($query ? $query->status : ''), 'class="form-control input-sm" id="status"');?>			
								</div>
							</div>
						</div>   						
					</div>
					<div class="box-footer">
						<div class="btn-group pull-right">
							<button type="reset" class="btn btn-info btn-sm"><i class="fa fa-retweet"></i> ATUR ULANG</button>
							<button type="submit" id="submit" class="btn btn-primary btn-sm"><i class="fa fa-send-o"></i> SIMPAN</button>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>
<div class="modal modal-form category-form">
   <div class="modal-dialog">
      <form class="form-horizontal form-dialog" role="form" method="post">
         <div class="modal-content">
            <div class="modal-body">                    
               <div class="form-group" style="margin-top: 10px;padding: 10px 0;">
                  <div class="btn-group col-md-9 col-md-offset-3" id="container_upload">
                     <button onclick="save_post_category(); return false;" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SIMPAN</button>
                     <button type="reset" id="reset" class="btn btn-info btn-sm reset"><i class="fa fa-refresh"></i> ATUR ULANG</button>
                     <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-mail-forward"></i> KEMBALI</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>