<?php
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