<?php
session_start ();
$db = new PDO ( 'sqlite:../database.db' );
$pollid = $_GET ['poll'];

$stmt = $db->prepare ( 'SELECT * FROM poll WHERE pollId = ?' );
$stmt->execute ( array (
		$pollid 
) );
$poll = $stmt->fetchObject ();
$stmt = $db->prepare ( 'SELECT * FROM user WHERE userId = ?' );
$stmt->execute ( array (
		$poll->creatorId 
) );
$user = $stmt->fetchObject ();

// $creator = $poll->creatorId == $_SESSION ['userId'];
// if (! $creator) {
// return false;
// }
// $stmt = $db->prepare ( 'DELETE FROM poll WHERE pollId = ?' );
// $stmt->execute ( array (
// $pollid
// ) );
$stmt = $db->prepare ( 'SELECT * FROM question WHERE pollId = ?' );
$stmt->execute ( array (
		$pollid 
) );
var_dump ( $stmt->fetchObject () );
$stmt = $db->prepare ( 'DELETE * FROM question WHERE pollId = ?' );
$stmt->execute ( array (
		$pollid 
) );
var_dump ( $stmt->fetchObject () );
// $stmt = $db->prepare ( 'SELECT * FROM answer WHERE pollId = ?' );
// $stmt->execute ( array (
// $pollid
// ) );
var_dump ( $stmt->fetchObject () );
?>