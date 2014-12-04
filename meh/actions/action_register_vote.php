<?php
session_start ();
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ../' );
	return false;
}

$db = new PDO ( 'sqlite:../database.db' );
$length = count ( $_GET );
$stmt = $db->prepare ( 'SELECT * FROM polluser WHERE pollId = ? AND userId = ?' );
$stmt->execute ( array (
		$_GET ['poll'],
		$_SESSION ['userId'] 
) );
$vote = $stmt->fetchObject ();
if ($vote)
	header ( 'Location: ../?pagina=pollResult&id=' . $_GET ['poll'] );
for($i = 0; $i < $length - 1; $i ++) {
	$ids = explode ( "A", $_GET [$i] );
	$stmt = $db->prepare ( 'UPDATE answer SET count = count + 1 WHERE pollId = ? AND questionId = ? AND answerId = ?' );
	$stmt->execute ( array (
			$_GET ['poll'],
			$ids [0],
			$ids [1] 
	) );
}
$stmt = $db->prepare ( 'INSERT INTO polluser (pollId,userId) VALUES(?,?)' );
$stmt->execute ( array (
		$_GET ['poll'],
		$_SESSION ['userId'] 
) );
header ( 'Location: ../?pagina=pollResult&id=' . $_GET ['poll'] );
?>