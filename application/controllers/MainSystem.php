<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainSystem extends CI_Controller 
{	
	public function index()
	{
		$this->load->view('header_v');
		$this->load->view('title_v');
		$this->load->view('footer_v');
	}
}

