<script type="text/javascript">
<!--

//-->

function send_form(id){
	$('#update_status_'+id).submit();
}
function send_form2(id){
	$('#delivery_shop_'+id).submit();
}
</script>
<div <?php if(isset($result) && $result != NULL){ ?>class="panel panel-success" <?php }else{?>class="panel panel-danger"<?php }?>>
  <!-- Default panel contents -->
  <div class="panel-heading">Communities</div>
  <div class="panel-body">
   <form role="form" class="form-inline" action="<?=site_url('apps/city/searchResult')?>" method="post">
   <div class="col-xs-4">
   <input name="keyword" class="form-control" type="text" value="" placeholder="Code Postal ou Commune">
   </div>
   <button type="submit" class="btn btn-default">Search</button>
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
	
	<table class="table" >
		<thead>
			<tr>
				<th>Post</th>
				<th>Community</th>
				<th>Status</th>
				<th>Limitation</th>
				<th>Delivery</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($result as $com):?>
			<tr <?php if($com->status== null){echo 'class="danger"';}?>>
				<td><?=$com->code?></td>
				<td><?=utf8_encode($com->name)?></td>
				<form actions="" method="post" id="update_status_<?=$com->id?>" enctype="multipart/form-data">
				<td>
				<select name="status" onchange="send_form(<?=$com->id?>)" class="form-control">
						<option value="active"
						<?php if($com->status=='active'){echo 'selected="selected"';}?>>activé</option>
						<option value="null"
						<?php if($com->status==null){echo 'selected="selected"';}?>>désactivé</option>
					</select> <input type="hidden" name="id" value="<?=$com->id?>">
				</td>
				<td>
					<select name="limit_price" onchange="send_form(<?=$com->id?>)" class="form-control">
			<?php for($i=1;$i<60;$i++){?>
			<option value="<?=5*$i?>" <?php if(5*$i==$com->limit_price){echo 'selected="selected"';}?>><?=5*$i?> €</option>
			<?php }?>
			
			</select></td>
				<td>
			<select name="shop_id" onchange="send_form(<?=$com->id?>)" class="form-control">
			<?php foreach ($shop as $s):?>
			<option value="<?=$s->id?>" <?php if($s->id == $com->delivery){ echo 'selected="selected"';}?>><?=$s->shop_name?></option> 
			<?php endforeach;?>
			</select>
				</td>
				</form>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	</div>
		<?php endif;?>
	<?php endif;?>