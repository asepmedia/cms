<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kuisioner extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kuisioner_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Kuisioner_model->json();
    }

    public function index() 
    {
        $this->vars['button'] = 'Create';
	    $this->vars['id'] = set_value('id');
	    $this->vars['nama'] = set_value('nama');
	    $this->vars['umur'] = set_value('umur');
	    $this->vars['jenis_kelamin'] = set_value('jenis_kelamin');
	    $this->vars['nama_surveyor'] = set_value('nama_surveyor');
	    $this->vars['nip_surveyor'] = set_value('nip_surveyor');
	    $this->vars['pendidikan'] = set_value('pendidikan');
	    $this->vars['pekerjaan'] = set_value('pekerjaan');
	    $this->vars['kuis1'] = set_value('kuis1');
	    $this->vars['kuis2'] = set_value('kuis2');
	    $this->vars['kuis3'] = set_value('kuis3');
	    $this->vars['kuis4'] = set_value('kuis4');
	    $this->vars['kuis5'] = set_value('kuis5');

        $this->vars['action'] = site_url('kuisioner/create_action');
		$this->vars['page_title'] = 'Kuesioner';
		$this->vars['content'] = 'kuisioner/kuisioner_form';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);       
    }
 	public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('umur', 'umur', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('nama_surveyor', 'nama surveyor', 'trim|required');
	$this->form_validation->set_rules('nip_surveyor', 'nip surveyor', 'trim|required');
	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('kuis1', 'kuis1', 'trim|required');
	$this->form_validation->set_rules('kuis2', 'kuis2', 'trim|required');
	$this->form_validation->set_rules('kuis3', 'kuis3', 'trim|required');
	$this->form_validation->set_rules('kuis4', 'kuis4', 'trim|required');
	$this->form_validation->set_rules('kuis5', 'kuis5', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create_action() 
    {
  	
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
            $this->session->set_flashdata('message', 'Data anda telah tersimpan');
            redirect(site_url('kuisioner'));
    	}

}
