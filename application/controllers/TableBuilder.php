<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TableBuilder extends CI_Controller 
{	
    function __construct() 
    {
        parent::__construct();
        
        // 기본 라이브러리 호출
        date_default_timezone_set("Asia/Seoul");
        $this->load->database();
        $this->load->helper('url');  
        $this->load->helper('form'); 
        $this->load->library('session');             
    }

	public function index()
	{
		$sessions_sql =
        "CREATE TABLE IF NOT EXISTS `ci_sessions` (
                `id` varchar(40) NOT NULL,
                `ip_address` varchar(45) NOT NULL,
                `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
                `data` blob NOT NULL,
                PRIMARY KEY (id),
                KEY `ci_sessions_timestamp` (`timestamp`)
        );        
        ";

		$data1 =
		"CREATE TABLE IF NOT EXISTS member (
			no int(10) NULL AUTO_INCREMENT,
			email varchar(40) NOT NULL,	
			password varchar(80) NOT NULL,	
			join_date datetime NOT NULL,	
			etc varchar(40) NOT NULL,	
			PRIMARY KEY(no)
		)
		";

		$data2 =
		"CREATE TABLE IF NOT EXISTS session (
			no int(10) NULL AUTO_INCREMENT,
			email varchar(40) NOT NULL,	
			name varchar(40) NOT NULL,	
			phone varchar(40) NOT NULL,	
			class varchar(20) NOT NULL,	
			amount int(2) NOT NULL,	
			date_1 datetime NOT NULL,	
			date_2 datetime NOT NULL,	
			date_3 datetime NOT NULL,	
			status varchar(40) NOT NULL,	
			mbg datetime NOT NULL,	
			payment varchar(20) NOT NULL,	
			order_number varchar(40) NOT NULL,
			sales_code varchar(40) NOT NULL,
			etc varchar(40) NOT NULL,
			PRIMARY KEY(no)
		)
		";		
		$data3 =
		"CREATE TABLE IF NOT EXISTS question (
			no int(10) NULL AUTO_INCREMENT,
			name varchar(40) NOT NULL,	
			email varchar(40) NOT NULL,	
			address varchar(80) NOT NULL,	
			occupation varchar(40) NOT NULL,	
			phone varchar(40) NOT NULL,	
			recommender varchar(40) NOT NULL,	
			date_1 varchar(40) NOT NULL,	
			ques1 varchar(40) NOT NULL,
			ques2 varchar(40) NOT NULL,
			ques3 varchar(40) NOT NULL,
			ques4 varchar(40) NOT NULL,
			ques5 varchar(40) NOT NULL,
			ques6 varchar(40) NOT NULL,
			ques7 varchar(40) NOT NULL,
			ques8 varchar(40) NOT NULL,
			ques9 varchar(40) NOT NULL,
			ques10 varchar(40) NOT NULL,
			ques11 varchar(40) NOT NULL,
			ques12 varchar(40) NOT NULL,
			ques13 varchar(40) NOT NULL,
			etc varchar(40) NOT NULL,
			PRIMARY KEY(no)
		)
		";	

		$data4 =
		"CREATE TABLE IF NOT EXISTS mail_list (
			no int(10) NULL AUTO_INCREMENT,
			userkey varchar(40) NOT NULL,
			email varchar(40) NOT NULL,
			step int(10) NOT NULL,
			status varchar(40) NOT NULL,
			join_date timestamp NOT NULL,
			update_date timestamp NOT NULL,
			etc varchar(40) NOT NULL,	
			PRIMARY KEY(no)
		)
		";

		$data5 =
		"CREATE TABLE IF NOT EXISTS schedule (
			no int(10) NOT NULL AUTO_INCREMENT,
			count int(1) NOT NULL,
			sdate datetime NOT NULL,
			price varchar(20) NOT NULL,
			discount int(2) NOT NULL,		
			type varchar(10) NOT NULL, 
			status varchar(10) NOT NULL,
			max int(2) NOT NULL,
			etc varchar(40) NOT NULL,
			PRIMARY KEY(no)
		)
		";

		$data6 =
		"CREATE TABLE IF NOT EXISTS analysis (
			no int(10) NOT NULL AUTO_INCREMENT,
			method_file_count int(10) NOT NULL,
			PRIMARY KEY(no)
		)
		";
		$this->db->query($data6);        
	}
}

