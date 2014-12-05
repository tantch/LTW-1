<?php
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen ( $characters );
	$randomString = '';
	for($i = 0; $i < $length; $i ++) {
		$randomString .= $characters [rand ( 0, $charactersLength - 1 )];
	}
	return $randomString;
}

if (version_compare ( PHP_VERSION, '5.3.7', '<' )) {
	echo "Sorry, Simple PHP Login does not run on a PHP version older than 5.3.7 !";
} elseif (version_compare ( PHP_VERSION, '5.5.0', '<' )) {
	require_once ("../libraries/password_compatibility_library.php");
}
$db = new PDO ( 'sqlite:../database.db' );
$stmt = $db->prepare ( 'SELECT * FROM user WHERE username = ?' );
$stmt->execute ( array (
		$_POST ['username'] 
) );
$user = $stmt->fetchObject ();

if ($user->email != $_POST ['email']) {
	echo fail;
	header ( 'Location: ../' );
}

$newPass = generateRandomString ();
$to = htmlentities ( $_POST ['email'], ENT_QUOTES );
$subject = "meh | Reset Password";
$txt = "Your new password is " . $newPass;
$headers = "From: mehnoreply@mehpools.ru";

mail ( $to, $subject, $txt, $headers );
$options = [ 
		'cost' => 12 
];
$hash = password_hash ( $newPass, PASSWORD_DEFAULT, $options );
$stmt = $db->prepare ( 'UPDATE user SET hash = ? WHERE username = ?' );
$stmt->execute ( array (
		$hash,
		$_POST ['username'] 
) );
	header ( 'Location: ../?pagina=reseted.php' );

?>