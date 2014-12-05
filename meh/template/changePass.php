<?php
if (! isset ( $_SESSION ['username'] )) {
	$_SESSION['msg']='<script> alert("Please log in");</script>';
	header ( 'Location: ./' );
	return false;
}
?>
<form action="actions/action_changePass.php" method="post">
	<input type="password" id="password" name="password" placeholder="password" value="" required />
	<input type="submit" hidden="true">
</form>