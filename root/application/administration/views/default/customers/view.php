<div class="panel panel-default">
	<div class="panel-body">
		<a href="<?=site_url('customers/customers/edit')?>/<?=$customer->id?>" class="btn btn-primary ">Edit</a>
		<a href="<?=site_url('customers/customers')?>" class="btn btn-default pull-right">Go Back</a>
	</div>

</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Customer's profile</div>
			<div class="panel-body">
				Customer's name :
				<?=$customer->firstname?> <?=$customer->lastname?>
				<br><br>
				Email : <?=$customer->email?>
				<br>
				Telephone : <?=$customer->tel?>
				<hr> Registration: <?=$customer->registration?>
				<br> Last visit:<?=$customer->lastactivity?>
			</div>

		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Account's activity</div>
			<div class="panel-body">
				Account Status :
				<?php if($customer->status == 'active' ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?>
				<hr> 
				Newsletter:
				<?php if($customer->newsletter == 1 ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?>
	
			</div>

		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Delivery address</div>
			<div class="panel-body">
			
			<?php if($address):?>
			<?php foreach($address as $a):?>
				<ul class="list-group">
				<li class="list-group-item">First Name : <?=$a->firstname?></li>
				<li class="list-group-item">Last Name : <?=$a->lastname?></li>
				<li class="list-group-item">Company : <?=$a->company?></li>
				<li class="list-group-item">Doorbell : <?=$a->ring?></li>
				<li class="list-group-item">Address : <?=$a->address?></li>
				<li class="list-group-item">City : <?=$a->postal?> <?=$a->community?></li>
				<li class="list-group-item">Telephone : <?=$a->tele?></li>
				</ul>
				<?php endforeach;?>
			<?php endif;?>
			
			</div>

		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">Orders</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
							<th>order num</th>
							<th>order time</th>
							<th>discount</th>
							<th>total</th>
							<th>view</th>
							</tr>
						</thead>
				<?php if($order):?>
					<?php foreach ($order as $o):?>
						<tbody>
							<tr>
								<td><?=$o->order_num?></td>
								<td><?=$o->order_time->format('d-M-y h:i:s')?></td>
								<td><?=$o->discount*100?> %</td>
								<td><?=number_format($o->total,'2','.','')?> €</td>
								<td><a class="btn btn-primary btn-xs" href="<?=site_url('orders/orders/orderDetails')?>/<?=$o->order_num?>">view</a></td>
							</tr>
						</tbody>
						
					<?php endforeach;?>
				<?php endif;?>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

