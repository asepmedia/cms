<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript" src="<?=base_url('assets/plugins/tinymce/tinymce.min.js');?>"></script>
<script type="text/javascript">
   /** @namespace tinimce */
   tinymce.init({
      selector: "#post_content",
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
      image_class_list: [
          {title: 'Responsive', value: 'img-responsive'},
          {title: 'None', value: ''}
      ],       
      external_filemanager_path:"<?=base_url();?>assets/plugins/filemanager/",
      filemanager_title:"Media",
      external_plugins: { 
         "filemanager" : "<?=base_url();?>assets/plugins/filemanager/plugin.min.js"
      }
   });

   /** @namespace posts */
   $( document ).ready( function() {
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

      /* Browse File */
      $('#browse-file').on('click', function() {
         var options = {
            url: '<?=base_url('assets/plugins/filemanager/dialog.php?type=1&amp;field_id=post_image');?>',
            size: 'lg' 
         }
         eModal.iframe(options, 'Media Library'); // size: eModal.size.lg,
      });

      $( '#submit' ).on('click', function(event) {
         event.preventDefault();
         var field_data = {
            post_title: $('#post_title').val(),
            post_content: tinyMCE.get('post_content').getContent(),
            post_status: $('#post_status').val(),
            post_visibility: $('#post_visibility').val(),
            post_comment_status: $('#post_comment_status').val()
         };
         // send data
         $.post('<?=$action;?>', field_data, function(response) {
            var res = H.stringToJSON(response);
            H.growl(res.type, H.message(res.message));
            if (res.action == 'save') {
               $('input[type="text"]').val('');
               $('#post_status').val('publish');
               $('#post_visibility').val('public');
               $('#post_comment_status').val('open');
               tinyMCE.get('post_content').setContent('');
               $('#post_title').focus();
            }
         }).fail( function( xhr, textStatus, errorThrown ) {
            xhr.textStatus = textStatus;
            xhr.errorThrown = errorThrown;
            if( !errorThrown ) errorThrown = 'Unable to load resource, network connection or server is down?';
            H.growl('error', textStatus + ' ' + errorThrown + '<br/>' + xhr.responseText );
         });    
      });  
   });
</script>
<section class="content-header">
   <h1><i class="fa fa-edit"></i> <?=$title;?></h1>
 </section>
<section class="content">
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-body">
               <div class="alert alert-info">
                  <p>COPY DATA DARI EXCELL DENGAN FORMAT <strong>| ID PEMBUATAN | TANGGAL[Y-m-D] Cont: 2018-04-22 | JUMLAH | SPESIES | ID PEJANTAN</strong></p>
               </div>
               <form action="<?=base_url();?>blog/produksi/save" method="POST">
               <div class="form-group">
                  <textarea class="form-control" rows="25" name="laporan_produksi"></textarea>
               </div>
               <div class="form-group">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-send"></i>Save</button>
               </div>
               </form>               
            </div>
         </div>
      </div>
   </div>
</section>