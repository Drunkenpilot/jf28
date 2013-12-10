<div class="panel panel-default">

<div class=" panel-heading">Orders</div>
<div class="panel-body">

<div class="col-md-4 ">
<h4>Date: <?=date('d-m-Y')?></h4>
</div>
<div class="col-md-4 ">
<form action="<?=site_url('orders/orders/searchResult')?>" role="form" method="post">
<div class="input-group date" data-date="<?=date('Y-m')?>" data-date-format="yyyy-mm" data-date-viewmode="years" data-date-minviewmode="months">
  <span class="input-group-btn add-on"> 
  <button class="btn btn-default " type="button"><i class="glyphicon glyphicon-calendar"></i></button>
  </span>
  <input class="form-control span2" size="16" type="text" value="<?=date('Y-m')?>" name="date"  readonly>

  <span class="input-group-btn">
  <button type="sumbit" class="btn btn-primary">Search by month</button>
  </span>
</div>
</form>
</div>
<div class="col-md-4">
<form action="<?=site_url('orders/orders/searchResult')?>" role="form" method="post">
<div class="input-group date" id="date" data-date="<?=date('Y-m-d')?>" data-date-format="yyyy-mm-dd">
  <span class="input-group-btn add-on"> 
  <button class="btn btn-default " type="button"><i class="glyphicon glyphicon-calendar"></i></button>
  </span>
  <input class="form-control span2" size="16" type="text" value="<?=date('Y-m-d')?>" name="date"  readonly>

  <span class="input-group-btn">
  <button type="submit" class="btn btn-primary">Search by day</button>
  </span>
</div>
</form>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
Orders: <?=count($orders)?> | Total: <?=number_format($total,2,'.','')?> € 
</div>

</div>


	<div class="table-responsive" >
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Order num</th>
				<th>Custormer</th>
				<th>Order time</th>
				<th>Order type : <i class="icon-shopping-bag"></i> | <i class="icon-car"></i></th>
				<th>Discount</th>
				<th>Total</th>
				<th>Shop</th>
				<th>Actions</th>						
			</tr>
		
		</thead>
		
		<tbody>
		<?php if($orders){?>
			<?php foreach ($orders as $o):?>
			<?php if($o->shop_id == 1){?>
			<tr class="active">
				<td><?=$o->order_num?></td>
				<td><?=$o->member->firstname?> <?=$o->member->lastname?></td>
				<td><small><?=date('d-M-Y H:i',strtotime($o->order_time))?></small></td>
				<td><?php if($o->order_type=='take away'){?><i class="icon-shopping-bag"></i> Emporter à <?=$o->takeaway_time?><?php }else{?><i class="icon-car"></i> Livraison à <?=$o->delivery_time?><?php }?></td>
				<td><?php if($o->discount){?><?=$o->discount*100?> %<?php }else{?>----<?php }?></td>
				<td ><?=number_format($o->total,2,'.','')?> €</td>
				<td><?=$o->shop->shop_name?></td>
				<td><a href="<?=site_url('orders/orders/orderDetails')?>/<?=$o->order_num?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i> view</a></td>
			</tr>
			<?php }elseif($o->shop_id == 2){?>
			<tr class="warning">
				<td><?=$o->order_num?></td>
				<td><?=$o->member->firstname?> <?=$o->member->lastname?></td>
				<td><small><?=date('d-M-Y H:i',strtotime($o->order_time))?></small></td>
				<td><?php if($o->order_type=='take away'){?><i class="icon-shopping-bag"></i> Emporter à <?=$o->takeaway_time?><?php }else{?><i class="icon-car"></i> Livraison à <?=$o->delivery_time?><?php }?></td>
				<td><?php if($o->discount){?><?=$o->discount*100?> %<?php }else{?>----<?php }?></td>
				<td ><?=number_format($o->total,2,'.','')?> €</td>
				<td><?=$o->shop->shop_name?></td>
				<td><a href="<?=site_url('orders/orders/orderDetails')?>/<?=$o->order_num?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i> view</a></td>
			</tr>
			<?php }?>
			<?php endforeach;?>
		
		<?php }else{?>
			<tr><td><h5>There is no order...</h5></td></tr>
		<?php }?>
		</tbody>
	</table>
	</div>

</div>
