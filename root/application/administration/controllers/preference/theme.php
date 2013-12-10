<?php
class Theme extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		if(!$this->admin || $this->admin->status !=1 ) redirect('login');
	}

	function index()
	{
		if($_POST){
			$theme = setting::find('first');
			if($_POST['type'] == 'main_theme'){
				$theme->main_theme = $_POST['theme'];
				if($theme->save())
				{
					$data['success_msg'] = "The main's theme has been changed to ".$_POST['theme'];
				}else{
					$data['error_msg'] = 'There is an error during the update !';
				}
			}elseif ($_POST['type'] == 'admin_theme'){
				$theme->admin_theme = $_POST['theme'];
				if($theme->save())
				{
					$data['success_msg'] = "The admin's theme has been changed to ".$_POST['theme'];
				}else{
					$data['error_msg'] = 'There is an error during the update !';
				}
					
			}else{
				$data['error_msg'] = 'There is an error during the update !';
			}
		}
		$data['title'] = $this->title('theme');
		$data['theme_active'] = setting::find('first',array('select'=>'admin_theme,main_theme'));
		$data['theme'] = $this->get_themes('./'.APPPATH.'views');
		$this->load->view($this->theme->admin_theme.'/header',$data);
		$this->load->view($this->theme->admin_theme.'/preference/theme');
		$this->load->view($this->theme->admin_theme.'/footer');

	}

	private function get_themes($url)
	{
		return $themes = directory_map($url,2,TRUE);
	}

}