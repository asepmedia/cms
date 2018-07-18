<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

public function __construct()
{
parent::__construct();
//Load Library and model.
$this->load->library('cart');
}

public function add(){
	$cart = array(
		'id' => 1,
		'name'	=> 2
	);

	echo "Sukses";
}

public function show(){
	$cart = $this->cart->contents();

	print_r($cart);
}

}