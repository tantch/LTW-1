<?php
session_start();
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ../' );
	return false;
}

$stmt = $db->prepare ( 'SELECT * FROM question WHERE pollId = ?' );
$stmt->execute ( array (
		$poll->pollId 
) );

while ( $question = $stmt->fetchObject () ) {
	echo $question->content;
	$stmta = $db->prepare ( 'SELECT * FROM answer WHERE pollId = ? AND questionId = ?' );
	$stmta->execute ( array (
			$poll->pollId,
			$question->questionId 
	) );
	while ( $answer = $stmta->fetchObject () ) {
		echo $answer->description;
		echo ':';
		echo $answer->count;
	}
}
?>