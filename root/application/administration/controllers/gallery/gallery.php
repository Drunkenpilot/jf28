<?php
class Gallery extends MY_Controller{
	
 	public function __construct() {
        parent::__construct();
        if(!$this->admin || $this->admin->status !=1 ) redirect('login');
    }
    
    function index()
    {	
   		 if($_POST){
			if($_POST['action'] == 'up'){
			$neighbor = photo::find_by_position($_POST['position']-1);
			$neighbor->position = $_POST['position'];
			$neighbor->save();
			$up = photo::find_by_id($_POST['id']);
			$up->position = $_POST['position']-1;
			$up->save();
			}else{
			
			$neighbor = photo::find_by_position($_POST['position']+1);	
			//var_dump($_POST['position']+1);
			$neighbor->position = $_POST['position'];
			$neighbor->save();
			$down = photo::find_by_id($_POST['id']);
			$down->position = $_POST['position']+1;
			$down->save();
			}
			redirect('gallery');
		 }
    	 $data['lastPosition'] = photo::count();
    	 $data['photos'] = photo::find('all',array('order'=>'position asc'));	
    	 $data['title'] = $this->title('Gallery');
    	 $this->load->view($this->theme->admin_theme.'/header',$data);
         $this->load->view($this->theme->admin_theme.'/gallery/index');
         $this->load->view($this->theme->admin_theme.'/footer');
    }
	
	
}