<?php
$pollid = $_GET ['id'];
$db = new PDO ( 'sqlite:database.db' );
$stmt = $db->prepare ( 'SELECT * FROM poll WHERE pollId = ?' );

$poll = $stmt->fetchObject();
$_SESSION['username'];

?>