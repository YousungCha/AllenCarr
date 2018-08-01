<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainSystem extends CI_Controller 
{	
	public function index()
	{
		$this->load->view('header_v');
		$this->load->view('title_v');
		$this->load->view('menu_v');
		$this->load->view('notice_v');
		$this->load->view('value_v');
		$this->load->view('footer_v');
	}
	public function vFonts()
	{
		$this->load->view('header_v');
		$this->load->view('fonts_v');
		$this->load->view('footer_v');	
	}
	public function vTest()
	{
		$this->load->view('header_v');
		$this->load->view('title_v');
		$this->load->view('footer_v');		
	}
}

