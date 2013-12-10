<?php
class lunch extends ActiveRecord\Model{
	
	
	static $has_many = array(
     array('lunch_item','class_name'=>'lunch_item')
   );
	
}