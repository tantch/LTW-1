<?php
session_start();
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ../' );
	return false;
}


$num1 = (int)$_POST[pid];
$num2 = (int)$_POST[qid];
$valuesAray= array();

$db = new PDO ( 'sqlite:../database.db' );
$stmt = $db->prepare ('SELECT * FROM answer WHERE pollId = ? AND questionId = ?');
$stmt->execute(array(
		htmlentities($num1),
		htmlentities($num2)
));
while($answer = $stmt->fetchObject()){
	$valuesArray[]=array("c"=>array(array("v"=>$answer->description,"f"=>null),array("v"=>(int)$answer->count,"f"=>null)));
}

$ar = array (
		"cols" => array (
				array (
						"id" => "",
						"label" => "Topping",
						"pattern" => "",
						"type" => "string" 
				),
				array (
						"id" => "",
						"label" => "Slices",
						"pattern" => "",
						"type" => "number" 
				) 
		),
		"rows"=>$valuesArray

);
echo json_encode ( $ar );

?>