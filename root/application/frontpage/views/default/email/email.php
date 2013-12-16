<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>request information</title>
		<style>
		body{background:#F7F7F7; margin: 0; padding: 0; font-family: Helvetica,Arial; font-size: 13px; color: black;}
		.logo{border-bottom: 1px solid #666; padding: 1em;}
		.logo a{color:black;text-decoration:none;}
		.mail_content{padding: 1em;}
		.mail_content div{padding: 0.5em;}
		.mail_content label{background: #F7F7F7; padding: 0.1em 0.5em; color: black;}
		</style>
	</head>
	<body>
	<div class="logo"><a href="<?=site_url()?>">Jean-François DE WITTE</a></div>
	<div class="mail_content">
	<p>Name: <?=$name?></p>
	<p>Telephone: <?=$telephone?></p>
	<p>Email: <a href="mailto:<?=$email?>"><?=$email?></a></p>
	<br>
	<p>Message: <?=$message?></p>
	</div>
	</body>
</html>
