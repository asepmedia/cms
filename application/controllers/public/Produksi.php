<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Produksi extends Public_Controller {

	/**
	 * Constructor
	 * @access  public
	 */
	public function __construct() {
		parent::__construct();
		$this->load->helper(['text']);
		$this->load->model(['m_posts', 'm_pages', 'm_katalog', 'm_reports']);
	}

	/**
	 * Index
	 */
	public function index() {
		$this->vars['title'] = 'Laporan Produksi';
		$this->vars['content'] = 'themes/'.theme_folder().'/laporan-produksi';
		$this->vars['produksi'] = $this->db->get('laporan_produksi')->result();
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}
}