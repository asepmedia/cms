<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Counters extends Public_Controller {

	/**
	 * Constructor
	 */
    public $CI;

	public function __construct() {
        $this->CI = &get_instance();
		$this->CI->load->model(['m_posts']);
        $this->CI->load->library(['user_agent']);

        $counter = $this->CI->m_posts->getCounter()->result();
        foreach($counter as $visit){
        $date = date('Y-m-d');
        $ip = $_SERVER['REQUEST_URI'];
        $data = array(
            'view'  => $visit->view+1,
            'date'  => $visit->date,
            'ip'    => $this->CI->agent->agent_string()
            );
       return $this->CI->m_posts->putCounter($data,$date);
        }
        $date = date('Y-m-d');
        $ip = $_SERVER['REQUEST_URI'];
        $data = array(
            'view'  => +1,
            'date'  => $date,
            'ip'    => $this->CI->agent->agent_string()
            );
        
       return $this->CI->m_posts->storeCounter($data);               	
	}
}