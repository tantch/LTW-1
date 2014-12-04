<?php
$db = new PDO ( 'sqlite:../database.db' );
$length = count ( $_GET );
for($i = 0; $i < $length - 1; $i ++) {
	$ids = explode ( "A", $_GET [$i] );
	$stmt = $db->prepare ( 'UPDATE answer SET count = count + 1 WHERE pollId = ? AND questionId = ? AND answerId = ?' );
	$stmt->execute ( array (
			$_GET ['poll'],
			$ids [0],
			$ids [1] 
	) );
}
?>