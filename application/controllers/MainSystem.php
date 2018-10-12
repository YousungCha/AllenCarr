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
        $this->load->helper('date');
        $this->load->helper('string');
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
		$data = array(
			'count' => $this->MainSystem_m->getTableCount('schedule'),
			'data' => $this->MainSystem_m->getAllData('schedule') 
		);
		$this->load->view('header_v');		
		$this->load->view('menu_v');
		$this->load->view('book_v',$data);
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
	public function JoinComplete()
	{
		$this->load->view('header_v');		
		$this->load->view('menu_v');
		$this->load->view('complete_v');
		$this->load->view('footer_v');	
	}
	public function MyPage()
	{
		if ($this->session->userdata('logged_in') == true)
		{
			$data = array(
				'mem' => $this->MainSystem_m->getOneData('member',$this->session->userdata('email')), 
				'data' => $this->MainSystem_m->getOneData('session',$this->session->userdata('email')), 
			);
			$this->load->view('header_v');		
			$this->load->view('menu_v');
			$this->load->view('myinfo_v',$data);
			$this->load->view('footer_v');
		}
		else
		{
			redirect("MainSystem");
		}
	}
	public function BookForm()
	{
		if ($this->session->userdata('logged_in') == true &&
			$_SERVER["REQUEST_METHOD"] == "POST")
		{
			if ($this->MainSystem_m->checkExist('session','email',$this->session->userdata('email')))
			{
				redirect("MainSystem/MyPage");
			}
			$session_no = $this->input->post('session_no');
			$query = $this->db->query("select * from schedule where no='$session_no'");
			$data = array(
				'data' => $query->row(), 
			);
			$this->load->view('header_v');		
			$this->load->view('menu_v');
			$this->load->view('bookForm_v',$data);
			$this->load->view('footer_v');
		}
		else
		{
			redirect("MainSystem/Login");
		}
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
	            redirect('MainSystem/MyPage');
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
				redirect('MainSystem/JoinComplete');
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

	public function InsertSession()
	{
		if ($this->session->userdata('logged_in') == true && $_SERVER["REQUEST_METHOD"] == "POST")
		{
			$email = $this->input->post('email');
			$payment = $this->input->post('payment');
			$date_1 = strtotime($this->input->post('date_1'));
			$mbg = $date_1;
			$date_1 = date("Y-m-d",$date_1);
			$mbg = date("Y-m-d",strtotime("+3 months"));

			$data = array(
				'email' => $email, 
				'name' => $this->input->post('name'), 
				'phone' => $this->input->post('phone'), 
				'class' => $this->input->post('class'), 
				'amount' => $this->input->post('quantity'), 
				'date_1' => $date_1, 
				'status' => ($payment == 1) ? "1OK" : "wait",
				'mbg' => $mbg,
				'payment' => ($payment == 1) ? "card" : "account",
				'order_number' => random_string("alnum",16),
				'sales_code' => $this->input->post('sales_code'),
			);
			if ($this->MainSystem_m->checkEmailExist('session',$email)) {
				$this->MainSystem_m->updateData('session',$data);	
			}
			else  {
				$this->MainSystem_m->setData('session',$data);
			}
		}
		else
		{
			redirect('MainSystem/Book');
		}
	}
	public function addEmailList()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$email = $this->input->post('email');	
			if ($this->MainSystem_m->checkEmailExist('mail_list',$email)) 
			{
				echo $email."은 이미 등록된 이메일입니다.";
			}
			else
			{
				$data = array(
					'userkey' => random_string("alnum",32),
					'email' => $email,
					'step' => 1,
					'status' => "normal",
					'join_date' => date("Y-m-d H:i:s"),
				);
				$this->MainSystem_m->setData('mail_list',$data);
				echo "정상적으로 등록되었습니다.";
			}
		}
	}
	public function checkEmailExist()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$email = $this->input->post('email');
			if ($this->MainSystem_m->checkEmailExist('member',$email)) echo "true";
			else echo "false";
		}
	}
}

