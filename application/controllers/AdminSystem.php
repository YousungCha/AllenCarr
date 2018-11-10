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
		if ($this->session->userdata('email') == "master@allencarr.co.kr" || $this->session->userdata('email') == "maactik@naver.com")
		{

			$data = array(
				'schedule' => $this->MainSystem_m->getAllData('schedule'),
				'session' => $this->MainSystem_m->getAllData('session'),
				'mail_list' => $this->MainSystem_m->getAllData('mail_list'),
				'member' => $this->MainSystem_m->getAllData('member'),
				'question' => $this->MainSystem_m->getAllData('question')
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
		if ($this->session->userdata('email') == "master@allencarr.co.kr" && $_SERVER["REQUEST_METHOD"] == "POST")
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
	public function btnChangeSessionEtc()
	{
		if ($this->session->userdata('email') == "master@allencarr.co.kr" && $_SERVER["REQUEST_METHOD"] == "POST")
		{
			$etc = $this->input->post('etc');
			$no = $this->input->post('no');
			$data = array(
				'etc' => $etc,
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
	public function btnChangeSessionMember()
	{
		if (($this->session->userdata('email') == "master@allencarr.co.kr" ) && $_SERVER["REQUEST_METHOD"] == "POST")
		{
			$delete = $this->input->post('delete');
			$no = $this->input->post('no');
			if ($delete == "no")
			{
				$data = array(
					'no' => $no,
					'email' => $this->input->post('email'),
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'status' => $this->input->post('status'),
					'date_1' => $this->input->post('date_1'),
					'mbg' => $this->input->post('mbg'),
				);
				$this->MainSystem_m->findUpdate('session','no',$data['no'],$data);
			}
			else 
			{
				$this->MainSystem_m->deleteData('session','no',$no);	
			}
			redirect("AdminSystem");
		}
		else 
		{
			redirect("MainSystem");
		}
	}
	public function btnAddNewSession()
	{
		if ($this->session->userdata('email') == "master@allencarr.co.kr" && $_SERVER["REQUEST_METHOD"] == "POST")
		{
			$data = array(
				'count' => $this->input->post("count"),
				'sdate' => $this->input->post("session_date"),
				'price' => "398000",
				'discount' => $this->input->post("session_dis"),
				'type' => $this->input->post("session_type"),
				'status' => "active",
			);
			$this->MainSystem_m->setData('schedule',$data);
			redirect("AdminSystem");
		}
		else 
		{
			redirect("MainSystem");
		}
	}	
}

