<div class="panel panel-default">

<div class=" panel-heading">Categories</div>
<div class="panel-body">
	<?php if(isset($msg)):?>
	<?php if($msg){?>
		<div class="alert alert-success"><?=$msg?>
		</div>
		<?php }?>		
			<?php endif;?>
<a class="btn btn-warning btn-sm pull-right" href="<?=site_url('catalog/categories')?>"><i class="glyphicon glyphicon-arrow-left"></i> <?=nbs(1)?> back to list</a>
</div>
	
</div>
<div class="row">
	<div class="col-md-6">
	<form class="form" role="form" method="post" action="">
		<div class="form-group">
		<div class="panel panel-default">
				<div class=" panel-heading">Category: <span class="label label-default">In this case, it won't work after level-2</span></div>
				<div class="panel-body">
				<ul>
					<li>
						<div class="radio">
							<label><input type="radio" name="parent_id"
								value="<?=$category->id?>" <?php if($category->id ==$editCat->parent_id ){?>checked<?php }?>> <?=$category->name?> <small>[ Level-<?=$category->level_depth?> ]</small></label>
						</div>
				
						<ul>
						<?php foreach ($category->children as $cat):?>
							<li>
								<div class="radio">
									<label><input type="radio" name="parent_id" <?php if($cat->id ==$editCat->id){?>disabled<?php }?>
										value="<?=$cat->id?>" <?php if($cat->id ==$editCat->parent_id ){?>checked<?php }?>> <?=$cat->name?> <small>[ Level-<?=$cat->level_depth?> ]</small></label>
								</div>
								<ul>
								<?php foreach ($cat->children as $subcat):?>

									<li>
										 <?=$subcat->name?> <small>[ Level-<?=$subcat->level_depth?> ]</small>
									</li>

									<?php endforeach;?>
								</ul>
							</li>
							<?php endforeach;?>
						</ul>
							
					</li>
				</ul>
			</div>
			</div>
			</div>
			
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
		<div class="panel-heading">Category's informations</div>
			<div class="panel-body">
	<div class="form-group">
			<label>Activity <?php if($editCat->active == '1' ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></label>
			<select class="form-control" name="active">
				<option value="1" <?php if($editCat->active == 1 ){?>selected="selected"<?php }?>>active</option>
				<option value="0" <?php if($editCat->active == 0 ){?>selected="selected"<?php }?>>désactivé</option>
			</select>
		</div>
		<div class="checkbox">
		<label>View Mode:</label><br>
		<div class="radio">
 		 <label>
 	   <input type="radio" name="view"  value="0" <?php if($editCat->view == 0){?>checked="checked"<?php }?>><?=nbs(2)?><i class="glyphicon glyphicon-th-large"></i> no-list mode
  		</label>
		</div>
		<div class="radio">
  		<label>
    	<input type="radio" name="view"  value="1" <?php if($editCat->view == 1){?>checked="checked"<?php }?>> <?=nbs(2)?><i class="glyphicon glyphicon-list"></i> list mode
  		</label>	
		</div>
		</div>
		<div class="form-group">
			<label>Name:</label>
			<input class="form-control" type="text" name="name" value="<?=$editCat->name?>" required autofocus>
		</div>
		
		<div class="form-group">
			<label>Short description:</label>
			<input class="form-control" type="text" name="description" value="<?=$editCat->description?>" >
		</div>
		<input  type="hidden" name="cat_id" value="<?=$editCat->id?>" >
		<button type="submit" class="btn btn-primary pull-right">Update</button>
		<div class="clearfix"></div>
		
		</form>
		</div>
		</div>
	
		<div class="panel panel-default">
			<div class="panel-heading">Category's thumb</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>

		
