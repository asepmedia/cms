<?php
 class Cart extends Public_Controller {

  function __construct() {
   parent::__construct();
   $this->load->library('form_validation'); // digunakan untuk proses validasi yg di input
   $this->load->model('billing_model');
   $this->load->helper(['captcha', 'string', 'blog_helper', 'text','form']);
   $this->load->database(); // Load our cart model for our entire class
  }
  
  function index() {
   $data['produk'] = $this->cart_model->tampil_produk();
   $this->load->view('home_cart', $data); // Display the page
  }
  
  function add() {
     $data = array(
      'id'      => $this->input->post('id'),
      'price'	=> 0,
      'qty'     => 1,
      'name'    => $this->input->post('name')
     );

     $this->cart->insert($data);
     redirect($this->agent->referrer());
  }
  function add_now() {
     $data = array(
      'id'      => $this->input->post('id'),
      'price'	=> 0,
      'qty'     => 1,
      'name'    => $this->input->post('name')
     );

     $this->cart->insert($data);
     redirect(site_url('public/cart/billing_view'));
  }
function remove($rowid) {
// Check rowid value.
if ($rowid==="all"){
// Destroy data which store in session.
$this->cart->destroy();
}else{
// Destroy selected rowid in session.
$data = array(
'rowid' => $rowid,
'qty' => 0
);
// Update cart data, after cancel.
$this->cart->update($data);
}

// This will show cancel data in cart.
redirect($this->agent->referrer());
}  
  function update_cart(){
	$cart_info = $_POST['cart'] ;
	foreach( $cart_info as $id => $cart)
	{
	$rowid = $cart['rowid'];
	$qty = $cart['qty'];

	$data = array(
	'rowid' => $rowid,
	'qty' => $qty
	);

	$this->cart->update($data);
	}
	redirect($this->agent->referrer());
  }
  
  function show_cart() {
   print_r($this->cart->contents());
  }
 function billing_view(){
	$this->vars['content'] = 'billing_views';
	$this->vars['captcha'] = $this->model->set_captcha();
	$this->load->view('themes/'.theme_folder().'/index', $this->vars);	
  } 
  function empty_cart() {
   $this->cart->destroy();
   redirect($this->agent->referrer());
  }
  function total_cart() {
   $data['total'] = $this->cart->total_items();
   $this->load->view('total',$data);
  }
  
  //Sintak Untuk Menimpan ke database
	public function save_order()
	{
		$cart_session = $this->cart->contents();
		$isession =0;
		foreach ($cart_session as $key) {
			$isession = $key['id'];
		}
		$tj = $isession + rand(0,200);
		$tjb1 = $tj;
		$tjb2 = $tjb1;

		$customer = array(
		'name' => $this->input->post('name'),
		'email' => $this->input->post('email'),
		'address' => $this->input->post('address'),
		'phone' => $this->input->post('phone'),
		'join_tb' => $tjb1
		);

		$cust_id = $this->billing_model->insert_customer($customer);

		$order = array(
		'date' => date('Y-m-d'),
		'customerid' => $this->session->userdata('id')
		);

		if ($cart = $this->cart->contents()):
		foreach ($cart as $item):
		$order_detail = array(
		'customerid' => $this->session->userdata('id'),	
		'invoice' => $this->session->userdata('id')+rand(40000,90391),
		'products' => $item['name'],
		'quantity' => $item['qty'],
		'date' => date('Y-m-d'),
		'take_at' => $this->input->post('take'),
		'join_tb' => $tjb2
		);

		$cust_id = $this->billing_model->insert_order_detail($order_detail);
		endforeach;
		endif;

		$this->cart->destroy();
		$this->vars['content'] = 'billing_success';
		$this->vars['captcha'] = $this->model->set_captcha();
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}	
	public function send_email($title=0, $content=0){
	    $subject = 'Jugajuga';
		$result = $this->email
		    ->from('auto-notif@system.com', 'no-replays | Multi E-System')
		    ->to('asepmedia18@gmail.com')
		    ->subject($subject)
		    ->message('Hai juga')
		    ->send();

		var_dump($result);
		echo '<br />';
		echo $this->email->print_debugger();

		exit;		
	}	
}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */

?>