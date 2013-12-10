<div class="panel panel-default">

	<div class=" panel-heading">Order's details</div>
	<?php if($order){?>
	<div class="panel-body">
	<div class="col-md-12">
	<form action="<?=site_url('orders/orders/printTicket')?>" role="form" method="post" name="printTicket">
		<input type="hidden" name="order_num" value="<?=$order->order_num?>">
		<input type="hidden" name="current_url" value="<?=current_url()?>">
	</form>
	<a href="<?=site_url('orders/orders')?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-arrow-left"></i> back to list</a>
	| <a href="<?=site_url('customers/customers/view')?>/<?=$order->member->id?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Customer's profile</a>
	| <button class="btn btn-sm btn-success" type="button" onclick="print()"><i class="glyphicon glyphicon-print"></i> Print ticket</button>
	</div>
	<div class="clearfix"></div>
	<hr>
		<div class="col-md-4">
		<p><span class="label label-default">Order number</span> <?=$order->order_num?></p>
		<p><span class="label label-default">Order type</span> <?php if($order->order_type=='take away'){?><i class="icon-shopping-bag"></i> Emporter à <?=$order->takeaway_time?><?php }else{?><i class="icon-car"></i> Livraison à <?=$order->delivery_time?><?php }?></p>
		<p><span class="label label-default">Shop</span> <?=$order->shop->shop_name?></p>
		</div>
		<div class="col-md-4">
			<p><i class="icon-nameplate"></i> Customer: <?=$order->member->firstname?> <?=$order->member->lastname?></p>
			<p><i class="icon-iphone"></i> Telephone: <?=$order->member->tel?></p>
			<p><i class="glyphicon glyphicon-envelope"></i> Email: <?=$order->member->email?></p>
			<p><i class="glyphicon glyphicon-info-sign"></i> Message: <?=$order->message?></p>				
		</div>
		<?php if($order->order_type=='delivery'){?>
		<div class="col-md-4">
			<p><i class="glyphicon glyphicon-tower"></i> City: <?=$order->deliveryaddress->postal?> <?=$order->deliveryaddress->community?></p>
			<p><i class="icon-road"></i> Address: <?=$order->deliveryaddress->address?> </p>
			<p><i class="icon-building"></i> Company: <?=$order->deliveryaddress->company?></p>
			<p><i class="icon-bell"></i> Door bell: <?=$order->deliveryaddress->ring?></p>
			<p><i class="icon-iphone"></i> Telephone: <?=$order->deliveryaddress->tele?></p>
		</div>
		<?php }?>
	</div>

	<div class="table-responsive" >
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Num</th>
				<th>Product</th>
				<th>Price</th>
				<th>QTY</th>
				<th>Tax</th>
				<th>SubTotal</th>						
			</tr>
		</thead>
		<?php if($orderItem):?>
		<tbody>
			<?php foreach ($orderItem as $item ):?>
				<tr>
					<td><?=$item->product_num?></td>
					<td><?=$item->product_name?></td>
					<td><?=number_format($item->product_price,2,'.','')?> €</td>
					<td><?=$item->qty?></td>
					<td><?=$item->taxgroup->value*100?> %</td>
					<td><?=number_format($item->qty*$item->product_price,2,'.','')?> €</td>
				</tr>
			<?php endforeach;?>
				<tr>
					<td><h4>Total: <?=number_format($order->total*(1-$order->discount),2,'.','')?> €</h4></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
		</tbody>
		<?php endif;?>
	</table>
	</div>
	<?php }else{?>
	<div class="panel-body">
		<h4>There is no such order..</h4> <a href="<?=site_url('orders/orders')?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> back to list</a>
	</div>
	<?php }?>
	


</div>
