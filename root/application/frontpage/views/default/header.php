<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?=$title?></title>
    <!--[if lt IE 9]>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <![endif]-->
    <!--[if (gte IE 9) | (!IE)]><!-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


	
	<script src="<?=base_url()?>resources/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>resources/bootstrap/js/jquery.validate.min.js"></script>
    <script src="<?=base_url()?>resources/frontpage/tools/collageplus/jquery.collagePlus.js"></script>
    <script src="<?=base_url()?>resources/frontpage/tools/collageplus/extras/jquery.removeWhitespace.js"></script>
    <script src="<?=base_url()?>resources/frontpage/tools/collageplus/extras/jquery.collageCaption.js"></script>
    <script src="<?=base_url()?>resources/upload/js/jquery.blueimp-gallery.min.js"></script>  
    <script src="<?=base_url()?>resources/frontpage/js/tools.js"></script> 
	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/bootstrap/css/bootstrap.css" >
	<link href="<?=base_url()?>resources/bootstrap/css/sticky-footer.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/frontpage/tools/collageplus/css/transitions.css" media="all" /> 
	<link rel="stylesheet" href="<?=base_url()?>resources/upload/css/blueimp-gallery.css">
	<link rel="stylesheet" href="<?=base_url()?>resources/frontpage/css/reset.css" type="text/css">

</head>
<body>
	<div id="wrap">
	    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=site_url()?>">JEAN-FRANÇOIS DE WITTE</a>
        </div>
        <div class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
           <li <?php if($this->uri->segment(1)==''){?>class="active"<?php }?>><a href="<?=site_url()?>">works</a></li>
			<li <?php if($this->uri->segment(1)=='contact'){?>class="active"<?php }?>><a href="<?=site_url('contact')?>">contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <div class="bds">
			</div>
    </div>
