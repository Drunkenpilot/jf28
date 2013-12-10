<div class="panel panel-default">

<div class=" panel-heading">Plat du jour</div>
<div class="panel-body">
	<?php if(isset($msg)):?>
	<?php if($msg){?>
		<div class="alert alert-success"><?=$msg?>
		</div>
		<?php }?>		
			<?php endif;?>
		
<a class="btn btn-warning btn-sm" href="<?=site_url('catalog/dailyMeal')?>"><i class="glyphicon glyphicon-arrow-left"></i> <?=nbs(1)?> back to list</a>
	<button class="btn btn-primary btn-sm pull-right" type="button" onclick="$('form[name=dailyMeal]').trigger('submit')">update</button>
</div>
	
</div>

<div class="row">
	<form role="form" action="" method="post" name="dailyMeal">
	<div class="col-md-6">

	<div class="panel panel-default">
				<div class=" panel-heading">Basic informations </div>
				<div class="panel-body">
					<p>ID: <?=$lunch->id?></p>
					<p><b><?=$lunch->product_name?></b> for <?=$lunch->day_week?></p>
					<hr>
					<div class="form-group">
				<label>Activity <?php if($lunch->active == 1 ){?><span
					class="label label-success">Active</span> <?php }else{?><span
					class="label label-danger">Blocked</span> <?php }?> </label> <select
					class="form-control" name="active">
					<option value="1" <?php if($lunch->active == 1 ){?>
						selected="selected" <?php }?>>active</option>
					<option value="0" <?php if($lunch->active == 0){?>
						selected="selected" <?php }?>>désactivé</option>
				</select>
			</div>
					<div class="form-group">
						<label>Product price</label>
					<div class="input-group">
					<span class="input-group-addon">Price with VAT</span>
				 	<input class="form-control" type="text" name="product_price" value="<?=number_format($lunch->product_price,2,'.','')?>" required autofocus>
					 <span class="input-group-addon">€</span><span class="input-group-addon">for</span>
					 <input class="form-control" type="text" name="num" value="<?=$lunch->num?>" placeholder="1234.." ><span class="input-group-addon">piece(s)</span>
					</div>
					</div> 
					<div class="form-group">
					<label>Minimun Per Order </label> 
					<select class="form-control" name="minNum">
					<?php for($i=1;$i<11;$i++){?>
					<option value="<?=$i?>" <?php if($i == $lunch->min_num){?>selected="selected"<?php }?>><?=$i?></option>
					<?php }?>
					</select>
					</div>
			
					<div class="form-group">
					<label>Tax </label> <select
					class="form-control" name="tax_group_id">
					<?php foreach ($taxGroup as $t):?>
					<option value="<?=$t->id?>" <?php if($t->id == $lunch->taxgroup_id ){?>
						selected="selected" <?php }?>><?=$t->name?> <?=$t->value*100?> %</option>
					<?php endforeach;?>
					</select>
					</div>
					<div class="form-group">
					<label>Short Description:</label>
					<textarea class="form-control" rows="6" name="description" ><?=$lunch->description?></textarea>
					</div>	
					
				
				</div>
	</div>
	
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
				<div class=" panel-heading">Meals Setup </div>
				<div class="panel-body">
				<?php foreach ($lunch->lunch_item as $item):?>
					<div class="form-group">
						<label>Soupe</label>
						<input class="form-control" type="text" name="soup" value="<?=$item->soup?>"> 
					</div>
					<div class="form-group">
						<label>Entrée</label>
						<input class="form-control" type="text" name="starter" value="<?=$item->starter?>"> 
					</div>
					<div class="form-group">
						<label>Salade</label>
						<input class="form-control" type="text" name="salade" value="<?=$item->salade?>"> 
					</div>	
					<div class="form-group">
						<label>Plat 1</label>
						<input class="form-control" type="text" name="first_meal" value="<?=$item->first_meal?>"> 
					</div>
					<div class="form-group">
						<label>Plat 2</label>
						<input class="form-control" type="text" name="second_meal" value="<?=$item->second_meal?>"> 
					</div>	
					<div class="form-group">
						<label>Dessert</label>
						<input class="form-control" type="text" name="dessert" value="<?=$item->dessert?>"> 
					</div>		
				<?php endforeach;?>	

				
				</div>
		</div>
	</div>
	</form>
</div>