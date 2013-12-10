<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
		
		//$config['first_link'] = '<li><a href="#">&lsaquo;</a></li>';
		//$config['next_link'] = '';<li>&rsaquo;</li>
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>&nbsp;';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>&nbsp;';
		$config['prev_tag_close']= '</li>';
	
		//$config['prev_link'] = '';
  		//$config['last_link'] = '<li><a href="#">&raquo;</a></li>';
    	$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
    	$config['full_tag_close'] = '</ul>'; 
    	$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['first_tag_open'] = '<li class="disabled"><span>';
		$config['first_tag_close'] = '</span></li>';
		$config['num_tag_open'] = '<li>&nbsp;';
		$config['num_tag_close']= '</li>';
		//$config['use_page_numbers'] = TRUE;