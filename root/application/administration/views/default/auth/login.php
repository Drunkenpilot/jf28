<!DOCTYPE html>
<html lang="en">
<title><?=$title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="<?=base_url()?>../resources/bootstrap/css/sticky-footer.css" rel="stylesheet">
<link href="<?=base_url()?>../resources/admin/css/auth_reset.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="../resources/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>../resources/bootstrap/js/jquery.placeholder.js"></script>

<script type="text/javascript">
$(function(){
		
	
		if($('.alert .error').text()==''){
				$('.alert').css('display','none');
			}
		$('input, textarea').placeholder();
})

</script>


</head>


<div id="wrap">
	<div class="container">

		<form class="form-signin" action="" method="post">
			<h4 class="form-signin-heading"><i class="glyphicon glyphicon-log-in"></i> &nbsp;my login</h4>
			<input type="text" class="form-control" placeholder="Email address"
				name="email" value="<?=set_value('email')?>" required autofocus> <input
				type="password" class="form-control" placeholder="Password"
				name="password" value="<?=set_value('password')?>" required
				autofocus> 
				<!-- 
				<label class="checkbox"> 
				<input type="checkbox" value="remember-me" name="remember-me"> Remember me 
				</label>
				 -->
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign
				in</button>
			<hr>
			<a class="btn" href="<?=site_url('forgot_password')?>"><i class="glyphicon glyphicon-question-sign"></i> Forgot my
				password.</a>
			<hr class="bs-docs-separator">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?=form_error('email', '<li class="error">', '</li>'); ?>
				<?=form_error('password', '<li class="error">', '</li>'); ?>
				<?=isset($error_msg)? '<li class="error">'.$error_msg.'</li>':'';?>
			</div>

		</form>