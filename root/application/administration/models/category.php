<?php
class Category extends ActiveRecord\Model{

   static $belongs_to = array(
        array('parent', 'foreign_key' => 'parent_id', 'class_name' => 'Category','order' => 'position asc')
   );

   static $has_many = array(
        array('children', 'foreign_key' => 'parent_id', 'class_name' => 'Category', 'order' => 'position asc')
    );


	public function get_topLevel()
	{
		return category::find('all',array('conditions'=>array('level_depth = 1')));
	}

	public function get_parentLevel($id)
	{
		return category::find_by_id($id);
	}

	public function get_nextLevel($id)
	{
		$item = category::find_by_id($id);
		return category::find('all',array('conditions'=>array('parent_id='.$item->id)));
	}


	
	private function get_levelDepth()
	{
		$levelDepth = category::find('all',array('select'=>'level_depth'));
		if($levelDepth){
			foreach ($levelDepth as $level){
				$item[]  = $level->level_depth;
			}
			return array_unique($item);
		}else{
			return false;
		}
	}


}