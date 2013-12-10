<?php
class Categories extends MY_Controller{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->admin || $this->admin->status !=1 ) redirect('login');
	}
	
	function index()
	{
		if($_POST){
			if($_POST['action'] == 'up'){
			$neighbor = category::find_by_position_and_parent_id($_POST['position']-1,$_POST['parent_id']);
			$neighbor->position = $_POST['position'];
			$neighbor->save();
			$up = category::find_by_id($_POST['cat_id']);
			$up->position = $_POST['position']-1;
			$up->save();
			}else{
			$neighbor = category::find_by_position_and_parent_id($_POST['position']+1,$_POST['parent_id']);	
			$neighbor->position = $_POST['position'];
			$neighbor->save();
			$down = category::find_by_id($_POST['cat_id']);
			$down->position = $_POST['position']+1;
			$down->save();
			}
			redirect('catalog/categories');
		}
		$topLevel = category::find(1);
		$data['topLevel'] = $topLevel;
		$data['title'] = $this->title('Categories');
		$this->load->view($this->theme->admin_theme.'/header',$data);
		$this->load->view($this->theme->admin_theme.'/catalog/categories/index');
		$this->load->view($this->theme->admin_theme.'/footer');
	}
	
	function addNewCategory()
	{
		if($_POST){
			$parent = category::find_by_id($_POST['parent_id']);
			$level_depth = $parent->level_depth+1;
			$item = category::find_all_by_parent_id($_POST['parent_id']);
			$position = count($item)+1;
			$data = array('id'=>'','parent_id'=>$_POST['parent_id'],'name'=>$_POST['name'],'level_depth'=>$level_depth,'active'=>$_POST['active'],'position'=>$position,'description'=>$_POST['description']);
			$newCat = category::create($data);
			if($newCat){
				if($newCat->level_depth>1){
				redirect('catalog/categories/viewSubCategory/'.$newCat->parent_id);
				}else{
				redirect('catalog/categories');	
				}
			}
		}
		
		$data['category'] = category::find(1);
		$data['title'] = $this->title('Categories');
		$this->load->view($this->theme->admin_theme.'/header',$data);
		$this->load->view($this->theme->admin_theme.'/catalog/categories/addNewCategory');
		$this->load->view($this->theme->admin_theme.'/footer');
	}
	
	function edit($id = NULL)
	{
		
	if($id !=NULL && is_numeric($id)){
			if($_POST){
				
				$update =category::find_by_id($id);
				if($update->parent_id != $_POST['parent_id']){
					$newParent = category::find_by_id($_POST['parent_id']);
					$level_depth = $newParent->level_depth+1;
					$item = category::find_all_by_parent_id($_POST['parent_id']);
					$position = count($item)+1;
					$reposition = category::find('all',array('conditions'=>array('parent_id = ? AND position > ?', $update->parent_id,$update->position)));
					foreach ($reposition as $res){
						$res->position = $res->position-1;
						$res->save();
					}
					$update->parent_id =$_POST['parent_id'];
					$update->name = $_POST['name'];
					$update->description = $_POST['description'];
					$update->active = $_POST['active'];
					$update->level_depth = $level_depth;
					$update->position = $position;
					$update->view = $_POST['view'];
					$update->save();
					
					$children = category::find_all_by_parent_id($update->id);
					foreach ($children as $child){
						$child->level_depth = $update->level_depth+1;
						$child->save();
					}
					
					$data['msg'] = 'Update has been executed successfully';
				}else{
					
				$update->name = $_POST['name'];
				$update->description = $_POST['description'];
				$update->active = $_POST['active'];
				$update->view = $_POST['view'];
				$update->save();
				$data['msg'] = 'Update has been executed successfully';
				}				
				
				
			
			}
			$data['category'] = category::find(1);
			$data['editCat'] =category::find_by_id($id);
			$data['title'] = $this->title('Categories');
			$this->load->view($this->theme->admin_theme.'/header',$data);
			$this->load->view($this->theme->admin_theme.'/catalog/categories/editCategory');
			$this->load->view($this->theme->admin_theme.'/footer');
					
		}else{
		redirect('catalog/categories');
		}
	}
	
	function deleteCategory($id = NULL)
	{
		if($id !=NULL && is_numeric($id)){
			
		}else{
		redirect('catalog/categories');
		}
		
	}
	
	function viewSubCategory($id = NULL)
	{
		if($id !=NULL && is_numeric($id)){
				
			if($_POST){
				if($_POST['action'] == 'up'){
					$neighbor = category::find_by_position_and_parent_id($_POST['position']-1,$_POST['parent_id']);
					$neighbor->position = $_POST['position'];
					$neighbor->save();
					$up = category::find_by_id($_POST['cat_id']);
					$up->position = $_POST['position']-1;
					$up->save();
				}else{
					$neighbor = category::find_by_position_and_parent_id($_POST['position']+1,$_POST['parent_id']);
					$neighbor->position = $_POST['position'];
					$neighbor->save();
					$down = category::find_by_id($_POST['cat_id']);
					$down->position = $_POST['position']+1;
					$down->save();
				}
				redirect('catalog/categories/viewSubCategory/'.$_POST['parent_id']);
			}
				
			$nextLevel = category::find($id);
			$data['nextLevel'] =$nextLevel;
			$data['title'] = $this->title('Categories');
			$this->load->view($this->theme->admin_theme.'/header',$data);
			$this->load->view($this->theme->admin_theme.'/catalog/categories/viewSubCategory');
			$this->load->view($this->theme->admin_theme.'/footer');
				
		}else{
			redirect('catalog/categories');
		}
	}

	
	
}