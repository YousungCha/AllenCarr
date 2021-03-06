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

    public function test()
    {
    	$this->load->view('header_v');    	
    	$this->load->view('test');
    	//$this->load->view('footer_v');
    
    	/*
			$fp = fopen('./data/email_list.txt','r');
			//$fr = fread($fp, filesize('./data/email_list.txt'));
			//fclose($fp);
			//echo $fr;
			while(!feof($fp))
			{
				$doc_data = fgets($fp);
				echo $doc_data."<br>";				
			}
		*/
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
				'schedule' => $this->MainSystem_m->getAllData('schedule'),
				'mem' => $this->MainSystem_m->getOneData('member',$this->session->userdata('email')), 
				'data' => $this->MainSystem_m->getOneData('session',$this->session->userdata('email')), 
				'ques' => $this->MainSystem_m->getOneData('question',$this->session->userdata('email')), 
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
				$data = $this->MainSystem_m->getOneData('session',$this->session->userdata('email'));
				if ($data->status != "cancel") redirect("MainSystem/MyPage");				
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
			$email = $this->input->post('email',TRUE);
			$password = $this->input->post('password',TRUE);
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
	public function btnAddBoost()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$email = $this->input->post('email',TRUE);
			$schedule_no = $this->input->post('no',TRUE);
			$schedule = $this->MainSystem_m->getOneSchedule('schedule',$schedule_no);

			if ($schedule->count == 2) 
			{
				$data = array(					
					'date_2' => $schedule->sdate, 
					'status' => "2OK",
				);
				$this->MainSystem_m->findUpdate('session','email',$email,$data);
			}		
			if ($schedule->count == 3) 
			{
				$data = array(
					'date_3' => $schedule->sdate, 
					'status' => "3OK",
				);
				$this->MainSystem_m->findUpdate('session','email',$email,$data);
			}	
			redirect('MainSystem/MyPage');
		}
		else 
		{
			redirect('MainSystem/MyPage');
		}
	}
	public function btnCancelSession()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$email = $this->input->post('email',TRUE);
			$data = $this->MainSystem_m->getOneData('session',$email);
			$status = $data->status;

			if ($status == 'wait')
			{
				$data = array(
					'status' => "cancel",
				);
				$this->MainSystem_m->findUpdate('session','email',$email,$data);	
			}
			else if ($status == '2OK')
			{
				$data = array(
					'date_2' => "",
					'status' => "1OK" 
				);
				$this->MainSystem_m->findUpdate('session','email',$email,$data);	
			}
			else if ($status == '3OK')
			{
				$data = array(
					'date_3' => "",
					'status' => "2OK" 
				);
				$this->MainSystem_m->findUpdate('session','email',$email,$data);	
			}
			redirect('MainSystem/MyPage');
		}
		else 
		{
			redirect('MainSystem/MyPage');
		}
	}
	public function btnApplyQuestion()
	{
		if ($this->session->userdata('logged_in') == true && $_SERVER["REQUEST_METHOD"] == "POST")
		{
			$data = array(
				'name' => $this->input->post('name',true), 
				'email' => $this->input->post('email',true), 
				'address' => $this->input->post('address',true), 
				'occupation' => $this->input->post('occupation',true), 
				'phone' => $this->input->post('phone',true), 
				'recommender' => $this->input->post('recommender',true), 
				'date_1' => $this->input->post('date_1',true), 
				'ques1' => $this->input->post('ques1',true), 
				'ques2' => $this->input->post('ques2',true), 
				'ques3' => $this->input->post('ques3',true), 
				'ques4' => $this->input->post('ques4',true), 
				'ques5' => $this->input->post('ques5',true), 
				'ques6' => $this->input->post('ques6',true), 
				'ques7' => $this->input->post('ques7',true), 
				'ques8' => $this->input->post('ques8',true), 
				'ques9' => $this->input->post('ques9',true), 
				'ques10' => $this->input->post('ques10',true), 
				'ques11' => $this->input->post('ques11',true), 
				'ques12' => $this->input->post('ques12',true), 
				'ques13' => $this->input->post('ques13',true), 
			);
			if ($this->MainSystem_m->setData('question',$data))
			{
				redirect('MainSystem/MyPage');
			}			
		}
		else 
		{
			redirect('MainSystem/MyPage');
		}		
	}
	/*
	 * AJAX
	 */
	public function downloadFile()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$fileName = $this->input->post('file');
			if ($fileName == "easyway.pdf")
			{
				$sql = "update analysis set method_file_count=method_file_count+1 where no=1";
				$query = $this->db->query($sql);
			}
		}
	}

	public function InsertSession()
	{
		if ($this->session->userdata('logged_in') == true && $_SERVER["REQUEST_METHOD"] == "POST")
		{
			$email = $this->input->post('email');
			$payment = $this->input->post('payment');
			$mer_id = $this->input->post('mer_id');
			$date_1 = strtotime($this->input->post('date_1'));
			$mbg = $date_1;
			$date_1 = date("Y-m-d H:i:s",$date_1);
			$mbg = date("Y-m-d",strtotime($date_1." +3 months"));

			$data = array(
				'email' => $email, 
				'name' => $this->input->post('name'), 
				'phone' => $this->input->post('phone'), 
				'class' => $this->input->post('class'), 
				'amount' => $this->input->post('quantity'), 
				'date_1' => $date_1, 
				'status' => ($this->checkCustomerInfo($mer_id) == 'paid') ? "1OK" : "wait",
				'mbg' => $mbg,
				'payment' => ($payment == 1) ? "card" : "account",
				'order_number' =>  $mer_id, 
				'sales_code' => $this->input->post('sales_code'),
			);
			if ($this->MainSystem_m->checkEmailExist('session',$email)) {
				$this->MainSystem_m->findUpdate('session','email',$email,$data);	
			}
			else  {
				$this->MainSystem_m->setData('session',$data);
			}
		}
		else if ($this->session->userdata('logged_in') == true && $_SERVER["REQUEST_METHOD"] == "GET")
		{
			$email = $this->input->get('email');
			$payment = $this->input->get('payment');
			$mer_id = $this->input->get('mer_id');

			$date_1 = strtotime($this->input->get('date_1'));
			$mbg = $date_1;
			$date_1 = date("Y-m-d H:i:s",$date_1);
			$mbg = date("Y-m-d",strtotime($date_1." +3 months"));

			$data = array(
				'email' => $email, 
				'name' => $this->input->get('name'), 
				'phone' => $this->input->get('phone'), 
				'class' => $this->input->get('class'), 
				'amount' => $this->input->get('quantity'), 
				'date_1' => $date_1, 
				'status' => ($this->checkCustomerInfo($mer_id) == 'paid') ? "1OK" : "wait",
				'mbg' => $mbg,
				'payment' => ($payment == 1) ? "card" : "account",
				'order_number' => $mer_id,
				'sales_code' => $this->input->get('sales_code'),
			);
			if ($this->MainSystem_m->checkEmailExist('session',$email)) {
				$this->MainSystem_m->findUpdate('session','email',$email,$data);
			}
			else  {
				$this->MainSystem_m->setData('session',$data);
			}			
			redirect('MainSystem/MyPage');
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

	/*
	 * CURL
	 */
	private function getAccessToken()
	{
		$curl = curl_init();
    	$data = array(
    		'imp_key' => '8483749489703886',
    		'imp_secret' => 'CqV1K8gyy6RjBLOuGwz0qtEvU1VRhJ5Ta0UU9btHhl1S7PnNmWOMqtiluecMYhF8hA3qLw73S9WZZjNl'
    	);
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.iamport.kr/users/getToken",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 100,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => http_build_query($data),		  
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		$retData = json_decode($response);	
		curl_close($curl);		

		return $retData->response->access_token;
	}

	private function checkCustomerInfo($user_key)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.iamport.kr/payments/find/".$user_key,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 100,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: ".$this->getAccessToken()
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		$retData = json_decode($response);	
		curl_close($curl);		

		return $retData->response->status;
	}
}

