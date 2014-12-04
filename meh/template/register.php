<?php 
if (isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Already logged in</p>';
	header ( 'Location: ./' );
	return false;
}
?>

<script type="text/javascript" src="./JS/registerInput.js"></script>
<div class="register-box">
	<h1>Register</h1>
	<form action="actions/action_register.php" method="post">
		<input type="text" id="firstname" name="firstname" value="" placeholder="myFirst Name" required />
		<br>
		<input type="text" id="lastname" name="lastname" value="" placeholder="myLastName" required />
		<br>
		<input type="text" id="username" name="username" value="" placeholder="username" required />
		<br>
		<input type="email" id="email" name="email" value="" placeholder="myemail@gmail.com" required />
		<br>
		<input type="password" id="password" name="password" value="" placeholder="password" required />
		<br>
		<input type="password" id="cpassword" name="cpassword" value="" placeholder="confirm password" required />
		<br> <br>
		<input class="button" type="submit" value="I wanna be a member!" />
	</form>
	<br>
</div>