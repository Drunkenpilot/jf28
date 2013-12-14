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
	
	function deleteItem()
	{
		if($_POST){
			$id =$_POST['id'];
			$deleteItem = photo::find_by_id($id);
			if($deleteItem->delete()){
				$reposition = photo::find('all',array('conditions'=>array('position >'.$deleteItem->position)));
		 		if($reposition):
   		 		foreach ($reposition as $res){
				$res->position = $res->position-1;
				$res->save();
		 		}
		 		unlink(base_ur(). '../uploads/large/' . $delteItem->filename_l);
     	 		unlink(base_ur(). '../uploads/medium/' .$delteItem->filename_m);
         		unlink(base_ur(). '../uploads/thumbs/' .$delteItem->filename_s);
		 		endif;
		 		redirect('gallery');
			}
		}else{
			redirect('gallery');
		}
	}
}