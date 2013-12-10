<!DOCTYPE html>
<html lang="en">
 <title><?=$title?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="<?=base_url()?>../resources/admin/css/style.css" rel="stylesheet">
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
      	        window.location.href="<?=site_url('login')?>";
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
        <span class="label label-success">Success</span> <h4>Congratulations, the new password has been generated.</h4>
       
         <hr class="bs-docs-separator">
        <a class="btn" href="<?=site_url('login')?>">Go to login Page</a> <span id="counter">( 5s )</span>
         <hr class="bs-docs-separator">

      </form>
