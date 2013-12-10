<div class="panel panel-default">
	<div class="panel-body">
	Shop
	</div>

</div>

<div class="table-responsive">

	<table class="table">
	
		<thead>
		<tr>
		<th>City</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>SMS Number</th>
		<th>Status</th>
		<th>Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($shop as $s):?>
		<tr>
		<td><?=$s->shop_name?></td>
		<td><?=$s->address?></td>
		<td><?=$s->tele?></td>
		<td><?=$s->sms?></td>
		<td><?php if($s->status == 1 ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-important">Blocked</span><?php }?></td>
		<td>
			<div class="btn-group">
			<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
			Action 
			<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
			<li><a href="">Edit</a></li>
			</ul>
			</div>
		</td>
		</tr>
		<?php endforeach;?>
		</tbody>
	
	</table>




</div>