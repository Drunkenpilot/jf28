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

	function edit($id = null)
	{
		if($id==null || !is_numeric($id))
		{
			redirect('gallery');
		}else{
			$photo = photo::find_by_id($id);
			if($photo){
				
				if($_POST){
					if($_POST['client'] =='' ){
						$client = null;
					}else{
						$client = $_POST['client'];
					}
					if($_POST['year'] =='' ){
						$year = null;
					}else{
						$year = $_POST['year'];
					}
					if($_POST['description'] =='' ){
						$description = null;
					}else{
						$description = $_POST['description'];
					}
					$photo->year = $year;
					$photo->client = $client;
					$photo->description = $description;
					$photo->active = $_POST['active'];
					if($photo->save()){
						$data['msg'] = array('result'=>true,'msg'=>'The information has been saved.');
					}else{
						$data['msg'] = array('result'=>false,'msg'=>'There is an error.');
					}
				}
					
			}else{
				redirect('gallery');
			}
			
			$data['photo'] = $photo;
			$data['title'] = $this->title('Gallery');
			$this->load->view($this->theme->admin_theme.'/header',$data);
			$this->load->view($this->theme->admin_theme.'/gallery/edit');
			$this->load->view($this->theme->admin_theme.'/footer');
		}
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
				endif;
				 
				/* check existe files */
				$l = get_file_info('../uploads/large/'.$deleteItem->filename_l);
				$m = get_file_info('../uploads/medium/'. $deleteItem->filename_m);
				$s = get_file_info('../uploads/thumbs/'. $deleteItem->filename_s);
				if($l){
					unlink(FCPATH.'../uploads/large/'.$deleteItem->filename_l);
				}
				if($m){
					unlink(FCPATH.'../uploads/medium/'.$deleteItem->filename_m);
				}
				if($s){
					unlink(FCPATH.'../uploads/thumbs/'.$deleteItem->filename_s);
				}
				/* end of check existe files */

				echo json_encode(array('result'=>true));
			}else{
				echo json_encode(array('result'=>false));
			}
			 
		}else{
			redirect('gallery');
		}
	}
}