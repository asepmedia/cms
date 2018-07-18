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

class Dashboard extends Admin_Controller {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model(['m_dashboard', 'm_users', 'm_post_comments']);
		$this->load->library('user_agent');
		$this->load->helper(['form', 'blog', 'blog_helper']);
	}

	/**
	 * index
	 */
	public function index() {
		$this->vars['title'] = 'Dashboard';
		$this->vars['dashboard'] = true;
		$this->vars['widget_box'] = $this->m_dashboard->widget_box();
		$this->vars['last_logged_in'] = $this->m_users->get_last_logged_in();
		$this->vars['recent_posts_comments'] = $this->m_post_comments->get_recent_comments();
		$this->vars['content'] = 'backend/dashboard';
		$this->load->view('backend/index', $this->vars);
	}
    public function upload_laporan()
    {
        /*
        |--------------------------------------------------------------------------
        | UPLOAD LAPORAN PRODUKSI
        |--------------------------------------------------------------------------
        */    	
            // config upload
            $config['upload_path'] = './berkas/laporan/';
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('file')) {
                // jika validasi file gagal, kirim parameter error ke index
                $error = array('error' => $this->upload->display_errors());
                $this->index($error);
            } else {
              // jika berhasil upload ambil data dan masukkan ke database
              $upload_data = $this->upload->data();
 
              // load library Excell_Reader
              $this->load->library('Excel_reader');
 
              //tentukan file
              $this->excel_reader->setOutputEncoding('230787');
              $file = $upload_data['full_path'];
              $this->excel_reader->read($file);
 
              // array data
              $data = $this->excel_reader->sheets[0];
              $dataexcel = Array();
              for ($i = 1; $i <= $data['numRows']; $i++) {
                   if ($data['cells'][$i][1] == '')
                       break;
                   $dataexcel[$i - 1]['id_pejantan'] = $data['cells'][$i][1];
                   $dataexcel[$i - 1]['id_pembuatan'] = $data['cells'][$i][2];
                   $dataexcel[$i - 1]['tanggal'] = $data['cells'][$i][3];
                   $dataexcel[$i - 1]['jumlah'] = $data['cells'][$i][4];
                   $dataexcel[$i - 1]['spesies'] = $data['cells'][$i][5];
              }
              
              //load model
              $this->load->model('Data_model');
              $this->Data_model->loaddata($dataexcel);
 
              //delete file
              $file = $upload_data['file_name'];
              $path = './berkas/laporan/' . $file;
              unlink($path);
            }
        //redirect ke halaman awal
        redirect(site_url('dashboard'));
    }
	/**
	 * Sidebar Collapse
	 */
	public function sidebar_collapse() {
		$collapse = $this->session->userdata('sidebar_collapse') ? false : true;
		$this->session->set_userdata('sidebar_collapse', $collapse);
	}
}