<div class="panel panel-default">

<div class=" panel-heading">Administration</div>
<div class="panel-body">
<a href="<?=site_url('preference/administration/addNewAdmin')?>" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus-sign"></i> add adminitrator</a>
</div>
<div class="table-responsive">
<table class="table ">

  <thead>
    <tr>
      
      <th>First Name</th>
      <th>Last Name</th>
      <th>E-mail</th>
      <th>Authority</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($admins as $a):?>
    <tr>
     
      <td><?=$a->firstname?></td>
      <td><?=$a->lastname?></td>
      <td><?=$a->email?></td>
      <td><?=$a->role?></td>
      <td><?php if($a->status == 1 ){?><span class="label label-success">Active</span><?php }else{?><span class="label label-danger">Blocked</span><?php }?></td>
      <td><div class="btn-group">
  	<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
  	Actions 
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?=site_url('preference/administration/edit/'.$a->id)?>"><i class="icon-pencil"></i> Edit</a></li>
    
  </ul>
</div></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>
<div class="alert alert-error">
			
			<?=isset($error_msg)? $error_msg:'';?>
		</div>
		
</div>