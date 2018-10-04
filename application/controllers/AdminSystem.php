<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSystem extends CI_Controller 
{	
    function __construct() 
    {
        parent::__construct();
        
        // 기본 라이브러리 호출
        date_default_timezone_set("Asia/Seoul");
        $this->load->database();          
        $this->load->helper('url');  
        $this->load->helper('form');
        $this->load->model('MainSystem_m');
        $this->load->library('session');
    }

	public function index()
	{
		if ($this->session->userdata('email') == "master@allencarr.co.kr")
		{
			$this->load->view('header_v');		
			$this->load->view('menu_v');
			$this->load->view('admin_v');
			$this->load->view('footer_v');
		}
		else
		{
			redirect("MainSystem");
		}
	}
}

