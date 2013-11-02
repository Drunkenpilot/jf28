<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends MY_Controller{
	

	function index()
	{
		$data['title'] = $this->title('contact');
		$this->load->view('default/header',$data);
		$this->load->view('default/contact');
		$this->load->view('default/footer');
	}
}