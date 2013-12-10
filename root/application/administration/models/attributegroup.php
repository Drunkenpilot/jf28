<?php
class Attributegroup extends ActiveRecord\Model{
	
	static $has_many = array(
     array('attributeproduct','class_name'=>'attributeproduct')
   );
	
		
	
	
	
}