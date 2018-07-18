<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_sb extends Public_Controller {

	/**
	 * Constructor
	 * @access  public
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Index
	 * @access  public
	 */
	public function index() {

		$this->vars['page_title'] = 'Stock Semen Beku | BIB Lembang';
		$this->vars['content'] = 'stock_semen';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}
}