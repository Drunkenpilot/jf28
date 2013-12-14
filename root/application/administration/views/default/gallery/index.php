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
 <div class="col-sm-3 col-md-2">
    <div class="thumbnail">
     
      <a class="thumbnail" href="<?=base_url()?>../uploads/large/<?=$p->filename_l?>" title="<?=$p->filename_l?>" download="<?=$p->filename_l?>" data-gallery="" >
       <img src="<?=base_url()?>../uploads/thumbs/<?=$p->filename_s?>" alt="..." >
		</a>
      <div class="caption">
        <p>
        <a href="#" class="btn btn-primary btn-xs" role="button"><i class="glyphicon glyphicon-pencil"></i></a> 
        <a href="#" class="btn btn-danger btn-xs" role="button"><i class="glyphicon glyphicon-trash"></i></a>

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

</div>	

 <!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even" style="display:none;">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>