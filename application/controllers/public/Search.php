<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends Public_Controller {

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
	 * @access  public
	 */
	public function index() {
		$keyword = trim($this->input->post('keyword', true));
		if (!$keyword) {
			redirect(base_url());
		}
		$this->session->set_userdata('keyword', $keyword);
		$this->vars['title'] = 'Kata Kunci "'.$this->session->userdata('keyword').'"';
		$this->vars['posts'] = $this->m_posts->search($keyword);
		$this->vars['pages'] = $this->m_pages->search($keyword);
		$this->vars['reports'] = $this->m_reports->search($keyword);
		$this->vars['katalog'] = $this->m_katalog->search($keyword);
		$this->vars['content'] = 'themes/'.theme_folder().'/search-results';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}
}