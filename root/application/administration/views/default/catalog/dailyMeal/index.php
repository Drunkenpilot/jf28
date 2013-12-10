<div class="panel panel-default">

<div class=" panel-heading">Plat du jour</div>
<div class="panel-body">

</div>


<div class="table-responsive" >
	<table class="table table-hover">
		<thead>
			
				<th>ID</th>
				<th>Week</th>
				<th>Product</th>
				<th>Price</th>
				<th>Activity</th>
				<th>Minimun per order</th>
				<th>Actions</th>						
		
		</thead>
		<?php if($lunch):?>
		<tbody>
			<?php foreach ($lunch as $l):?>
				<tr>
					<td><?=$l->id?></td>
					<td><?=$l->day_week?></td>
					<td><?=$l->product_name?></td>
					<td><?=$l->product_price?></td>
					<td><?php if($l->active == '1' ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></td>
					<td><?=$l->min_num?></td>
					<td><a href="<?=site_url('catalog/dailyMeal/edit')?>/<?=$l->id?>" class="btn btn-primary btn-sm">edit</a></td>
				</tr>
				<?php endforeach;?>
		</tbody>
		<?php endif;?>
	</table>
</div>
</div>