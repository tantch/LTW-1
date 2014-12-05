<?php
function checkData() {
	if (empty ( $_POST ['username'] ) || ! preg_match ( "/^[a-zA-Z-\.]{2,15}/", $_POST ['username'] )) {
		return false;
	}
	return true;
}
function validateData() {
	$db = new PDO ( 'sqlite:../database.db' );
	$stmt = $db->prepare ( 'SELECT hash FROM user WHERE username = ?' );
	$stmt->execute ( array (
			$_POST ['username'] 
	) );
	$result = $stmt->fetchColumn ();
	if ($result == null) {
		$_SESSION['msg']='<script> alert("User doesnt exist");</script>';
	header ( 'Location: ../' );
	return false;
	}
	if (password_verify ( $_POST ['password'], $result )) {
		echo 'login success';
		return true;
	} else {
		$_SESSION['msg']='<script> alert("wrong password");</script>';
	header ( 'Location: ../' );
	return false;
	}
}
function login() {
	require_once ("../libraries/password_compatibility_library.php");
	session_start ();
	if (isset ( $_COOKIE ['PHPSESSID'] ) && ! isset ( $_SESSION ['username'] )) {
		if (checkData ()) {
			// apaga se quiseres
			if (validateData ()) {
				$db = new PDO ( 'sqlite:../database.db' );
				$stmt = $db->prepare ( 'SELECT userId FROM user WHERE username = ?' );
				$stmt->execute ( array (
						$_POST ['username']
				) );
				$user= $stmt->fetchObject();
				$_SESSION['userId']= $user->userId;
				$_SESSION ['username'] = $_POST ['username'];
				header ( 'Location: ../?');
			}
		} else
			echo '???';
	}
}
login ();
?>