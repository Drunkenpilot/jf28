<?php
class Administration extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		if(!$this->admin || $this->admin->status !=1 ) redirect('login');

	}

	function index()
	{
		$data['admins'] = admin::find('all');
		$data['title'] = $this->title('administration');
		$this->load->view($this->theme->admin_theme.'/header',$data);
		$this->load->view($this->theme->admin_theme.'/preference/administration');
		$this->load->view($this->theme->admin_theme.'/footer');
	}

	function edit($id=NULL)
	{
		$admin = admin::find_by_id($id);
		if($admin)
		{
			if($this->admin->role !='administrator' && $this->admin->id !=$admin->id ){

				$data['title'] = $this->title('administration');
				$this->load->view($this->theme->admin_theme.'/header',$data);
				$this->load->view($this->theme->admin_theme.'/preference/noAuth',$data);
				$this->load->view($this->theme->admin_theme.'/footer');



			}else{
				if($_POST)
				{

					if($_POST['update_id']==1){
						$admin->firstname = $_POST['firstname'];
						$admin->lastname = $_POST['lastname'];
						$admin->status = $_POST['active'];
						$admin->role = $_POST['role'];
						$admin->save();
						$data['msg'] = 'Update has been executed successfully';
					}else{
						$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[passconf]');
		 			$this->form_validation->set_rules('passconf', 'Confirm password', 'required');
		 			if ($this->form_validation->run() == FALSE)
		 			{
		 				$data['msg_error'] = $this->form_validation->set_message('rule', 'Error Message');
		 			}else{
		 				$adminPass = admin::set_newpwd($admin->id,$_POST['password'],$admin->email);
		 				if($adminPass){
		 					$data['msg'] = 'Update of password has been executed successfully';
		 				}
		 			}
					}
				}
				$data['title'] = $this->title('administration');
				$data['admin'] = $admin;
				$this->load->view($this->theme->admin_theme.'/header',$data);
				$this->load->view($this->theme->admin_theme.'/preference/admin_edit',$data);
				$this->load->view($this->theme->admin_theme.'/footer');
					
			}
		}else{
			redirect('preference/administration');
		}
	}

	function addNewAdmin()
	{
		if($this->admin->role !='administrator')
		{

			$data['title'] = $this->title('administration');
			$this->load->view($this->theme->admin_theme.'/header',$data);
			$this->load->view($this->theme->admin_theme.'/preference/noAuth',$data);
			$this->load->view($this->theme->admin_theme.'/footer');

		}else{
			if($_POST){
				$this->form_validation->set_rules('firstname', 'first name', 'required');
				$this->form_validation->set_rules('lastname', 'last name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admins.email]');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[passconf]');
				$this->form_validation->set_rules('passconf', 'Confirm password', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					$data['msg_error'] = $this->form_validation->set_message('rule', 'Error Message');
				}else{
					$new_admin = admin::registration($_POST['email'],$_POST['password'],$_POST['firstname'],$_POST['lastname'],$_POST['active'],$_POST['role']);
		 		if($new_admin){
		 			redirect('preference/administration');
					}else{
						$data['msg_error'] = 'Erreur';
					}
				}

			}
			$data['title'] = $this->title('administration');
			$this->load->view($this->theme->admin_theme.'/header',$data);
			$this->load->view($this->theme->admin_theme.'/preference/newAdmin',$data);
			$this->load->view($this->theme->admin_theme.'/footer');

		}
	}

}