
<div class="panel panel-default">

<div class=" panel-heading">Gallery</div>
<div class="panel-body">
<a class="btn btn-primary btn-sm" href="<?=site_url('gallery/upload')?>"><i class="glyphicon glyphicon-plus-sign"></i> <?=nbs(1)?> new photo</a>
</div>
</div>

<div class="row">
	<?php if(!$photos){?>
	<div class="col-lg-12">
	There is no photo...
	</div>
	<?php }else{?>
	<?php foreach ($photos as $p):?>
 <div class="post-box col-xs-12 col-sm-6 col-md-2 item_<?=$p->id?>">
    <div class="thumbnail">
     
      <a class="thumbnail" href="<?=base_url()?>../uploads/large/<?=$p->filename_l?>" title="<?=$p->filename_l?>"  data-gallery="" >
       <img src="<?=base_url()?>../uploads/thumbs/<?=$p->filename_s?>" alt="..." >
		</a>
      <div class="caption">
      <p><?php if($p->active==1){?><span class="label label-success">active</span><?php }else{?><span class="label label-danger">disabled</span><?php }?></p>
        <p>
        <a href="<?=site_url()?>gallery/gallery/edit/<?=$p->id?>" class="btn btn-primary btn-xs" role="button"><i class="glyphicon glyphicon-pencil"></i></a> 
        <button type="button" class="btn btn-danger btn-xs" role="button" onclick="deleteItem(<?=$p->id?>,'<?=$p->filename_s?>')"><i class="glyphicon glyphicon-trash"></i></button>
         |
         <button type="button" class="btn btn-primary btn-xs" onclick="position_up(<?=$p->id?>);" <?php if($p->position==1){?>disabled<?php }?>><i class="glyphicon glyphicon-circle-arrow-up"></i></button> 
				<?=$p->position?> 
		<button type="button" class="btn btn-primary btn-xs" onclick="position_down(<?=$p->id?>);" <?php if($lastPosition == $p->position){?>disabled<?php }?>><i class="glyphicon glyphicon-circle-arrow-down"></i></button>	
        </p>
        <form actions="" method="post" role="form" class="form-inline" id="position_up_<?=$p->id?>" enctype="multipart/form-data">			
				<input type="hidden" name="id" value="<?=$p->id?>">
				<input type="hidden" name="position" value="<?=$p->position?>">
				<input type="hidden" name="action" value="up">
			</form>
			<form actions="" method="post" role="form" class="form-inline" id="position_down_<?=$p->id?>" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$p->id?>">
				<input type="hidden" name="position" value="<?=$p->position?>">
				<input type="hidden" name="action" value="down">
			</form>
      </div>
    </div>
  </div>
	<?php endforeach;?>
	<?php }?>
	<div class="clearfix"></div>
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
<div id="deleteItem" class="modal fade " tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">×</button>
					<h4 id="myModalLabel">Action:</h4>
				</div>
				<div class="modal-body">Would you like to delete this photo ?</div>
				<div class="modal-footer">
					
					
				</div>
			</div>
		</div>
	</div>
	
