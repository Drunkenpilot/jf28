<div class="panel panel-default">

<div class=" panel-heading">Categories</div>
<div class="panel-body">
<a class="btn btn-danger btn-sm pull-right" href="<?=site_url('catalog/categories')?>"><i class="glyphicon glyphicon-ban-circle"></i> <?=nbs(1)?> Cancel</a>
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
								value="<?=$category->id?>" checked> <?=$category->name?> <small>[ Level-<?=$category->level_depth?> ]</small></label>
						</div>
				
						<ul>
						<?php foreach ($category->children as $cat):?>
							<li>
								<div class="radio">
									<label><input type="radio" name="parent_id"
										value="<?=$cat->id?>"> <?=$cat->name?> <small>[ Level-<?=$cat->level_depth?> ]</small></label>
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
			<div class="form-group">
			<label>Activity</label>
			<select class="form-control" name="active">
				<option value="1">active</option>
				<option value="0">désactivé</option>
			</select>
		</div>
		<div class="form-group">
			<label>Name:</label>
			<input class="form-control" type="text" name="name" value="" required autofocus>
		</div>
		
		<div class="form-group">
			<label>Short description:</label>
			<input class="form-control" type="text" name="description" value="" >
		</div>
		<button type="submit" class="btn btn-primary pull-right">Save</button>
		</form>
	</div>
</div>

		




