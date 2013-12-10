<?php $secret = array('message'=>'okokokok');?>	
<?php if (can('create', 'Admin')): ?>
    <p><?php echo $secret['message']?></p>
	<?php endif ?>
	
