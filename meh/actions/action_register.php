<?php
function performMinimumRequirementsCheck() {
	if (version_compare ( PHP_VERSION, '5.3.7', '<' )) {
		echo "Sorry, Simple PHP Login does not run on a PHP version older than 5.3.7 !";
	} elseif (version_compare ( PHP_VERSION, '5.5.0', '<' )) {
		require_once ("../libraries/password_compatibility_library.php");
		return true;
	} elseif (version_compare ( PHP_VERSION, '5.5.0', '>=' )) {
		return true;
	}
	// default return
	return false;
}
function checkData() {
	if (empty ( $_POST ['username'] )) {
		echo 'username empty';
		return false;
	}
	if (! preg_match ( "/^[a-zA-Z-\.]{2,15}/", $_POST ['username'] )) {
		echo 'username invalid';
		return false;
	}
	if (empty ( $_POST ['firstname'] ) || ! preg_match ( "/^[a-zA-Z][a-zA-Z-_\.]{1,20}$/", $_POST ['firstname'] )) {
		echo 'fname invalid';
		return false;
	}
	if (empty ( $_POST ['lastname'] ) || ! preg_match ( "/^[a-zA-Z][a-zA-Z-_\.]{1,20}$/", $_POST ['lastname'] )) {
		echo 'lname invalid';
		return false;
	}
	if (empty ( $_POST ['email'] ) || ! (strlen ( $_POST ['email'] ) <= 64) || ! filter_var ( $_POST ['email'], FILTER_VALIDATE_EMAIL )) {
		echo 'email invalid';
		return false;
	}
	if (empty ( $_POST ['password'] ) || empty ( $_POST ['cpassword'] )) {
		echo 'pass empty';
		return false;
	}
	if (($_POST ['password'] !== $_POST ['cpassword'])) {
		echo 'pass not equal';
		return false;
	}
	if (! preg_match ( "/(?=^.{8,}$)((?=.*[0-9])|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST ['password'] )) {
		echo 'pass not valid';
		return false;
	}
	return true;
}
function doRegistation() {
	performMinimumRequirementsCheck ();
	if (checkData ()) {
		$db = new PDO ( 'sqlite:../database.db' );
		
		$stmt = $db->prepare ( 'SELECT * FROM user WHERE username = ?' );
		$stmt->execute ( array (
				$_POST ['username'] 
		) );
		$result_row = $stmt->fetchObject ();
		if ($result_row) {
			// TODO add message
			echo 'username already exists';
			return false;
		}
		
		$stmt = $db->prepare ( 'SELECT * FROM user WHERE email = ?' );
		$stmt->execute ( array (
				$_POST ['email'] 
		) );
		$result_row = $stmt->fetchObject ();
		if ($result_row) {
			// TODO add message
			echo 'email already used';
			return false;
		}
		// send email
		$to = htmlentities ( $_POST ['email'], ENT_QUOTES );
		$subject = "meh | Registration";
		$txt = "Thank you for registering to meh. \n Meh already has 1 bilion members!";
		$headers = "From: mehnoreply@mehpools.ru";
		mail ( $to, $subject, $txt, $headers );
		
		$options = [ 
				'cost' => 12 
		];
		$password = $_POST ['password'];
		$hash = password_hash ( $password, PASSWORD_DEFAULT, $options );
		
		$query = $db->prepare ( 'INSERT INTO user (username,hash,firstname,lastname,email) VALUES(?,?,?,?,?)' );
		$query->execute ( array (
				htmlentities ( $_POST ['username'], ENT_QUOTES ),
				$hash,
				htmlentities ( $_POST ['firstname'], ENT_QUOTES ),
				htmlentities ( $_POST ['lastname'], ENT_QUOTES ),
				htmlentities ( $_POST ['email'], ENT_QUOTES ) 
		) );
		header ( 'Location: ../' );
	}
}
function start() {
	if (isset ( $_SESSION ['username'] )) {
		header ( 'Location: ../' );
	}
	else{
		doRegistation ();		
	}
}
start();

?>