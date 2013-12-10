<div class="panel panel-default">

	<div class=" panel-heading">Administration</div>
	<div class="panel-body">
		<a href="<?=site_url('preference/administration')?>"
			class="btn btn-warning"><i class="glyphicon glyphicon-arrow-left"></i>
			back to list</a>

	</div>
</div>
<div class="row">
	<form role="form" action="" method="post" name="newAdminForm">
		<div class="col-md-6">
			<div class="panel panel-default">

				<div class=" panel-heading">Informations</div>
				<div class="panel-body">
					<div class="form-group">
						<label>First Name</label> <input class="form-control" type="text"
							name=" firstname" value="<?php echo set_value('firstname'); ?>" required focus>
					</div>

					<div class="form-group">
						<label>Last Name</label> <input class="form-control" type="text"
							name=" lastname" value="<?php echo set_value('lastname'); ?>" required focus>
					</div>
					<div class="form-group">
						<label>Email</label> <input class="form-control" type="text"
							name="email" value="<?php echo set_value('email'); ?>" required focus>
							<?php echo form_error('email','<span class="label label-warning">', '</span>'); ?>
					</div>
					<div class="form-group" >
						<label>Status</label> 
						<select class="form-control" name="active">
							<option value="1">Active</option>
							<option value="0">Blocked</option>
						</select>
					</div>
					<div class="form-group">
						<label>Group</label> <select class="form-control" name="role">
							<option>administrator</option>
							<option>editor</option>
							<option>seller</option>
						</select>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-6">
			<div class="panel panel-default">

				<div class=" panel-heading">Informations</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Password</label> <input class="form-control"
							type="password" value="" name="password" placeholder="Password"
							required focus>
							<?php echo form_error('password','<span class="label label-warning">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Confirm Password</label> <input class="form-control"
							type="password" value="" name="passconf"
							placeholder="Confirm Password" required focus>
							<?php echo form_error('passconf','<span class="label label-warning">', '</span>'); ?>
					</div>
					<button class="btn btn-primary pull-right" type="submit">
						<i class="glyphicon glyphicon-floppy-save"></i> Create
					</button>
				</div>
			</div>
		</div>
	</form>

</div>
