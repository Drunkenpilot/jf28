<div class="panel panel-default">
	<div class="panel-heading">Customers - edit</div>
	
	<div class="panel-body">
		<?=$customer->firstname?> <?=$customer->lastname?> <small>( <?=$customer->email?> )</small>
	<?php if(isset($msg_success) || isset($msg_error)):?>
	<?php if($msg_success){?>
		<div class="alert alert-success"><?=$msg_success?>
		</div>
		<?php }elseif($msg_error){?>
		<div class="alert alert-danger"><?=$msg_error?></div>
		<?php }?>
			<?php endif;?>
	</div>

</div>
	
<div class="row">
	<div class="col-md-6">
		<form role="form" action="" method="post" >
		<div class="form-group">
		<label>First name:</label>
		<input class="form-control" type="text" name="firstname" value="<?=$customer->firstname?>" placeholder="First Name">
		</div>
		<div class="form-group">
		<label>Last name:</label>
		<input class="form-control" type="text" name="lastname" value="<?=$customer->lastname?>" placeholder="Last Name">
		</div>
		<div class="form-group">
		<label>Account's activity: <?php if($customer->status == 'active' ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></label>
		<select class="form-control" name="status">
			<option <?php if($customer->status == 'active'){?>selected="selected"<?php }?> value="active">Activé</option>
			<option <?php if($customer->status == NULL){?>selected="selected"<?php }?> value="null">Désactivé</option>
		</select>
		</div>
		<div class="form-group">
		<label>Newsletter: <?php if($customer->newsletter == 1 ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></label>
		<select class="form-control" name="newsletter">
			<option <?php if($customer->newsletter == 1){?>selected="selected"<?php }?> value="1">Activé</option>
			<option <?php if($customer->newsletter == NULL){?>selected="selected"<?php }?> value="null">Désactivé</option>
		</select>
		</div>
		<button type="submit" class="btn btn-primary ">Update</button>
		<a href="<?=site_url('customers/customers/view')?>/<?=$customer->id?>" class="btn btn-default pull-right">Cancel</a>
		</form>
	</div>
</div>