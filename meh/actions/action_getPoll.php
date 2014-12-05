<?php
if (empty ( $_GET )) {
	echo 'empty get';
	return false;
}
if (! isset ( $_GET ['id'] )) {
	echo 'empty id';
	return false;
}
session_start ();
	$db = new PDO ( 'sqlite:./database.db' );
	$pollid = $_GET ['id'];
	
if (! isset ( $_SESSION ['username'] )) {
	/*$_SESSION ['msg'] = '<p id="error">Not logged in</p>';
	header ( 'Location: ./' );
	return false;*/
	$notlogged=true;
	
} else {
	$notlogged=false;
	$stmt = $db->prepare ( 'SELECT * FROM polluser WHERE pollId = ? AND userId = ?' );
	$stmt->execute ( array (
			$pollid,
			$_SESSION ['userId'] 
	) );
	$voted = $stmt->fetchObject ();
	if ($voted) {
		header ( 'Location: ./?pagina=pollResult&id=' . $_GET ['id'] );
	}
}
$stmt = $db->prepare ( 'SELECT * FROM poll WHERE pollId = ?' );
$stmt->execute ( array (
		$pollid 
) );
$poll = $stmt->fetchObject ();
if (! $poll) {
	echo 'poll does not exist';
	return false;
}

$stmt = $db->prepare ( 'SELECT * FROM user WHERE userId = ?' );
$stmt->execute ( array (
		$poll->creatorId 
) );
$user = $stmt->fetchObject ();
if (! $user) {
	echo 'empty user fetch';
	return false;
}
?>
<h2> Poll - <?php echo $poll->name?></h2>
<p>Created by <?php echo $user->firstname . " " . $user->lastname?></p>
<?php
if ($user)
	$stmt = $db->prepare ( 'SELECT * FROM question WHERE pollId = ?' );
$stmt->execute ( array (
		$poll->pollId 
) );

if(!$notlogged && $poll->creatorId ==$_SESSION['userId']){
	?><a href= <?php echo "./?pagina=pollResult&id=". $pollid;?> ><input type="button" value="See Results"/> </a><?php 
}

?>

<form action="actions/action_register_vote.php" >
	<input type="text" name="poll" value="<?php echo $poll->pollId?>"
		hidden="true">
	<?php
	while ( $question = $stmt->fetchObject () ) {
		?><h4><?php	echo $question->content;?> </h4> <?php
		$stmta = $db->prepare ( 'SELECT * FROM answer WHERE pollId = ? AND questionId = ?' );
		$stmta->execute ( array (
				$poll->pollId,
				$question->questionId 
		) );
		while ( $answer = $stmta->fetchObject () ) {
			echo $answer->description?><input required type="radio"
		name="<?php echo $question->questionId; ?>"
		value="<?php echo  $question->questionId."A".$answer->answerId?>"<?php if($notlogged){?>disabled<?php }?> /> <br> 
		<?php } ?>
<?php } ?>
<?php if(!$notlogged){?>
<input type="submit" value="Submit">
<?php }?>
</form>
