<?php 
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ./' );
	return false;
}

include 'actions/action_getPoll.php';?>