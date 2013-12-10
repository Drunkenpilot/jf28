<!DOCTYPE html>
<html lang="en">
 <title><?=$title?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="<?=base_url()?>../resources/bootstrap/css/sticky-footer.css" rel="stylesheet">
     <link href="<?=base_url()?>../resources/admin/css/auth_reset.css" rel="stylesheet">
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="../resources/bootstrap/js/bootstrap.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){
      	var counter = 5;
      	var interval = setInterval(function() {
      	    counter--;
      	    // Display 'counter' wherever you want to display it.
      	    $('#counter').html('( '+counter+'s )');
      	    if (counter == 0) {
      	        // Display a login box
      	        window.location.href="<?=site_url('forgot_password')?>";
      	        clearInterval(interval);
      	    }
      	}, 1000);					
      });

      </script>
      
  </head>

</html>

<div id="wrap">
<div class="container">

 <form class="form-signin" action="" method="post">
        <span class="label label-warning">Attention</span> <h4>There is an error during setting your new password, please try it again</h4>
       
         <hr class="bs-docs-separator">
        <a class="btn" href="<?=site_url('forgot_password')?>">Re-generate the password</a> <span id="counter">( 5s )</span>
         <hr class="bs-docs-separator">

        
      </form>
