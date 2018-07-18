<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
	var _grid = 'POSTS';
    new GridBuilder( _grid , {
        controller:'blog/semenbeku',
        fields: [
             { header:'Invoice', renderer:'invoice' },
    		{ header:'Produk', renderer:'products' },
            { header:'Customer', renderer:'receive' },
            { header:'Qty', renderer:'quantity' },
            { header:'Pengambilan', renderer:'take_at' },
            { header:'Status', renderer:'status' },
            { header:'Tanggal', renderer:'date', type:'date' }
    	],
        can_add:false,
        extra_buttons: false
    });
</script>