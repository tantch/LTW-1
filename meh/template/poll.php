<?php 

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
include 'actions/action_getPoll.php';?>
	?>