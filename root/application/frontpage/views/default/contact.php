<script type="text/javascript">

$(document).ready(function(){

	$('form').validate({
	    rules: {
	        name: {          
	            required: true
	        },
	        email: {	            
	            required: true,
	            email: true
	        },
	        telephone: {          
	            required: true,
	            number: true
	        }
	    },
	    highlight: function(element) {
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-error');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block text-left',
	    errorPlacement: function(error, element) {
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});
		

});

</script>

<!-- .main -->
<div class="main container">
<div class="row contact">
	<!-- .contact -->
	<div class="col-md-3 col-md-offset-3 col-sm-6 text-left">
		<h4>Contact Information</h4>
		<hr>
		<p>JF28 sprl</p>
		<p>Rue Marconi 123</p>
		<p>1190 Brussels</p>
		<p><i class="glyphicon glyphicon-phone-alt"></i> +32 (0) 218 27 02</p>
		<p><i class="glyphicon glyphicon-phone"></i> +32 (0) 475 82 33 50</p>
		<p><i class="glyphicon glyphicon-envelope"></i><?=nbs(1)?> <a href="mailto:jf28@jf28.com">jf28@jf28.com</a></p>
			<hr>
	</div>

	<div class="col-md-3 col-sm-6 text-left">
		<h4>Information Request</h4>
		<hr>
		<form role="form" action="<?=site_url()?>contact/sendEMail" method="post">
			<div class="form-group">
				<label>Your Name</label>
				<input class="form-control" type="text" name="name" value="" >
			</div>
			<div class="form-group">
				<label>Phone <small><span class="label label-default">e.g.</span> 0032123456789</small></label>
				<input class="form-control" type="text" name="telephone" value="" >
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="text" name="email" value="" >
			</div>
			<div class="form-group">
				<label>Message</label>
				<textarea rows="6" cols="1" name="message" class="form-control"></textarea>
			</div>
			<button type="submit" class="btn btn-primary btn-sm pull-right">Send</button>
		</form>
	</div>
</div>
	<!-- /.contact -->

</div>
<!-- /.,ain -->