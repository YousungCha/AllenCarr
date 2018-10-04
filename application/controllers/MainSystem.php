<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainSystem extends CI_Controller 
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
		$this->load->view('header_v');		
		$this->load->view('menu_v');
		$this->load->view('hero_v');
		//$this->load->view('notice_v');
		$this->load->view('value_v');
		$this->load->view('method_v');
		$this->load->view('easyway_v');
		$this->load->view('member_v');
		$this->load->view('partner_v');
		$this->load->view('testi_v');
		$this->load->view('faq_v');
		$this->load->view('footer_v');
	}
	public function Book()
	{
		$this->load->view('header_v');		
		$this->load->view('menu_v');
		$this->load->view('book_v');
		$this->load->view('footer_v');
	}
	public function Login()
	{
		$this->load->view('header_v');		
		$this->load->view('menu_v');
		$this->load->view('login_v');
		$this->load->view('footer_v');	
	}
	public function Join()
	{
		$this->load->view('header_v');		
		$this->load->view('menu_v');
		$this->load->view('join_v');
		$this->load->view('footer_v');	
	}	

	/*
	 * Button Integration
	 */
	public function btnLogin()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
	        $auth_data = array(
	            'email' => $this->input->post('email',true),
	            'password' => $this->input->post('password',true),
	        );
	        $result = $this->MainSystem_m->mMemberLogin('member',$auth_data);
	        if ($result)
	        {        
	        	// Set Session Data
	            $sdata = array(
	            	'logged_in' => true,
	            	'email' => $auth_data['email'],
	            	'login_time' => date("Y-m-d H:i:s")
	            );
	            $this->session->set_userdata($sdata);
	        }
	        else
	        {
	        	echo "<script>alert('The E-Mail or password is incorrect.');</script>";
	        	$this->Login();
	        }
		}	
		else 
		{
			redirect('MainSystem');
		}
	}
	public function btnLogout()
	{
		if ($this->session->userdata('logged_in') == true) $this->session->sess_destroy();
		redirect("MainSystem/Book");
	}
	public function btnMemberRegister()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$password = password_hash($password, PASSWORD_DEFAULT);
			$member_data = array(
				'email' => $email, 
				'password' => $password,
				'join_date' => date("Y-m-d H:i:s")
			);
			if ($this->MainSystem_m->setData('member',$member_data))
			{
				echo "<script>alert('회원 가입을 축하합니다.');</script>";
				$this->Login();
			}
		}
		else 
		{
			redirect('MainSystem');
		}
	}

	/*
	 * AJAX
	 */
	public function checkEmailExist()
	{
		$email = $this->input->post('email');
		if ($this->MainSystem_m->checkEmailExist('member',$email)) echo "true";
		else echo "false";
	}
}

