<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CMS Sekolahku | CMS (Content Management System) dan PPDB/PMB Online GRATIS 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    2.0.0
 * @author     Anton Sofyan | https://facebook.com/antonsofyan | 4ntonsofyan@gmail.com | 0857 5988 8922
 * @copyright  (c) 2014-2017
 * @link       http://sekolahku.web.id
 * @since      Version 2.0.0
 *
 * PERINGATAN :
 * 1. TIDAK DIPERKENANKAN MEMPERJUALBELIKAN APLIKASI INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 2. TIDAK DIPERKENANKAN MENGHAPUS KODE SUMBER APLIKASI.
 * 3. TIDAK MENYERTAKAN LINK KOMERSIL (JASA LAYANAN HOSTING DAN DOMAIN) YANG MENGUNTUNGKAN SEPIHAK.
 */

class Orders extends Admin_Controller{

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model(['m_orders', 'm_post_categories']);
		$this->pk = M_orders::$pk;
		$this->table = M_orders::$table;
	}

	/**
	 * Index
	 */
	public function index() {
		$this->vars['title'] = 'Order List';
		$this->vars['blog'] = $this->vars['orders'] = $this->vars['all_orders'] = true;
		$this->vars['content'] = 'orders/read';
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
		} else {
			$this->vars['query'] = false;
		}
		$this->vars['categories'] = $this->m_post_categories->get_all();
		$this->vars['title'] = $id && is_int(intval($id)) ? 'Edit Order' : 'Tambah Order';
		$this->vars['blog'] = $this->vars['orders'] = $this->vars['orders_create'] = true;
		$this->vars['action'] = site_url('blog/orders/save/'.$id);
		$this->vars['content'] = 'orders/create';
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
		$query = $this->m_orders->get_where($keyword, $limit, $offset, $sort_field, $sort_type);
		$total_rows = $this->m_orders->total_rows($keyword);
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
		$id = (int) $this->uri->segment(4);
		$response = [];
		if ($this->validation()) {
			$fill_data = $this->fill_data();
			$error_msg = [];
			if (!empty($_FILES['post_image'])) {
				$upload = $this->upload($id);
				if ($upload['type'] == 'success') {
					$fill_data['post_image'] = $upload['file_name'];
				} else {
					$error_msg = $upload['message'];
				}
			}
			if (count($error_msg) > 0) {
				$response['action'] = 'error';
				$response['type'] = 'error';
				$response['message'] = $error_msg;
			} else {
				if ($id == 0) {
					$fill_data['created_at'] = NULL;
					$response['action'] = 'save';
					$response['type'] = $this->model->insert($this->table, $fill_data) ? 'success' : 'error';
					$response['message'] = $response['type'] == 'success' ? 'created' : 'not_created';
				} else {
					$response['action'] = 'update';		
					$response['type'] = $this->model->update($id, $this->table, $fill_data) ? 'success' : 'error';
					$response['message'] = $response['type'] == 'success' ? 'updated' : 'not_updated'; 
				}
			}
		} else {
			$response['action'] = 'validation_errors';
			$response['type'] = 'error';
			$response['message'] = validation_errors();
		}

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	/**
	 * fill_data
	 */
	private function fill_data() {
		return [
			'products' => $this->input->post('products', true),
			'status' => $this->input->post('status', true)
		];
	}

	/**
	 * Validations Form
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('products', 'Produk', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}

	/**
	 * Upload
	 * @return Void
	 */
	private function upload($id) {
		$response = [];
		$config['upload_path'] = './media_library/images/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = 0;
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('post_image')) {
			$response['type'] = 'error';
			$response['message'] = $this->upload->display_errors();
		} else {
			$file = $this->upload->data();
			// chmood new file
			@chmod(FCPATH.'media_library/images/'.$file['file_name'], 0777);
			// resize new image
			$this->image_resize(FCPATH.'media_library/images', $file['file_name']);
			$response['type'] = 'success';
			$response['file_name'] = $file['file_name'];
			if ($id > 0) {
				$query = $this->model->RowObject($this->table, $this->pk, $id);
				// chmood old file
				@chmod(FCPATH.'media_library/posts/thumbnail/'.$query->post_image, 0777);
				@chmod(FCPATH.'media_library/posts/medium/'.$query->post_image, 0777);
				@chmod(FCPATH.'media_library/posts/large/'.$query->post_image, 0777);
				// unlink old file
				@unlink(FCPATH.'media_library/posts/thumbnail/'.$query->post_image);
				@unlink(FCPATH.'media_library/posts/medium/'.$query->post_image);
				@unlink(FCPATH.'media_library/posts/large/'.$query->post_image);
			}
		}
		return $response;
	}

	/**
	  * Resize Images
	  */
	 private function image_resize($source, $file_name) {
		$this->load->library('image_lib');
		// Thumbnail Image
		$thumbnail['image_library'] = 'gd2';
		$thumbnail['source_image'] = $source .'/'. $file_name;
		$thumbnail['new_image'] = './media_library/posts/thumbnail/'. $file_name;
		$thumbnail['maintain_ratio'] = false;
		$thumbnail['width'] = intval($this->session->userdata('post_image_thumbnail_width'));
		$thumbnail['height'] = intval($this->session->userdata('post_image_thumbnail_height'));
		$this->image_lib->initialize($thumbnail);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Medium Image
		$medium['image_library'] = 'gd2';
		$medium['source_image'] = $source .'/'. $file_name;
		$medium['new_image'] = './media_library/posts/medium/'. $file_name;
		$medium['maintain_ratio'] = false;
		$medium['width'] = intval($this->session->userdata('post_image_medium_width'));
		$medium['height'] = intval($this->session->userdata('post_image_medium_height'));
		$this->image_lib->initialize($medium);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Large Image
		$large['image_library'] = 'gd2';
		$large['source_image'] = $source .'/'. $file_name;
		$large['new_image'] = './media_library/posts/large/'. $file_name;
		$large['maintain_ratio'] = false;
		$large['width'] = intval($this->session->userdata('post_image_large_width'));
		$large['height'] = intval($this->session->userdata('post_image_large_height'));
		$this->image_lib->initialize($large);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Remove Original File
		@unlink($source .'/'. $file_name);
	}
}