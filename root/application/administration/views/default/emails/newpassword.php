<!DOCTYPE html>
<html lang="en">
 <title>Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="../resources/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
     <link href="<?=APPPATH?>views/default/resources/css/style.css" rel="stylesheet">
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
      <script src="../resources/bootstrap/js/bootstrap-collapse.js"></script>
      <script src="../resources/bootstrap/js/holder/holder.js"></script>
     
  </head>
	<body>
	<h4>Asia-Express</h4>
	<div class="container">
	<p>Hello <b><?=$this_admin->firstname?> <?=$this_admin->lastname?></b></p>
	<p>You recently requested a new password.<br><br>
	<a class="btn" href="<?=site_url('set_newpwd?key=').$this_admin->key_set?>" target="_blank">Generate a new password</a></p>
	<p> </p>
	</div>
	</body>
</html>
