<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller{

	function __construct()
	{
		parent::__construct();

	}


	function login()
	{
		if($_POST){
			$this->form_validation->set_rules('email','email','required|valid_email');
			$this->form_validation->set_rules('password','password','required');
			if($this->form_validation->run()==FALSE)
			{
					
			}else{

				$admin = admin::validate_login($_POST['email'],$_POST['password']);

				if($admin){
					if($admin->status != 1){
						$data['error_msg']= 'Your account has been blocked, please contact the administror.';
					}else{
						redirect('welcome');
					}
				}else{
					$data['error_msg']= 'The email / password combination that you have entered is invalid.';
				}
			}
		}
		$data['title'] = $this->title('login');
		$this->load->view('default/auth/login',$data);
		$this->load->view('default/footer');

	}

	function logout()
	{
		admin::logout();

	}

	function forgot_password()
	{
		if($_POST)
		{
			$this->form_validation->set_rules('email','email','required|valid_email|callback_email_check');
			if($this->form_validation->run() == FALSE)
			{

			}else{
				$data['this_admin'] = admin::find_by_email($_POST['email']);
				$config['protocol'] = 'mail';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = "\r\n";
				$config['newline'] = "\r\n";
				$this->email->initialize($config);
				$this->email->from('no-reply@betalife.be', 'Beta Life | Demo');
				$this->email->to($_POST['email']);
					

				$this->email->subject('Forgot password | Beta Life | Demo');
				$email = $this->load->view('default/emails/newpassword',$data,TRUE);
				$this->email->message($email);

				if($this->email->send()){

				//echo $this->email->print_debugger();
				redirect('forgot_password_success');
				}
			}
		}

		$data['title'] = $this->title('forgot password');
		$this->load->view('default/auth/forgot_password',$data);
		$this->load->view('default/footer');
	}

	function forgot_password_success()
	{
		$data['title'] = $this->title('forgot password');
		$this->load->view('default/auth/forgot_password_success',$data);
		$this->load->view('default/footer');
	}

	function email_check($email)
	{
		$admin = admin::find_by_email($email);
		if($admin){
			if($admin->status != 1){
				$this->form_validation->set_message('email_check', 'This account has been blocked, please contact the administror.');
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			$this->form_validation->set_message('email_check', 'The %s is not in our database.');
			return FALSE;
		}
	}

	function set_newpwd()
	{

		if($_GET)
		{
			$this_admin = admin::find_by_key_set($_GET['key']);
			if($this_admin){
					
				$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|matches[passconf]');
				$this->form_validation->set_rules('passconf', 'confirm  password', 'required');
				if ($this->form_validation->run() == FALSE)
				{
						
				}else{

					$new_pwd = admin::set_newpwd($this_admin->id,$_POST['password'],$this_admin->email);
					if($new_pwd==true){
						redirect('set_newpwd_success');
					}
				}
					
			}else{
				redirect('set_newpwd_error');

			}
				
		}else{
			redirect('set_newpwd_error');
		}

		$data['title'] = $this->title('set password');
		$this->load->view('default/auth/set_newpwd',$data);
		$this->load->view('default/footer');
	}

	function set_newpwd_error()
	{
		$data['title'] = $this->title('set password');
		$this->load->view('default/auth/set_newpwd_error',$data);
		$this->load->view('default/footer');
	}
	
	function set_newpwd_success()
	{
		
		$data['title'] = $this->title('set password');
		$this->load->view('default/auth/set_newpwd_success',$data);
		$this->load->view('default/footer');
	}
}



/* End of file welcome.php */
/* Location: ./application/demo2/controllers/auth.php */