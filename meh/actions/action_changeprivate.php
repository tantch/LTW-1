<?php
session_start ();
$db = new PDO ( 'sqlite:../database.db' );
$pollid = $_GET ['poll'];

$stmt = $db->prepare ( 'SELECT * FROM poll WHERE pollId = ?' );
$stmt->execute ( array (
		$pollid 
) );
$poll = $stmt->fetchObject ();

$creator = $poll->creatorId == $_SESSION ['userId'];
if (! $creator) {
	header ( 'Location: ../../' );
	return false;
}
if ($poll->private == 0)
	$stmt = $db->prepare ( 'Update poll SET private = 1 WHERE pollId = ?' );
else
	$stmt = $db->prepare ( 'Update poll SET private = 0 WHERE pollId = ?' );
$stmt->execute ( array (
		$pollid 
) );
header ( 'Location: ../../?pagina=pollResult&id=' . $pollid );
?>