<?php
return false;

$to = "";
$subject = "";
$txt = "";
$headers = "From: ";
if(!mail ( $to, $subject, $txt, $headers )){
	echo '<h1>nao deu<h1/>';
}



?>