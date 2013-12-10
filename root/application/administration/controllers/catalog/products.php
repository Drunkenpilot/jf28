<?php
class Products extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		if(!$this->admin || $this->admin->status !=1 ) redirect('login');

	}

	function index()
	{
		if($_POST){
			if($_POST['action'] == 'up'){
				$neighbor = product::find_by_position_and_category_id($_POST['position']-1,$_POST['category_id']);
				$neighbor->position = $_POST['position'];
				$neighbor->save();
				$up = product::find_by_id($_POST['id']);
				$up->position = $_POST['position']-1;
				$up->save();
			}else{
				$neighbor = product::find_by_position_and_category_id($_POST['position']+1,$_POST['category_id']);
				$neighbor->position = $_POST['position'];
				$neighbor->save();
				$down = product::find_by_id($_POST['id']);
				$down->position = $_POST['position']+1;
				$down->save();
			}
			redirect('catalog/products/'.$_POST['category_id']);
		}
		$cat_id = $this->uri->segment(3);
		if($cat_id){
			$data['products'] = product::find('all',array('conditions'=>array('category_id='.$cat_id),'order'=>'position asc'));
		}else{
			$data['products'] = product::find('all',array('order'=>'category_id, position asc'));
		}
		$data['category'] = category::find(1);
		$data['title'] = $this->title('Products');
		$this->load->view($this->theme->admin_theme.'/header',$data);
		$this->load->view($this->theme->admin_theme.'/catalog/products/index');
		$this->load->view($this->theme->admin_theme.'/footer');
	}

	function edit($id = NULL)
	{
		if($id !=NULL && is_numeric($id)){
			if($_POST){
				$update = product::find_by_id($id);
				if($update->category_id != $_POST['category_id']){
					$item = product::find_all_by_category_id($_POST['category_id']);
					$position = count($item)+1;	
					$reposition = product::find('all',array('conditions'=>array('category_id = ? AND position > ?', $update->category_id,$update->position)));
					foreach ($reposition as $res){
						$res->position = $res->position-1;
						$res->save();
					}
					$update->category_id = $_POST['category_id'];
					$update->product_num = $_POST['product_num'];
					$update->product_name = $_POST['product_name'];
					$update->product_price = number_format($_POST['product_price'],2,'.','');
					$update->description = $_POST['description'];
					$update->position = $position;
					$update->active = $_POST['active'];
					$update->min_num = $_POST['minNum'];
					if($_POST['num'] != ''){
						$update->num = $_POST['num'];
					}else{
						$update->num = null;
					}
					$update->taxgroup_id = $_POST['tax_group_id'];
					if($update->save())
					{
						$data['editProduct'] = $update;
						$data['msg'] = 'Update has been executed successfully';
					}
				}else{
										
					$update->product_num = $_POST['product_num'];
					$update->product_name = $_POST['product_name'];
					$update->product_price = number_format($_POST['product_price'],2,'.','');
					$update->description = $_POST['description'];
					$update->active = $_POST['active'];
					$update->min_num = $_POST['minNum'];
					if($_POST['num'] != ''){
					$update->num = $_POST['num'];
					}else{
						$update->num = null;
					}
					$update->taxgroup_id = $_POST['tax_group_id'];
					if($update->save())
					{
						$data['editProduct'] = $update;
						$data['msg'] = 'Update has been executed successfully';
					}
				}
			}else{
				$data['editProduct'] =product::find_by_id($id);
			}
			$data['category'] = category::find(1);

			$data['taxGroup'] = taxgroup::find('all');
			$data['title'] = $this->title('Products');
			$this->load->view($this->theme->admin_theme.'/header',$data);
			$this->load->view($this->theme->admin_theme.'/catalog/products/editProduct');
			$this->load->view($this->theme->admin_theme.'/footer');
		}else{
			redirect('catalog/products');
		}
	}

	function addProduct($cat_id = NULL)
	{

		if($_POST){
			$item = product::find_all_by_category_id($_POST['category_id']);
			$position = count($item)+1;
			if($_POST['num'] != ''){
				$num = $_POST['num'];
			}else{
				$num = null;
			}
			$newProduct = array('category_id'=>$_POST['category_id'],'product_num'=>$_POST['product_num'],'product_name'=>$_POST['product_name'],'product_price'=>number_format($_POST['product_price'],2,'.',''),'description'=>$_POST['description'],'active'=>$_POST['active'],'taxgroup_id'=>$_POST['tax_group_id'],'num'=>$num,'min_num'=>$_POST['minNum'],'position'=>$position);
			$product = product::create($newProduct);
			if($product){
				redirect('catalog/products/'.$cat_id);
			}else{
				$data['msg'] = 'There are some errors.';
			}
		}
		$data['category'] = category::find(1);
		$data['taxGroup'] = taxgroup::find('all');
		$data['title'] = $this->title('Products');
		$this->load->view($this->theme->admin_theme.'/header',$data);
		$this->load->view($this->theme->admin_theme.'/catalog/products/addProduct');
		$this->load->view($this->theme->admin_theme.'/footer');

	}

	function addThumb()
	{
		if($_POST)
		{
			$md5Date = Date("Y_m_d_H_i_s");
			$config['upload_path'] = '../assets/productThumbs';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = '2000';
			$config['file_name'] = 'thumb_'.$md5Date;
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$error = array('validate'=>FALSE,'error' => $this->upload->display_errors());
				var_dump($error);
			}else{
				$upload_data = $this->upload->data();
				$thumbName = $upload_data['file_name'];
				$img_width = $upload_data['image_width'];
				$img_height = $upload_data['image_height'];
				$this->load->library('image_lib');
					
				$config['image_library'] = 'gd2';
				$config['source_image'] = '../assets/productThumbs/'.$thumbName;
				$config['new_image'] = '../assets/productThumbs/'.$thumbName;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				if($img_width > $img_height){

					$config['width'] = '200';
					$config['height'] = round($img_height *(200/$img_width));
				}elseif($img_width == $img_height){
					$config['height'] = $config['width'] = '200';
				}else{
					$config['height'] = '200';
					$config['width'] = round($img_width *(200/$img_height));
				}
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

				$product = product::find_by_id($_POST['product_id']);
				if($product->thumb){
					$file_to_delete = $product->thumb;
					$path_file = '../assets/productThumbs/'.$file_to_delete;
					unlink($path_file);
				}
				$product->thumb = $thumbName;
				$product->save();
				redirect('catalog/products/edit/'.$_POST['product_id']);
			}
		}else{
			redirect('catalog/products');
		}
	}
	
	
	function attributes($id = NULL)
	{
		if($id !=NULL && is_numeric($id)){
			
			if($_POST)
			{
				 
				if($_POST['formData'] =='new_group'){
					$newGroupData = array('product_id'=>$_POST['product_id'],'attribute_group_name'=>$_POST['group_name'],'status'=>1);
					$newGroup = attributegroup::create($newGroupData);
					$data['msg'] = 'The new group has been created';
				}elseif($_POST['formData'] =='update_group_name'){
					$thisGroup = attributegroup::find_by_id($_POST['group_id']);
					$thisGroup->attribute_group_name = $_POST['group_name'];
					$thisGroup->save();
					$data['msg'] = 'The group name has been updated';
				}elseif($_POST['formData'] =='new_attribute'){
					if($_POST['attribute_price'] !='')
					{
						$attribute_price = $_POST['attribute_price'];
					}else{
						$attribute_price = null;
					}
					
					$newAttributeData =array('attributegroup_id'=>$_POST['group_id'],'attribute_name'=>$_POST['attribute_name'],'attribute_price'=>$attribute_price);
					$newAttribute = attributeproduct::create($newAttributeData);
					$data['msg'] = 'The new attribtue has been created';
				}elseif ($_POST['formData'] =='update_attribute_name'){
					$attribute = attributeproduct::find_by_id($_POST['id']);
					$attribute->attribute_name = $_POST['attribute_name'];
					if($_POST['attribute_price'] !='')
					{
						$attribute->attribute_price = $_POST['attribute_price'];
					}else{
						$attribute->attribute_price = null;
					}
					$attribute->save();
					$data['msg'] = 'The attribute has been updated';
				}elseif ($_POST['formData'] =='delete_attribute'){
					$attribute = attributeproduct::find_by_id($_POST['id']);
					if($attribute){
					$attribute->delete();
					$data['msg'] = 'The attribute has been deleted';
					}else{
						$data['msg'] = 'The attribute not found';
					}
				}elseif ($_POST['formData'] =='delete_group'){
					$group = attributegroup::find_by_id($_POST['group_id']);
					if($group){
						$attribute_id = array();
						foreach ($group->attributeproduct as $attribute){
							$attribute_id[] = $attribute->id;
						}
							attributeproduct::table()->delete(array('id'=>$attribute_id));
							$group->delete();
							$data['msg'] = 'The group has been deleted';
					}else{
						$data['msg'] = 'The group not found';
					}
				}elseif($_POST['formData'] =='update_group_status'){
						$group = attributegroup::find_by_id($_POST['group_id']);
						$group->status = $_POST['status'];
						$group->save();
						if($group->status==1){
							$data['msg'] = 'The group has been actived';
						}else{
							$data['msg'] = 'The group has been blocked';
						}
				}
				
			}
			$data['product'] = product::find_by_id($id);
			$data['title'] = $this->title('Products');
			$this->load->view($this->theme->admin_theme.'/header',$data);
			$this->load->view($this->theme->admin_theme.'/catalog/products/attributes');
			$this->load->view($this->theme->admin_theme.'/footer');
			
			
		}else{
			redirect('catalog/products');
		}
	}
	
	
	
	
}