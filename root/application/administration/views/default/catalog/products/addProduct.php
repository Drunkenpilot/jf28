<div class="panel panel-default">

	<div class=" panel-heading">Product</div>
	<div class="panel-body">
	<?php if(isset($msg)):?>
	<?php if($msg){?>
		<div class="alert alert-danger"><?=$msg?>
		</div>
		<?php }?>		
			<?php endif;?>
		
		<a class="btn btn-warning btn-sm pull-right"
			href="<?=site_url('catalog/products')?>/<?=$this->uri->segment(4)?>"><i
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
										<?php if($cat->id ==$this->uri->segment(4)){?> checked
										<?php }?>> <?=$cat->name?> <small>[ Level-<?=$cat->level_depth?>
											]</small> </label>
								</div>
								<ul>
								<?php foreach ($cat->children as $subcat):?>

									<li>
										<div class="radio">
											<label><input type="radio" name="category_id"
												value="<?=$subcat->id?>"
												<?php if($subcat->id ==$this->uri->segment(4) ){?>
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
				<div class="form-group">
				<label>Activity </label> 
				<select class="form-control" name="active">
					<option value="1">active</option>
					<option value="0">désactivé</option>
				</select>
			</div>
			<div class="form-group">
				<label>Product Num:</label> <input class="form-control" type="text"
					name="product_num" value="" required
					autofocus>
			</div>
			<div class="form-group">
				<label>Product Name:</label> <input class="form-control" type="text"
					name="product_name" value="" required
					autofocus>
			</div>
			<div class="form-group">
				<label>Tax Group</label> <select
					class="form-control" name="tax_group_id">
					<?php foreach ($taxGroup as $t):?>
					<option value="<?=$t->id?>"><?=$t->name?> <?=$t->value*100?> %</option>
				<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label>Minimun Per Order </label> <select
					class="form-control" name="minNum">
					<?php for($i=1;$i<11;$i++){?>
					<option value="<?=$i?>"><?=$i?></option>
				<?php }?>
				</select>
			</div>
			<div class="input-group">
			<span class="input-group-addon">Price with VAT</span>
				 <input class="form-control" type="text"
					name="product_price" value="" required
					autofocus> <span class="input-group-addon">€</span><span class="input-group-addon">for</span>
					 <input class="form-control" type="text"
					name="num" value="" placeholder="1234.."><span class="input-group-addon">piece(s)</span>
			</div>
			<br>
			<div class="form-group">
				<label>Short Description:</label>
				<textarea class="form-control" rows="5" name="description"></textarea>
				
			</div>
			<button type="submit" class="btn btn-primary pull-right" >Save</button>
	</div>
		</form>
</div>
