<div class="alert alert-error" >
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?=isset($error_msg)? '<li class="msg">'.$error_msg.'</li>':'';?>
</div>
<div class="alert alert-success" >
 			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?=isset($success_msg)? '<li class="msg">'.$success_msg.'</li>':'';?>
</div>
<legend>Admin - Themes</legend>
<div class="row">
<form role="form" action="" method="post">

<?php foreach ($theme as $key=>$t):?>
<?php if(!is_numeric($key)):?>
<div class="col-sm-6 col-md-3">
<?php if(get_file_info(APPPATH.'views/'.$key.'/quickview.jpg')){?>
    <div class="thumbnail">
      <img src="<?='../'.APPPATH.'views/'.$key.'/quickview.jpg'?>" data-src="holder.js/100%x180" alt="">
      <label class="radio" ><input value="<?=$key?>" type="radio" name="theme" <?php if($theme_active->admin_theme == $key){echo 'checked';}?>> <?=$key?> <?php if($theme_active->admin_theme == $key){?><span class="label label-success">Active</span><?php }?> </label>
      <p>Thumbnail caption...</p>
    </div>

<?php }else{?>

    <div class="thumbnail">
      <img src="<?='../'.APPPATH.'views/default/quickview.jpg'?>" data-src="holder.js/100%x180" alt="">
   	  <label class="radio" ><input value="<?=$key?>" type="radio" name="theme" <?php if($theme_active->admin_theme == $key){echo 'checked';}?>> <?=$key?> <?php if($theme_active->admin_theme == $key){?><span class="label label-success">Active</span><?php }?></label>
      <p>Thumbnail caption...</p>
    </div>

<?php }?>

</div>
<?php endif;?>
<?php endforeach;?>
<div class="clearfix"></div>
 <input type="hidden" name="type" value="admin_theme">
  <button type="submit" class="btn btn-primary">Save changes</button>
  <a class="btn" href="<?=site_url('preference/theme')?>">Cancel</a>

</form>
</div>
<hr class="bs-docs-separator">
<legend>Main- Themes</legend>
<div class="row">
<form role="form" action="" method="post">

<?php foreach ($theme as $key=>$t):?>
<?php if(!is_numeric($key)):?>
<div class="col-sm-6 col-md-3">
<?php if(get_file_info('../application/frontpage/views/'.$key.'/quickview.jpg')){?>

    <div class="thumbnail">
      <img src="<?='../'.APPPATH.'views/'.$key.'/quickview.jpg'?>" data-src="holder.js/100%x180" alt="">
      <label class="radio" ><input value="<?=$key?>" type="radio" name="theme" <?php if($theme_active->main_theme == $key){echo 'checked';}?>> <?=$key?> <?php if($theme_active->main_theme == $key){?><span class="label label-success">Active</span><?php }?> </label>
      <p>Thumbnail caption...</p>
    </div>

<?php }else{?>

    <div class="thumbnail">
      <img src="<?='../'.APPPATH.'views/default/quickview.jpg'?>" data-src="holder.js/100%x180" alt="">
   	  <label class="radio" ><input value="<?=$key?>" type="radio" name="theme" <?php if($theme_active->main_theme == $key){echo 'checked';}?>> <?=$key?> <?php if($theme_active->main_theme == $key){?><span class="label label-success">Active</span><?php }?></label>
      <p>Thumbnail caption...</p>
    </div>
<?php }?>

</div>
<?php endif;?>
<?php endforeach;?>
<div class="clearfix"></div>
<div class="form-actions span6">
 <input type="hidden" name="type" value="main_theme">
  <button type="submit" class="btn btn-primary">Save changes</button>
  <a class="btn" href="<?=site_url('preference/theme')?>">Cancel</a>
</div>
</form>
</div>