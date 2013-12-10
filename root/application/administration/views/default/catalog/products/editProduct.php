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
		<?=$editProduct->id?>
		<?=nbs(2)?>
		Name:
		<?=$editProduct->product_name?>
		<a class="btn btn-warning btn-sm pull-right"
			href="<?=site_url('catalog/products')?>/<?=$editProduct->category_id?>"><i
			class="glyphicon glyphicon-arrow-left"></i> <?=nbs(1)?> back to list</a>
	</div>

</div>

<div class="row">
	<div class="col-md-6">
		<form class="form" role="form" method="post" action="">
			<div class="form-group">
				<div class="panel panel-default">
					<div class=" panel-heading">
						Category: <span class="label label-default">In this case, it won't
							work after level-2</span>
					</div>
					<div class="panel-body">


						<ul>
						<?php foreach ($category->children as $cat):?>
							<li>
								<div class="radio">
									<label><input type="radio" name="category_id"
										value="<?=$cat->id?>"
										<?php if($cat->id ==$editProduct->category_id ){?> checked
										<?php }?>> <?=$cat->name?> <small>[ Level-<?=$cat->level_depth?>
											]</small> </label>
								</div>
								<ul>
								<?php foreach ($cat->children as $subcat):?>

									<li>
										<div class="radio">
											<label><input type="radio" name="category_id"
												value="<?=$subcat->id?>"
												<?php if($subcat->id ==$editProduct->category_id ){?>
												checked <?php }?>> <?=$subcat->name?> <small>[ Level-<?=$subcat->level_depth?>
													]</small> </label>
										</div>
									</li>

									<?php endforeach;?>
								</ul>
							</li>
							<?php endforeach;?>
						</ul>

					</div>
				</div>
			</div>

	</div>
	
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><?=$editProduct->product_name?></div>
		<div class="panel-body">
					<div class="form-group">
				<label>Activity <?php if($editProduct->active == '1' ){?><span
					class="label label-success">Active</span> <?php }else{?><span
					class="label label-danger">Blocked</span> <?php }?> </label> <select
					class="form-control" name="active">
					<option value="1" <?php if($editProduct->active == 1 ){?>
						selected="selected" <?php }?>>active</option>
					<option value="0" <?php if($editProduct->active == 0 ){?>
						selected="selected" <?php }?>>désactivé</option>
				</select>
			</div>
			<div class="form-group">
				<label>Product Num:</label> <input class="form-control" type="text"
					name="product_num" value="<?=$editProduct->product_num?>" required
					autofocus>
			</div>
			<div class="form-group">
				<label>Product Name:</label> <input class="form-control" type="text"
					name="product_name" value="<?=$editProduct->product_name?>" required
					autofocus>
			</div>
			<div class="form-group">
				<label>Tax </label> <select
					class="form-control" name="tax_group_id">
					<?php foreach ($taxGroup as $t):?>
					<option value="<?=$t->id?>" <?php if($t->id == $editProduct->taxgroup_id ){?>
						selected="selected" <?php }?>><?=$t->name?> <?=$t->value*100?> %</option>
				<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label>Minimun Per Order </label> <select
					class="form-control" name="minNum">
					<?php for($i=1;$i<11;$i++){?>
					<option value="<?=$i?>" <?php if($i == $editProduct->min_num){?>selected="selected"<?php }?>><?=$i?></option>
				<?php }?>
				</select>
			</div>
			<div class="input-group">
			<span class="input-group-addon">Price with VAT</span>
				 <input class="form-control" type="text"
					name="product_price" value="<?=number_format($editProduct->product_price,2,'.','')?>" required
					autofocus> <span class="input-group-addon">€</span><span class="input-group-addon">for</span>
					 <input class="form-control" type="text"
					name="num" value="<?=$editProduct->num?>" placeholder="1234.." ><span class="input-group-addon">piece(s)</span>
			</div>
			<br>
			<div class="form-group">
				<label>Short Description:</label>
				<textarea class="form-control" rows="6" name="description" ><?=$editProduct->description?></textarea>
			</div>
			<button type="submit" class="btn btn-primary pull-right" >Save</button>
		</form>
		</div>
	
	</div>
	
	<div class="panel panel-default">
					<div class=" panel-heading">
						Attributes
					</div>
					<div class="panel-body">
					<a href="<?=site_url('catalog/products/attributes')?>/<?=$editProduct->id?>" class="btn btn-primary">Edit Attributes</a>
					
					</div>
	</div>
	
		<div class="panel panel-default">
					<div class=" panel-heading">
						Thumb
					</div>
					<div class="panel-body">
					<?php if($editProduct->thumb){?>
					<a href="#" class="thumbnail">
      <img src="<?=base_url()?>../assets/productThumbs/<?=$editProduct->thumb?>" alt="...">
    </a>
					<?php }else{?>
						<a href="#" class="thumbnail">
      <img src="<?=base_url()?>../assets/productThumbs/productThumb_default.png" alt="">
    </a>
					<?php }?>
					<hr>
					<form role="form" action="<?=site_url('catalog/products/addThumb')?>" method="post" enctype="multipart/form-data">
						<input name="product_id" type="hidden" value="<?=$editProduct->id?>">
						<input type="file" name="userfile" size="20">
						<br>
						(allowed file: |png|jpg, maximun of size 1MB)
						<br><br>
						<button class="btn btn-primary " type="submit">upload</button>
					</form>
					</div>
		</div>			
	</div>
</div>
