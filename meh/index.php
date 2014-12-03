<!DOCTYPE html>
<html>
<head>
<title>Meh</title>
<meta charset="UTF-8">
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<?php
	if (! isset ( $_COOKIE ['PHPSESSID'] )) {
		session_set_cookie_params ( 0 );
		session_start ();
		session_regenerate_id ( true );
	} else {
		session_start ();
	}

include 'template/header.php';
if (isset ( $_GET ['pagina'] )) {
	$url = 'template/' . $_GET['pagina'] . '.php';
	include  $url;
} else {
	include 'template/home.php';
}
include 'template/footer.php';
?>
</body>
</html>
