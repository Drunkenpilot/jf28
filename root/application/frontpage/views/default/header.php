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

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


	<link rel="stylesheet" media="all" href="<?=base_url('resources/frontpage/css/stylesheet.css')?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/frontpage/tools/collageplus/support/examples.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/frontpage/tools/collageplus/css/transitions.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/frontpage/tools/collageplus/css/transitions.css" media="all" />
<!--<link rel="stylesheet" type="text/css" href="<? //base_url()?>resources/frontpage/tools/fancybox/jquery.fancybox.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<? //base_url()?>resources/frontpage/tools/fancybox/helpers/jquery.fancybox-thumbs.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<? //base_url()?>resources/frontpage/tools/fancybox/helpers/jquery.fancybox-buttons.css" media="all" /> -->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/frontpage/tools/fancybox-v3beta/jquery.fancybox.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/frontpage/tools/fancybox-v3beta/jquery.fancybox-thumbs.css" media="all" />
	
	<script src="<?=base_url()?>resources/frontpage/tools/fancybox-v3beta/jquery.fancybox.js"></script>
	<script src="<? //base_url()?>resources/frontpage/tools/fancybox-v3beta/jquery.fancybox-thumbs.js"></script>
<!--<script src="<? //base_url()?>resources/frontpage/tools/fancybox/jquery.fancybox.js"></script>
	<script src="<? //base_url()?>resources/frontpage/tools/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
	<script src="<? //base_url()?>resources/frontpage/tools/fancybox/helpers/jquery.fancybox-buttons.js"></script> -->
    <script src="<?=base_url()?>resources/frontpage/tools/collageplus/jquery.collagePlus.js"></script>
    <script src="<?=base_url()?>resources/frontpage/tools/collageplus/extras/jquery.removeWhitespace.js"></script>
    <script src="<?=base_url()?>resources/frontpage/tools/collageplus/extras/jquery.collageCaption.js"></script>
  
   <script type="text/javascript">

    // All images need to be loaded for this plugin to work so
    // we end up waiting for the whole window to load in this example
    $(window).load(function () {
        $(document).ready(function(){
            $winWidth = $(window).width();
            	
            collage();
            $('.Collage').collageCaption();
            if($winWidth < '1200'){
            $("[rel='gallery1']").fancybox({
            	openEffect	: 'none',
        		closeEffect	: 'none',
            	closeBtn : false,
            	theme     : 'default',
            	padding: 0,
            	margin:[10,10,10,10],
            	arrows:false,
            	caption:{type:'outside'},
				helpers : {
					
					thumbs : false,
				}
			});
            }else{
            	 $("[rel='gallery1']").fancybox({
                 	openEffect	: 'none',
             		closeEffect	: 'none',
                 	closeBtn : false,
                 	theme     : 'default',
                 	padding: 0,
                 	margin:[10,10,10,10],
                 	arrows:true,
                 	caption:{type:'outside'},
     				helpers : {
     					
     					thumbs : true,
     				}
     			});

                }
            
        });
    });


    // Here we apply the actual CollagePlus plugin
    function collage() {
        $('.Collage').removeWhitespace().collagePlus(
            {
                'fadeSpeed'     : 500,
                'targetHeight'  : 200,
                'allowPartialLastRow' : true
            }
        );
    };

    // This is just for the case that the browser window is resized
    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.Collage .Image_Wrapper').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });

    </script>

</head>
<body>
	<!-- .page -->
	<div class="page">
		<!-- .header -->
		<header class="header"> 
			<!-- .topbar -->
			<div class="topbar">
			<!-- .logo -->
			<div class="logo">JEAN-FRANÇOIS DE WITTE</div>
			<!-- /.logo -->
			<!-- .menu -->
			<div class="menu">
			<ul>
			<li <?php if($this->uri->segment(1)==''){?>class="active"<?php }?>><a href="<?=site_url()?>">works</a></li>
			<li <?php if($this->uri->segment(1)=='contact'){?>class="active"<?php }?>><a href="<?=site_url('contact')?>">contact</a></li>
			</ul>
			</div>
			<!-- /.menu -->			
			</div>
			<!-- /.topbar -->
			<!-- border shadow -->
			<div class="bds">
			</div>
			<!-- /.border shadow -->
		</header>
		<!-- /.header -->