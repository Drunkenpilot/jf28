<div <?php if(isset($result) && $result != NULL){ ?>class="panel panel-success" <?php }else{?>class="panel panel-danger"<?php }?>>
	<div class="panel-heading">Customers</div>
	<div class="panel-body">
		<form class="form-inline" role="form" action="<?=site_url('customers/customers/searchResult')?>" method="post">
			<div class="form-group">
			<input type="text" class="form-control input-sm" name="firstname" value="" placeholder="First Name">
			</div>
			<div class="form-group">
			<input type="text" class="form-control input-sm" name="lastname" value="" placeholder="Last Name">
			</div>
			<div class="form-group">
			<input type="text" class="form-control input-sm" name="email" value="" placeholder="email">
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Search</button>
		</form>
		<?php if(!isset($result) || $result == NULL):?>
 		 <hr>
  		 <div class="alert alert-danger">There is no result for this search..</div>
		 <?php endif;?>
	</div>

</div>

<?php if(isset($result)):?>
<?php if($result != null):?>
	<div class="table-responsive">
	
		<table class="table">
		
			<thead>
			<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>News.</th>
			<th>Registration</th>
			<th>Last Visit</th>
			<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($result as $c):?>
			<tr>
			<td><?=$c->id?></td>
			<td><?=$c->firstname?></td>
			<td><?=$c->lastname?></td>
			<td><?=$c->email?></td>
			<td><?php if($c->status == 'active' ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></td>
			<td><?php if($c->newsletter == 1 ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
			<div class="btn-group">
				<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
				Actions<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				<li><a href="<?=site_url('customers/customers/view')?>/<?=$c->id?>" >view</a></li>
				<li><a href="<?=site_url('customers/customers/edit')?>/<?=$c->id?>" >Edit</a></li>
				
				</ul>
			
			</div>
			
			</td>
			</tr>
			<?php endforeach;?>
			
			</tbody>
		
		</table>
	
	</div>

<?php endif;?>
<?php endif;?>