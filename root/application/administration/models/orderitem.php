<?php
class Orderitem extends ActiveRecord\Model{
	
		static $belongs_to = array( 
		array('taxgroup','class_name'=>'taxgroup')
		);
	
	function get_details($num)
	{
		$orderitem = orderitem::find('all',array('conditions'=>array('order_num'=>$num),'order'=>'product_id asc'));
		return $orderitem;	
	}
	
 }