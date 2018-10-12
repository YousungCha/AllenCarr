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
			$data = array(
				'schedule' => $this->MainSystem_m->getAllData('schedule'),
				'session' => $this->MainSystem_m->getAllData('session'),
				'mail_list' => $this->MainSystem_m->getAllData('mail_list'),
				'member' => $this->MainSystem_m->getAllData('member'),
			);
			$this->load->view('header_v');		
			$this->load->view('menu_v');
			$this->load->view('admin_v',$data);
			$this->load->view('footer_v');
		}
		else
		{
			redirect("MainSystem");
		}
	}
}

