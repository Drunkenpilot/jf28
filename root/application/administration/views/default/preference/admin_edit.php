 <div class="panel panel-default">

	<div class=" panel-heading">Administration</div>
	<div class="panel-body">
	<?php if(isset($msg)):?>
	<?php if($msg){?>
		<div class="alert alert-success"><?=$msg?>
		</div>
		<?php }?>		
			<?php endif;?>
		<a href="<?=site_url('preference/administration')?>"
			class="btn btn-warning"><i class="glyphicon glyphicon-arrow-left"></i>
			back to list</a>
	
	</div>
	</div>
<div class="row ">
 <div class="col-lg-4">
  <form  role="form" action="" method="post">
  <div class="panel panel-default">

	<div class=" panel-heading">Administration</div>
	<div class="panel-body">
 <div class="form-group">
<label>Status: <?php if($admin->status == 1 ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></label> 
     <select class="form-control" name="active" <?php if($this->admin->role !='administrator'){?>disabled<?php }?>>
     <option value="1" <?php if($admin->status == 1){?>selected="selected"<?php }?>>Active</option>
     <option value="0" <?php if($admin->status == 0){?>selected="selected"<?php }?>>Blocked</option>
     </select>

</div>
 <div class="form-group">
<label>Group</label> 

     <select class="form-control" name="role" <?php if($this->admin->role !='administrator'){?>disabled<?php }?>>
     <option <?php if($admin->role == 'administrator'){?>selected="selected"<?php }?>>administrator</option>
     <option <?php if($admin->role == 'editor'){?>selected="selected"<?php }?>>editor</option>
     <option <?php if($admin->role == 'seller'){?>selected="selected"<?php }?>>seller</option>
     </select>
</div>
 <div class="form-group">
<label>E-Mail</label> 
<input disabled class="form-control" type="email" value="<?=$admin->email?>" name="email" placeholder="Email">
</div>
<div class="form-group">
<label>First Name</label> 
<input name="firstname" class="form-control" type="text" value="<?=$admin->firstname?>" placeholder="First Name" required focus <?php if($this->admin->role !='administrator'){?>disabled<?php }?>>
</div>
 <div class="form-group">
<label>Last Name</label> 
<input class="form-control" type="text" value="<?=$admin->lastname?>" name="lastname"  placeholder="Last Name" required focus <?php if($this->admin->role !='administrator'){?>disabled<?php }?>>
</div>
<input type="hidden" name="update_id" value="1">
  <button type="submit" class="btn btn-primary pull-right" <?php if($this->admin->role !='administrator'){?>disabled<?php }?>>Save changes</button>

</div>
</div>
</form>  
  </div>


<div class="col-lg-4">
<form role="form" action="" method="post">
  <div class="panel panel-default">

	<div class=" panel-heading">Administration</div>
	<div class="panel-body">
 <div class="form-group">
<label>New Password</label> 
<input class="form-control" type="password" value="" name="password" placeholder="Password">
<?php echo form_error('password','<span class="label label-warning">', '</span>'); ?>
</div>

 <div class="form-group">
<label>Confirm New Password</label> 
<input class="form-control" type="password" value="" name="passconf" placeholder="Confirm Password">
<?php echo form_error('passconf','<span class="label label-warning">', '</span>'); ?>
</div>
<input type="hidden" name="update_id" value="2">
<button type="submit" class="btn btn-primary pull-right">Save changes</button>

</form>
</div>
</div>
</div>
 
</div>
