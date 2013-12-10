<div class="row row-offcanvas">
	<div class="col-md-3 " >
		<div class="list-group">
					<a href="<?=site_url('catalog/products')?>" class="list-group-item <?php if($this->uri->segment(3) == ''){?>active<?php }?>">All Products</a>
						<?php foreach ($category->children as $cat):?>			
								<a href="<?=site_url('catalog/products')?>/<?=$cat->id?>" class="list-group-item <?php if($cat->id == $this->uri->segment(3)){?>active<?php }?>">  <?=$cat->name?> <small><span>[ Level-<?=$cat->level_depth?> ]</span></small></a>
							
								<?php foreach ($cat->children as $subcat):?>


									<a href="<?=site_url('catalog/products')?>/<?=$subcat->id?>" class="list-group-item <?php if($subcat->id == $this->uri->segment(3)){?>active<?php }?>" > - <?=$subcat->name?> <small>[ Level-<?=$subcat->level_depth?> ]</small></a>
				

									<?php endforeach;?>
						
							<?php endforeach;?>
					
							
			
				</div>
	
	</div>
	
	<div class="col-md-9">
	
	<div class="panel panel-default">

<div class=" panel-heading">Categories</div>
<div class="panel-body">
<?php if($this->uri->segment(3)){?>
<a class="btn btn-primary btn-sm pull-right" href="<?=site_url('catalog/products/addProduct')?>/<?=$this->uri->segment(3)?>"><i class="glyphicon glyphicon-plus"></i> <?=nbs(1)?> Add Product</a>
<?php }?>
</div>
	<div class="table-responsive" >
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Num</th>
				<th>Name</th>
				<th>Category</th>
				<?php if($this->uri->segment(3) !=''){?>
				<th>Position</th>
				<?php }?>
				<th>Price</th>
				<th>Activity</th>
				<th>Actions</th>						
			</tr>
		</thead>
		<tbody>
		<?php  $last_position = count($products);?>
			<?php foreach ($products as $p):?>
			<form actions="" method="post" role="form" class="form-inline" id="position_up_<?=$p->id?>" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$p->id?>">
				<input type="hidden" name="category_id" value="<?=$p->category_id?>">
				<input type="hidden" name="position" value="<?=$p->position?>">
				<input type="hidden" name="action" value="up">
			</form>
			<form actions="" method="post" role="form" class="form-inline" id="position_down_<?=$p->id?>" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$p->id?>">
				<input type="hidden" name="category_id" value="<?=$p->category_id?>">
				<input type="hidden" name="position" value="<?=$p->position?>">
				<input type="hidden" name="action" value="down">
			</form>
			<tr>
				<td><?=$p->product_num?></td>
				<td><?=$p->product_name?></td>
				<td><?=$p->category->name?></td>
				<?php if($this->uri->segment(3) !=''){?>
				<td>
				<button type="button" class="btn btn-primary btn-xs" onclick="position_up(<?=$p->id?>);" <?php if($p->position==1){?>disabled<?php }?>><i class="glyphicon glyphicon-circle-arrow-up"></i></button> 
				<?=$p->position?> 
				<button type="button" class="btn btn-primary btn-xs" onclick="position_down(<?=$p->id?>);" <?php if($last_position == $p->position){?>disabled<?php }?>><i class="glyphicon glyphicon-circle-arrow-down"></i></button>
				</td>
				<?php }?>
				<td><?=number_format($p->product_price,2,'.','')?> €</td>			
				<td><?php if($p->active == '1' ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></td>
				<td>
					<div class="btn-group">
				<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
				Actions <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				<li><a href="<?=site_url('catalog/products/edit')?>/<?=$p->id?>" >edit</a></li>
				<li><a href="<?=site_url('catalog/products/deleteProduct')?>/<?=$p->id?>" >delete</a></li>
				</ul>
					</div>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
		</table>
	
		</div>
</div>
	</div>


</div>