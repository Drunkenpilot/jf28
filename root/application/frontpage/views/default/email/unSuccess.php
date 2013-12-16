<script type="text/javascript">
$(document).ready(function(){
	var counter = 5;
	var interval = setInterval(function() {
	    counter--;
	    // Display 'counter' wherever you want to display it.
	    $('#container span').html('( '+counter+'s )');
	    if (counter == 0) {
	        // Display a login box
	        window.location.href="<?=site_url('contact')?>";
	        clearInterval(interval);
	    }
	}, 1000);					
});

</script>


<div class="container">
<div id="container">

<h3>Your email has not been sent</h3>
<h4>Please try later<br><br>
		<a href="<?=site_url('contact')?>"><b>go back</b> <span>( 5s )</span></a></h4>


</div>
</div>