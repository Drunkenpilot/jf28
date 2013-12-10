<!DOCTYPE html>
<html lang="en">
<title><?=$title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../resources/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" media="screen">
<link href="<?=base_url()?>../resources/bootstrap/css/sticky-footer.css"
	rel="stylesheet">
<link href="<?=base_url()?>../resources/admin/css/auth_reset.css"
	rel="stylesheet">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="../resources/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(function(){
		
	
		if($('.alert .error').text()==''){
				$('.alert').css('display','none');
			}
})

</script>


</head>

</html>

<div id="wrap">
<div class="container">

 <form class="form-signin" action="" method="post">
        <h4 class="form-signin-heading"><i class="glyphicon glyphicon-envelope"></i> Please enter your e-mail address</h4>
        <input type="text" class="form-control" placeholder="Email address" name="email" value="<?=set_value('email')?>" required autofocus>
      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
        <hr class="bs-docs-separator">
        <a class="btn" href="<?=site_url('login')?>">Go to login page</a>
         <hr class="bs-docs-separator">
        <div class="alert alert-danger">
       
<button type="button" class="close" data-dismiss="alert" >&times;</button>
<?=form_error('email', '<li class="error">', '</li>'); ?>
<?=form_error('password', '<li class="error">', '</li>'); ?>
<?=isset($error_msg)? '<li class="error">'.$error_msg.'</li>':'';?>
</div>
        
      </form>

