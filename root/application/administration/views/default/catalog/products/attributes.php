<div class="panel panel-default">

	<div class=" panel-heading">Product</div>
	<div class="panel-body">
	<?php if(isset($msg)):?>
	<?php if($msg){?>
		<div class="alert alert-success"><?=$msg?>
		</div>
		<?php }?>		
			<?php endif;?>
		ID:
		<?=$product->id?>
		<?=nbs(2)?>
		Name:
		<?=$product->product_name?>
		<a class="btn btn-warning btn-sm pull-right"
			href="<?=site_url('catalog/products/edit')?>/<?=$product->id?>"><i
			class="glyphicon glyphicon-arrow-left"></i> <?=nbs(1)?> back to list</a>
	</div>

</div>

<div class="row">
	<div class="col-md-6">
	
	<div class="panel panel-default">
					<div class=" panel-heading">
						Attributes Groups
					</div>
					<div class="panel-body">
					<form role="form" action="" method="post">
						<div class="input-group">
						<input type="text" name="group_name" value="" class="form-control" required focus>
						<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button></span>
						<input type="hidden" name="formData" value="new_group">
						<input type="hidden" name="product_id" value="<?=$product->id?>">
						</div>
						<br>
					</form>
					
						<?php foreach ($product->attributegroup as $group):?>
					<form role="form" action="" method="post">
						<div class="input-group">
						<input type="text" name="group_name" value="<?=$group->attribute_group_name?>" class="form-control" required focus>
						<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> update</button></span>
						</div>
						<input type="hidden" name="formData" value="update_group_name">
						<input type="hidden" name="group_id" value="<?=$group->id?>">
						<br>
					</form>	
					<form  role="form" action="" method="post" name="statusChange">
									<input type="hidden" name="formData" value="update_group_status">
									<input type="hidden" name="group_id" value="<?=$group->id?>">
									<div class="input-group">
									
									<select name="status" class="form-control">
										<option value="1" <?php if($group->status==1){?>selected="selected"<?php }?>>Active</option>
										<option value="0" <?php if($group->status==0){?>selected="selected"<?php }?>>Blocked</option>
									</select>
									<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> update</button></span>
									</div>
								</form>
								<br>
						<form action="" role="form" action="" method="post">
									<input type="hidden" name="formData" value="delete_group">
									<input type="hidden" name="group_id" value="<?=$group->id?>">
									<div class="form-group">
									<button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> delete</button>
									</div>
								</form>
								<hr>
						<?php endforeach;?>
						
					</form>
					</div>
	</div>
	</div>
	
	<div class="col-md-6">
				<div class="panel panel-default">
					<div class=" panel-heading">
						Attributes Products
					</div>
					<div class="panel-body">
					<?php foreach ($product->attributegroup as $group):?>
						<div class="">
						<h4><?=$group->attribute_group_name?></h4>
							<?php foreach ($group->attributeproduct as $attribute):?>
								<form action="" role="form" action="" method="post">
									<input type="hidden" name="formData" value="update_attribute_name">
									<input type="hidden" name="id" value="<?=$attribute->id?>">
									<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
									<input type="text" name="attribute_name" value="<?=$attribute->attribute_name?>" class="form-control" required focus>
									<span class="input-group-addon">€</span>
								<input type="text" name="attribute_price" value="<?=$attribute->attribute_price?>" class="form-control">
							<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> update</button></span>
								
									</div>
									<br>
								</form>
								<form action="" role="form" action="" method="post">
									<input type="hidden" name="formData" value="delete_attribute">
									<input type="hidden" name="id" value="<?=$attribute->id?>">
									<div class="form-group">
									<button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> delete</button>
									</div>
								</form>
								<hr>
							<?php endforeach;?>
						<form role="form" action="" method="post">
						<input type="hidden" name="formData" value="new_attribute">
						<input type="hidden" name="group_id" value="<?=$group->id?>">
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
						<input type="text" name="attribute_name" value="" class="form-control" required focus>
						<span class="input-group-addon">€</span>
						<input type="text" name="attribute_price" value="" class="form-control">
						<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button></span>
						
						</div>
						<br>
					</form>
						</div>
					
					<?php endforeach;?>
					</div>
				</div>
	
	
	</div>
</div>