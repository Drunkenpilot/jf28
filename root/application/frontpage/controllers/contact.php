<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends MY_Controller{


	function index()
	{
		$data['title'] = $this->title('contact');
		$this->load->view('default/header',$data);
		$this->load->view('default/contact');
		$this->load->view('default/footer');
	}

	function sendEmail()
	{
		if($_POST)
		{
			$config['protocol'] = 'mail';
			$config['wordwrap'] = FALSE;
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			$this->email->initialize($config);
			$this->email->from($_POST['email'], $_POST['email']);
			$this->email->to('jf28@jf28.com');
			$this->email->subject('request information | jf28.com');

			$email = $this->load->view('default/email/email',$_POST,TRUE);
			$this->email->message($email);
			if($this->email->send()){
				redirect('contact/success');
			}else{
				redirect('contact/unsuccess');
			}
			
		}else{
			redirect('contact');
		}
	}
	
	function success()
	{
		$data['title'] = $this->title('contact');
		$this->load->view('default/header',$data);
		$this->load->view('default/email/sendSuccess');
		$this->load->view('default/footer');
	}
	
	function unsuccess()
	{
		$data['title'] = $this->title('contact');
		$this->load->view('default/header',$data);
		$this->load->view('default/email/unSuccess');
		$this->load->view('default/footer');
	}

}