<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller 
{	
    function __construct() 
    {
        parent::__construct();
        
        // 기본 라이브러리 호출
        date_default_timezone_set("Asia/Seoul");
        $this->load->database();          
        $this->load->helper('url');  
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->model('MainSystem_m');
        $this->load->library('session');
    }

	public function index()
	{
		$this->load->view('header_v');		
		$this->load->view('menu_v');
		$this->load->view('land_case_1');
		$this->load->view('footer_v');
	}
}

