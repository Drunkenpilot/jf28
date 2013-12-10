<div class="panel panel-default">
<div class=" panel-heading">Categories [ <?=$nextLevel->name?> ]</div>
<div class="panel-body">
<a class="btn btn-warning btn-sm" href="<?php if($nextLevel->level_depth > 1){?><?=site_url('catalog/categories/viewSubCategory')?>/<?=$nextLevel->parent_id?><?php }else{?><?=site_url('catalog/categories')?><?php }?>"><i class="glyphicon glyphicon-arrow-left"></i><?=nbs(1)?> back to list</a>
</div>
<div class="table-responsive" >
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>View</th>
				<th>Name</th>
				<th>Description</th>
				<th>Position</th>
				<th>Activity</th>
				<th>Sub-Category</th>
				<th>Actions</th>						
			</tr>
		
		</thead>
		<?php if(isset($nextLevel)):?>
		<tbody>
		<?php  $last_position = count($nextLevel->children);?>
		<?php foreach ($nextLevel->children as $cat) :?>
			<tr>
			<form actions="" method="post" role="form" class="form-inline" id="position_up_<?=$cat->id?>" enctype="multipart/form-data">
				<input type="hidden" name="cat_id" value="<?=$cat->id?>">
				<input type="hidden" name="parent_id" value="<?=$cat->parent_id?>">
				<input type="hidden" name="position" value="<?=$cat->position?>">
				<input type="hidden" name="action" value="up">
			</form>
			<form actions="" method="post" role="form" class="form-inline" id="position_down_<?=$cat->id?>" enctype="multipart/form-data">
				<input type="hidden" name="cat_id" value="<?=$cat->id?>">
				<input type="hidden" name="parent_id" value="<?=$cat->parent_id?>">
				<input type="hidden" name="position" value="<?=$cat->position?>">
				<input type="hidden" name="action" value="down">
			</form>
				<td><?=$cat->parent_id?> - <?=$cat->id?></td>
				<td><?php if($cat->view == 1){?><i class="glyphicon glyphicon-list"></i><?php }else{?><i class="glyphicon glyphicon-th-large"></i><?php }?></td>
				<td><?=$cat->name?></td>
				<td><?=$cat->description?></td>
				<td><button type="button" class="btn btn-primary btn-xs" onclick="position_up(<?=$cat->id?>);" <?php if($cat->position==1){?>disabled<?php }?>><i class="glyphicon glyphicon-circle-arrow-up"></i></button> <?=$cat->position?> <button type="button" class="btn btn-primary btn-xs" onclick="position_down(<?=$cat->id?>);" <?php if($last_position == $cat->position){?>disabled<?php }?>><i class="glyphicon glyphicon-circle-arrow-down"></i></button></td>		
				<td><?php if($cat->active == '1' ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></td>
				<td><a href="<?=site_url('catalog/categories/viewSubCategory')?>/<?=$cat->id?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i><?=nbs(2)?>view</a></td>
				<td>
				<div class="btn-group">
				<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
				Actions <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				<li><a href="<?=site_url('catalog/categories/edit')?>/<?=$cat->id?>" >edit</a></li>
				<li><a href="<?=site_url('catalog/categories/deleteCategory')?>/<?=$cat->id?>" >delete</a></li>
				
				</ul>
			
			</div></td>
			</tr>	
		<?php endforeach;?>
		
		
		</tbody>
		<?php endif;?>
	</table>



</div>



</div>
