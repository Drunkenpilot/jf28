<!DOCTYPE html>
<html lang="en">
<title><?=$title?></title>
<meta  charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>../resources/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>../resources/bootstrap/js/jquery.placeholder.js"></script>
<script src="<?=base_url()?>../resources/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>../resources/admin/js/tools.js"></script>
<link href="<?=base_url()?>../resources/bootstrap/css/bootstrap.css" rel="stylesheet" >
<link href="<?=base_url()?>../resources/bootstrap/css/sticky-footer.css" rel="stylesheet">
<link href="<?=base_url()?>../resources/datepicker/css/datepicker.css" rel="stylesheet" >
<link href="<?=base_url()?>../resources/frontpage/css/glyphicons.css" rel="stylesheet" >
<link href="<?=base_url()?>../resources/admin/css/reset.css" rel="stylesheet" >


</head>

<body>
<div id="wrap">
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
				<div class="navbar-header">

					<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=site_url()?>">Jean-François DE WITTE | Admin</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li <?php if($this->uri->segment(1)=='catalog'){ echo 'class="active"';}?> class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Catalog  <span
								class="caret"></span></a>
							<ul	class="dropdown-menu">
								<li <?php if($this->uri->segment(2)=='products'){ echo 'class="active"';}?>><a href="<?=site_url('catalog/products')?>">Products</a></li>
								<li <?php if($this->uri->segment(2)=='categories'){ echo 'class="active"';}?>><a href="<?=site_url('catalog/categories')?>">Categories</a></li>
							</ul>
						</li>
					
						<li class="dropdown <?php if($this->uri->segment(1)=='preference'){ echo 'active';}?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
								class="glyphicon glyphicon-wrench"></i> Preference <span
								class="caret"></span></a>
							<ul class="dropdown-menu">
								<li
								<?php if($this->uri->segment(2)=='administration'){ echo 'class="active"';}?>><a
									href="<?=site_url('preference/administration')?>">Administration</a>
								</li>
								<li
								<?php if($this->uri->segment(2)=='theme'){ echo 'class="active"';}?>><a
									href="<?=site_url('preference/theme')?>">Themes</a></li>

							

							</ul>
						</li>
						
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="glyphicon glyphicon-user"></i> <?=$this->admin->lastname?>
						<?=$this->admin->firstname?> </a></li>
						<li> <a href="#" data-toggle="modal" data-target="#logout">Sign out</a></li>
					</ul>
					
				</div>
				</div>
			</div>
<!-- .logout -->
	<div id="logout" class="modal fade " tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">×</button>
					<h4 id="myModalLabel">Action:</h4>
				</div>
				<div class="modal-body">Would you like to log-out ?</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<a class="btn btn-primary" href="<?=site_url('logout')?>">Yes</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /.logout -->
	<!-- container -->
	<div class="container" id="mainContent">
	<!-- .breadcrumb -->

	<ul class="breadcrumb">
		<li><i class="glyphicon glyphicon-home"></i> <?php if($this->uri->total_segments() != 0){?><a
			href="<?=site_url()?>">Home</a> <?php }else{?>Home<?php }?> </li>
			<?php for($i=0;$i<$this->uri->total_segments();$i++){?>
			<?php $this_url = array();?>
			<?php for($j=0;$j<$i+1;$j++){?>
			<?php $this_url[] = '/'.$this->uri->segment($j+1);?>
			<?php }?>
			<?php $this_url = implode("",$this_url);?>
		<li <?php if($i+1 == $this->uri->total_segments()){?> class="active"><?=$this->uri->segment($i+1)?>
		<?php }else{?>><a href="<?=site_url($this_url)?>"><?=$this->uri->segment($i+1)?>
		</a> <?php }?></li>
		<?php }?>
		<hr class="bs-docs-separator">
	</ul>

	<!-- /.breadcrumb -->

	