<?php
session_start();
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ../' );
	return false;
}


$num1 = (int)$_POST[pid];
$data = array();
$db = new PDO ( 'sqlite:../database.db' );
$stmt = $db->prepare ('SELECT name FROM poll WHERE pollId = ?');
$stmt->execute(array(
		htmlentities($num1)
));
$pollName= $stmt->fetchColumn();
$data[] = array("name" => $pollName);
$db = new PDO ( 'sqlite:../database.db' );
$stmt = $db->prepare ('SELECT * FROM question WHERE pollId = ?');
$stmt->execute(array(
		htmlentities($num1)
));
$cnt=0;
while($qes=$stmt->fetchObject()){
	$data[]=array("question" => $qes->content);
	$cnt++;
}
echo json_encode ( $data);