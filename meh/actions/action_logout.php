<?php

session_start ();
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ../' );
	return false;
}
unset ( $_SESSION ['username'] );
unset($_SESSION['userId']);
header ( 'Location: ../?pagina=home' );
?>