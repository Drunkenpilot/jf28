
<div class="panel panel-default">

<div class=" panel-heading">Gallery | edit</div>
<div class="panel-body">
<a class="btn btn-warning btn-sm pull-right" href="<?=site_url('gallery')?>"><i class="glyphicon glyphicon-arrow-left"></i> <?=nbs(1)?> back to list</a>
</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
		<div class=" panel-heading">Thumb</div>
		<div class="panel-body">
		
			<a class="thumbnail" href="<?=base_url()?>../uploads/large/<?=$photo->filename_l?>" title="<?=$photo->filename_l?>"  data-gallery="" >
				<img src="<?=base_url()?>../uploads/thumbs/<?=$photo->filename_s?>">
			</a>
			<p class="text-center"><b><?=$photo->filename_l?></b></p>
		</div>
		</div>
		<!-- The blueimp Gallery widget -->
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" >
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
	</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
		<div class=" panel-heading">Description</div>
		<div class="panel-body">
		<?php if(isset($msg)):?>
	<?php if($msg['result']){?>
		<div class="alert alert-success msgResult"><?=$msg['msg']?> <span></span></div>
		<?php }else{?>
		<div class="alert alert-danger msgResult"><?=$msg['msg']?> <span></span></div>
		<?php }?>		
			<?php endif;?>
			<form action="" method="post" role="form">
				<div class="form-group">
					<label>Activity <?php if($photo->active==1){?><span class="label label-success">active</span><?php }else{?><span class="label label-danger">disabled</span><?php }?></label>
					<select	name="active" class="form-control">
						<option value="1" <?php if($photo->active==1){?>selected="selected"<?php }?>>Active</option>
						<option value="0" <?php if($photo->active==0){?>selected="selected"<?php }?>>Disabled</option>
					</select>
				</div>
				<hr>
				<div class="form-group">
					<label>Client</label>
					<input class="form-control" type="text" name="client" value="<?=$photo->client?>" >
				</div>			
				<div class="form-group">
				<label>Year</label>
					<div class="input-group" >
  						<span class="input-group-btn add-on"   > 
 					    <button class="btn btn-default " type="button" ><i class="glyphicon glyphicon-calendar"></i></button>
  						</span>
  						<input class="form-control span2" size="16" type="text"  id="year"  value="<?php if($photo->year){ echo date('Y',strtotime($photo->year)); }?>" name="year" >
  						<span class="input-group-btn add-on"> 
  						<button class="btn btn-danger " type="button" onclick="clearDate()"><i class="glyphicon glyphicon-remove"></i></button>
  						</span>
					</div>
				</div>	
				
				<div class="form-group">
					<label>Description of work</label>
					<input class="form-control" type="text" name="description" value="<?=$photo->description?>">
					
				</div>
				<hr>
				<button type="submit" class="btn btn-primary pull-right">Save</button>
			
			</form>
			
		</div>
		</div>
	
	</div>
</div>