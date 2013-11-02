<?php

class MY_Controller extends CI_Controller
{
   // var $member= FALSE;
    function __construct()
    {
    	parent::__construct();
    	

    
    // $this->member = $this->session->userdata('member_id') ? member::find($this->session->userdata('member_id')) : FALSE;
    }
	
    function title($title)
	{
		if($title == 'home'){
	 	return $title_text = 'Jean-François DE WITTE ';
		}else{
		return $title_text = 'Jean-François DE WITTE | '.$title;
		}
	}
}