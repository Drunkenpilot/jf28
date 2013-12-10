<?php

class MY_Controller extends CI_Controller
{
    var $admin = FALSE;

    function __construct()
    {
    	parent::__construct();  	

     $this->admin = $this->session->userdata('admin_id') ? admin::find($this->session->userdata('admin_id')) : FALSE;
  	 $this->theme = setting::find('first',array('select'=>'admin_theme,main_theme'));
  	
    }
	
    function title($title)
	{
		if($title == 'home'){
	 	return $title_text = 'Administration';
		}else{
		return $title_text = 'Administration | '.$title;
		}
	}
}