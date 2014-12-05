<?php

//TODO restri��es
if (! isset ( $_POST ['title'] )) {
	echo 'title empty';
	return false;
}
session_start ();
if (! isset ( $_SESSION ["userId"] )) {
	echo 'not logged in';
	return false;
}
$creatorId = $_SESSION ["userId"];
if (isset ( $_POST ['private'] )) {
	$private = 1;
} else {
	$private = 0;
}
if (! isset ( $_POST ['Q0'] )) {
	echo 'must have at least one question';
	return false;
}

$target_dir = "../uploads/";
if(!isset($_FILES["fileToUpload"])){
	echo 'no file';
	return false;
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$size = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($size === false) {
	echo 'not an image';
	return false;
}
$cnt=1;
while(file_exists($target_file)) {
	$target_file = $target_dir . pathinfo($target_file,PATHINFO_FILENAME)."(" .  $cnt . ")." .pathinfo($target_file,PATHINFO_EXTENSION);
	$cnt++;
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	echo "The file ". $target_file. " has been uploaded.";
} else {
	$_SESSION ['msg'] = '<script> alert("Sorry, there was an error uploading your file.");</script>';
	header ( 'Location: ./pagina=createPoll' );
	return false;
}
$db = new PDO ( 'sqlite:../database.db' );
$stmt = $db->prepare ( 'INSERT INTO poll (name,imageURL,creatorId,private) VALUES(?,?,?,?)' );
$stmt->execute ( array (
		htmlentities ( $_POST ['title'], ENT_QUOTES ),
		htmlentities($target_file),
		htmlentities ( $creatorId, ENT_QUOTES ),
		htmlentities ( $private, ENT_QUOTES ) 
) );
$pollId= $db->lastInsertId ("pollId");
$question = 0;
$stmt2 = $db->prepare ( 'INSERT INTO question (questionId,pollId,content) VALUES(?,?,?)' );
while ( isset ( $_POST ['Q' . $question] ) ) {
	$qpath = 'Q' . $question;
	$stmt2->execute ( array (
			htmlentities ( $question, ENT_QUOTES ),
			htmlentities ( $pollId, ENT_QUOTES ),
			htmlentities ( $_POST [$qpath], ENT_QUOTES ) 
	) );
	$answer = 0;
	$apath = 'Q' . $question . 'A' . $answer;
	$stmt3 = $db->prepare ( 'INSERT INTO answer (pollId,description,count,answerId,questionId) VALUES(?,?,?,?,?)' );
	while ( isset ( $_POST [$apath] ) ) {
		$stmt3->execute ( array (
				htmlentities ( $pollId, ENT_QUOTES ),
				htmlentities ( $_POST [$apath], ENT_QUOTES ),
				'0',
				htmlentities ( $answer, ENT_QUOTES ),
				htmlentities ( $question, ENT_QUOTES )
		) );
		$answer ++;
		$apath = 'Q' . $question . 'A' . $answer;
	}
	
	$question ++;
}
header("Location: ../?pagina=poll&id=".$pollId);
?>?>