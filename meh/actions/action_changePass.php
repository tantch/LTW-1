<?php 
session_start();
if (version_compare ( PHP_VERSION, '5.3.7', '<' )) {
	echo "Sorry, Simple PHP Login does not run on a PHP version older than 5.3.7 !";
} elseif (version_compare ( PHP_VERSION, '5.5.0', '<' )) {
	require_once ("../libraries/password_compatibility_library.php");
}
$db = new PDO ( 'sqlite:../database.db' );

$options = [ 
		'cost' => 12 
];
$hash = password_hash ( $_POST ['password'], PASSWORD_DEFAULT, $options );
$stmt = $db->prepare ( 'UPDATE user SET hash = ? WHERE username = ?' );
$stmt->execute ( array (
$hash,
$_SESSION ['username']
) );
header("Location: ../?pagina=reseted");
?>