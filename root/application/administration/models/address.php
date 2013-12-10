<?php
class Address extends ActiveRecord\Model{
	static $belongs_to=array(
		array('member','class_name'=>'member' )
	);
	
	function get_address($id)
	{
		$address = address::find('all',array('conditions'=>'member_id='.$id));
		if($address){
			return $address;
		}else{
			return false;
		}
	}
	
	function update_address($post)
	{	
			$community_id = $post['community_id'];
			$id = $post['id'];
			$ring = $post['ring'];
			$house_num = $post['house_num'];
			$address = $post['address'];
			$tele = $post['tele'];
			$community_info = community::find_by_id($community_id);
			$postal = $community_info->code;
			$community = $community_info->name;
		$this_address = address::find_by_id($id);
		$this_address->ring = $ring;
		$this_address->house_num = $house_num;
		$this_address->address = $address;
		$this_address->tele = $tele;
		$this_address->postal = $postal;
		$this_address->community = $community;
		if($this_address->save()){
		return true;
		}
		
			
	}
	
	function insert_address($post)
	{
			$community_id = $post['community_id'];
			$member_id = $post['member_id'];
			$ring = $post['ring'];
			$house_num = $post['house_num'];
			$address = $post['address'];
			$tele = $post['tele'];
			$community_info = community::find_by_id($community_id);
			$postal = $community_info->code;
			$community = $community_info->name;	
			$new_array = array('id'=>'','member_id'=>$member_id,'ring'=>$ring,'postal'=>$postal,'community'=>$community,'house_num'=>$house_num,'address'=>$address,'tele'=>$tele);
			$new_address = address::create($new_array);
			if($new_address->save()){
				return true;
			}else{
				return false;
			}
	}
}