<!DOCTYPE html>
<html>
<head>
<title>Meh</title>
<meta charset="UTF-8">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/login.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
	<div id="fb-root"></div>
	<?php
	if (! isset ( $_COOKIE ['PHPSESSID'] )) {
		session_set_cookie_params ( 0 );
		session_start ();
		session_regenerate_id ( true );
	} else {
		session_start ();
	}
	
	include 'template/header.php';
	?>
	<div id="content">
	<?php
	if (isset ( $_GET ['pagina'] )) {
		
		$url = 'template/' . $_GET ['pagina'] . '.php';
		include $url;
	} else {
		include 'template/home.php';
	}
	?>
	</div>
	<?php
	include 'template/footer.php';
	?>
</body>
</html>
