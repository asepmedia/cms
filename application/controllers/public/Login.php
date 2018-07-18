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

class Login extends Public_Controller {

	/**
	 * Constructor
	 * @access  public
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_users');
		if ($this->auth->is_logged_in())
			redirect($this->agent->referrer());
	}

	/**
	 * Index
	 * @access  public
	 */
	public function index() {
		$this->vars['page_title'] = 'Masuk';
		$this->vars['can_logged_in'] = $this->auth->check_login_attempts($_SERVER['REMOTE_ADDR']);
		$this->vars['login_info'] = $this->vars['can_logged_in'] ? 'Enter your username and password to log on' : 'The login page has been blocked for 30 minutes';
		$this->vars['content'] = 'users/login';
		$this->load->view('users/index', $this->vars);
	}
		/**
		 * process
		 * @access  public
		 */	
        public function signup()
        {
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.user_email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('repeat_password', 'Confirm Password', 'trim|required|matches[password]');
				$this->form_validation->set_rules('biography', 'Biography', 'trim|required');
                if ($this->form_validation->run() == FALSE)
                {
					$this->vars['page_title'] = 'Daftar';
					$this->vars['content'] = 'users/signup';
					$this->load->view('users/index', $this->vars);
                }
                else
                {
                    $input_data['user_full_name'] = $this->input->post('name',TRUE);	
                    $input_data['user_name'] = $this->input->post('email',TRUE);
                    $input_data['user_email'] = $this->input->post('email',TRUE);
                    $input_data['user_group_id'] = 1;
                    $input_data['created_by'] = 1;
                    $input_data['user_type'] = 'administrator';
                    $input_data['user_password'] = $this->input->post('password',TRUE);
                    
                    $input_data['user_password'] = password_hash($input_data['user_password'], PASSWORD_BCRYPT);
                                            
                 	$this->db->insert('users', $input_data); 
                    
                       
                    //$this->user_create_activation_sendmail($input_data);
                    $this->session->set_flashdata('success','Berhasil mendaftar, silahkan masuk untuk membeli Semen Beku.');
                    redirect('signup');

                }
            }
            else
            {
			$this->vars['page_title'] = 'Daftar';
			$this->vars['content'] = 'users/signup';
			$this->load->view('users/index', $this->vars);
            }
        }

	/**
	 * process
	 * @access  public
	 */
	public function process() {
		$response = [];
		if ($this->validation()) {
			$user_name = $this->input->post('username', TRUE);
			$user_password = $this->input->post('password', TRUE);
			$ip_address = get_ip_address();
			$logged_in = $this->auth->logged_in($user_name, $user_password, $ip_address) ? 'success' : 'error';
			$response['type'] = $logged_in;
			$response['message'] = $logged_in == 'success' ? 'logged_in' : 'not_logged_in';
			$response['can_logged_in'] = $this->auth->check_login_attempts($_SERVER['REMOTE_ADDR']);
		} else {
			$response['type'] = 'error';
			$response['message'] = validation_errors();
			$response['can_logged_in'] = TRUE;
		}

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	/**
	 * Validations Form
	 * @access  public
	 * @return Bool
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('username', 'Username', 'trim|required');
		$val->set_rules('password', 'Password', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}