<?php

$id = (int)$_POST['pid'];
$db = new PDO ( 'sqlite:../database.db' );
$stmt = $db->prepare ('SELECT COUNT(*) FROM question WHERE pollId = ?');
$stmt->execute(array(
		htmlentities($id)
));
echo $stmt->fetchColumn();

?>