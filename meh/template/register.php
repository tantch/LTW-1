<?php 
if (isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<script> alert("Already logged in");</script>';
	header ( 'Location: ./' );
	return false;
}
?>

<script type="text/javascript" src="./JS/registerInput.js"></script>
<div class="register-box">
	<h1>Register</h1>
	<form action="actions/action_register.php" method="post" id="register" class="row">
		<div class="col-md-12">
		<input type="text" id="firstname" name="firstname" value="" placeholder="myFirst Name" required />
		</div>
		<div class="col-md-12">
		<input type="text" id="lastname" name="lastname" value="" placeholder="myLastName" required />
		</div>
		<div class="col-md-12">
		<input type="text" id="username" name="username" value="" placeholder="username" required />
		</div>
		<div class="col-md-12">
		<input type="email" id="email" name="email" value="" placeholder="myemail@gmail.com" required />
		</div>
		<div class="col-md-12">
		<input type="password" id="password" name="password" value="" placeholder="password" required />
		</div>
		<div class="col-md-12">
		<input type="password" id="cpassword" name="cpassword" value="" placeholder="confirm password" required />
		</div>
		<div class="col-md-12">
		<input class="button" type="submit" value="I wanna be a member!" />
		</div>
	</form>
</div>