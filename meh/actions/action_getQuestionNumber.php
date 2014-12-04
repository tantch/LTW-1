<?php
session_start();
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ../' );
	return false;
}
$id = (int)$_POST['pid'];
$db = new PDO ( 'sqlite:../database.db' );
$stmt = $db->prepare ('SELECT COUNT(*) FROM question WHERE pollId = ?');
$stmt->execute(array(
		htmlentities($id)
));
echo $stmt->fetchColumn();

?>