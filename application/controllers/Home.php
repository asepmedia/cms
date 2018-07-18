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

class Home extends Public_Controller {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Index
	 */
	public function index() {
		$this->vars['title'] = $this->session->userdata('website') . ' | ' . $this->session->userdata('tagline');
		$this->vars['content'] = 'themes/'.theme_folder().'/home';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}
    public function siperkasa($page = 0){
        $data=0;
        if($page=='bimtek'){
            $data = array(
                'title' => 'Bimtek - Siperkasa',
                'page'  => 'publik/siperkasa/bimtek'
                );
        }
        if($page=='instruktur'){
            $data = array(
                'title' => 'Instruktur - Siperkasa',
                'page'  => 'publik/siperkasa/instruktur'
                );
        }
        if($page=='juri'){
            $data = array(
                'title' => 'Juri Kontes - Siperkasa',
                'page'  => 'publik/siperkasa/juri'
                );
        }  
        if($page=='kunjungan'){
            $data = array(
                'title' => 'Wisata Pendidikan - Siperkasa',
                'page'  => 'publik/siperkasa/kunjungan'
                );
        }       
        if($page=='penelitian'){
            $data = array(
                'title' => 'Pelayanan Penelitian - Siperkasa',
                'page'  => 'publik/siperkasa/penelitian'
                );
        }                       
        if($page=='penjualan'){
            $data = array(
                'title' => 'Penjualan Semen Beku - Siperkasa',
                'page'  => 'publik/siperkasa/penjualan_semen'
                );
        } 
        if($page=='/'){
            $data = array(
                'title' => 'Siperkasa - BIB Lembang',
                'page'  => 'publik/siperkasa/siperkasa'
                );
        }   
        $this->load->view('publik/siperkasa/layout', $data);
    }
    public function kuesioner() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kuisioner/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'umur' => set_value('umur'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'nama_surveyor' => set_value('nama_surveyor'),
	    'nip_surveyor' => set_value('nip_surveyor'),
	    'pendidikan' => set_value('pendidikan'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'kuis1' => set_value('kuis1'),
	    'kuis2' => set_value('kuis2'),
	    'kuis3' => set_value('kuis3'),
	    'kuis4' => set_value('kuis4'),
	    'kuis5' => set_value('kuis5'),
	    'updated_at' => set_value('updated_at'),
	    'created_at' => set_value('created_at'),
	);
        $this->vars['action'] = site_url('home/create_action');
		$this->vars['page_title'] = 'Kuesioner';
		$this->vars['content'] = 'kuisioner/kuisioner_form';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);    
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'umur' => $this->input->post('umur',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'nama_surveyor' => $this->input->post('nama_surveyor',TRUE),
		'nip_surveyor' => $this->input->post('nip_surveyor',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'kuis1' => $this->input->post('kuis1',TRUE),
		'kuis2' => $this->input->post('kuis2',TRUE),
		'kuis3' => $this->input->post('kuis3',TRUE),
		'kuis4' => $this->input->post('kuis4',TRUE),
		'kuis5' => $this->input->post('kuis5',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->Kuisioner_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kuisioner'));
        }
    }

    /*
    *
    * Landing Page Function
    */
    public function landing_page(){
        $data = array(
            'title' => 'BIB Lembang'
            );
        $this->load->view('landing', $data);
    }	
}