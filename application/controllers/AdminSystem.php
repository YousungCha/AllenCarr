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
        $this->load->helper('date');
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
	public function btnChangeSessionStatus()
	{
		if ($this->session->userdata('logged_in') == true && $_SERVER["REQUEST_METHOD"] == "POST")
		{
			$status = $this->input->post('status');
			$no = $this->input->post('no');

			if ($status == "active") $status = "closed";
			else if ($status == "closed") $status = "hidden";
			else if ($status == "hidden") $status = "active";
			$data = array(
				'status' => $status,
				'no' => $no
			);
			$this->MainSystem_m->findUpdate('schedule','no',$data['no'],$data);
			redirect("AdminSystem");
		}
		else 
		{
			redirect("MainSystem");
		}
	}
}

