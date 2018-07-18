<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends Admin_Controller {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model(['m_katalog', 'm_post_categories']);
		$this->pk = M_katalog::$pk;
		$this->table = M_katalog::$table;
	}

	/**
	 * Index
	 */
	public function index() {
		$this->vars['title'] = 'Katalog';
		$this->vars['blog'] = $this->vars['katalog'] = $this->vars['all_katalog'] = true;
		$this->vars['content'] = 'katalog/read';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Add new
	 */
	public function create() {
		$this->load->helper('form');
		$id = $this->uri->segment(4);
		if ($id && $id != 0 && ctype_digit((string) $id)) {
			$this->vars['query'] = $this->model->RowObject($this->table, $this->pk, $id);
			$post_image = './media_library/posts/thumbnail/'.$this->vars['query']->post_image;
			$this->vars['post_image'] = file_exists($post_image) ? base_url($post_image) : '';
		} else {
			$this->vars['query'] = false;
		}
		$this->vars['categories'] = $this->m_post_categories->get_all();
		$this->vars['title'] = $id && is_int(intval($id)) ? 'Edit Katalog' : 'Laporan Produksi';
		$this->vars['blog'] = $this->vars['katalog'] = $this->vars['katalog_create'] = true;
		$this->vars['action'] = site_url('blog/katalog/save/'.$id);
		$this->vars['content'] = 'produksi/create';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Pagination
	 */
	public function pagination() {
		$page_number = (int) $this->input->post('page_number', true);
		$limit = (int) $this->input->post('per_page', true);
		$keyword = trim($this->input->post('keyword', true));
		$sort_field = trim($this->input->post('sort_field', true));
		$sort_type = trim($this->input->post('sort_type', true));
		$offset = ($page_number * $limit);
		$query = $this->m_katalog->get_where($keyword, $limit, $offset, $sort_field, $sort_type);
		$total_rows = $this->m_katalog->total_rows($keyword);
		$total_page = $limit > 0 ? ceil($total_rows / $limit) : 1;
		if ($query->num_rows() > 0) {
			$rows = [];
			foreach($query->result() as $row) {
				$rows[] = $row;
			}
			$data = [
				'total_page' => intval($total_page),
				'total_rows' => intval($total_rows),
				'rows' 		 => $rows
			];
		} else {
			$data = [
				'total_page' => 0,
				'total_rows' => 0
			];
		}

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}
	
	/**
	 * Save or Update
	 * @return 	Object 
	 */
	public function save() {
		$rows	= explode("\n", $this->input->post('laporan_produksi'));
		$success = 0;
		$failed = 0;
		$exist = 0;
		foreach($rows as $row) {
			$exp = explode("\t", $row);
			$fields = [];
			$date = trim($exp[1]);
			$newDate = date("Y-m-d", strtotime($date));
			$fields['id_pembuatan'] = trim($exp[0]);
			$fields['tanggal'] = $newDate;
			$fields['jumlah'] = trim($exp[2]);
			$fields['spesies'] = trim($exp[3]);
			$fields['id_pejantan'] = trim($exp[4]);
			$this->model->insert('laporan_produksi', $fields);
		}
		redirect('blog/produksi/create');
		// $response = [];
		// $response['type'] = 'info';
		// $response['message'] = 'Success : ' . $success. ' rows, Failed : '. $failed .', Exist : ' . $exist;
		// $this->output
		// 	->set_content_type('application/json', 'utf-8')
		// 	->set_output(json_encode($response, JSON_PRETTY_PRINT))
		// 	->_display();
		// exit;
	}

}