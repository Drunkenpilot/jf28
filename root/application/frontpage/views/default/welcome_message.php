<!-- .main -->
<div class="main" >
<?php if($photo):?>
	<div class="Collage effect-parent hidden-xs">	
		<?php foreach ($photo as $p):?>
	<div class="Image_Wrapper" data-caption="<?php if($p->client){ echo 'Client: '.$p->client.'<br>';}?><?php if($p->description){echo 'Work: '.$p->description.'<br>';}?><?php if($p->year){echo 'Year: '.date('Y',strtotime($p->year));}?>">	
		  <a href="<?=base_url()?>uploads/large/<?=$p->filename_l?>" title=""  data-gallery="" >
		<img src="<?=base_url()?>/uploads/thumbs/<?=$p->filename_s?>" width="<?=$p->thumb_width?>" height="<?=$p->thumb_height?>">
		</a>
	</div>
		<?php endforeach;?>	
	</div>
	
	<div class="Collage_sm effect-parent visible-xs">	
		<?php foreach ($photo as $p):?>
	<div class="Image_Wrapper_sm" data-caption="<?php if($p->client){ echo 'Client: '.$p->client.'<br>';}?><?php if($p->description){echo 'Work: '.$p->description.'<br>';}?><?php if($p->year){echo 'Year: '.date('Y',strtotime($p->year));}?>">	
		  <a href="<?=base_url()?>uploads/medium/<?=$p->filename_m?>" title=""  data-gallery="" >
		<img src="<?=base_url()?>/uploads/thumbs/<?=$p->filename_s?>" width="<?=$p->thumb_width?>" height="<?=$p->thumb_height?>">
		</a>
	</div>
		<?php endforeach;?>	
	</div>

<?php endif;?>

<!-- /.main -->
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