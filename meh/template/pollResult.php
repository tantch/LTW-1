<?php
session_start ();
if (! isset ( $_SESSION ['username'] )) {
	$_SESSION ['msg'] = '<p id="error">Not logged in</p>';
	header ( 'Location: ./' );
	return false;
}
$db = new PDO ( 'sqlite:./database.db' );
$pollid = $_GET ['id'];
$stmt = $db->prepare ( 'SELECT * FROM polluser WHERE pollId = ? AND userId = ?' );
$stmt->execute ( array (
		$pollid,
		$_SESSION ['userId'] 
) );
$voted = $stmt->fetchObject ();
$stmt = $db->prepare ( 'SELECT * FROM poll WHERE pollId = ?' );
$stmt->execute ( array (
		$pollid 
) );

$poll = $stmt->fetchObject ();
$creator = $poll->creatorId == $_SESSION ['userId'];
if (! $voted && !$creator) {
	header ( 'Location: ./?pagina=poll&id=' . $_GET ['id'] );
}


$stmt = $db->prepare ( 'SELECT * FROM user WHERE userId = ?' );
$stmt->execute ( array (
		$poll->creatorId
) );
$user = $stmt->fetchObject ();
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="./JS/drawChart.js"></script>
<script type="text/javascript">

$(document ).ready(function() {
	var get=parseURLParams(document.URL);
    var ques=getQuestionNumber(get['id']);
    var nomes=$.parseJSON(getPollNames(get['id']));
    for(var i=0;i<ques;i++){
    	drawQuestion(get['id'],i,nomes[i+1]['question']);
        $('#charts').append('<div id="donutchart'+i+'" style="width: 900px; height: 500px;"></div>');
    }
});
</script>

<h2> Poll - <?php echo $poll->name?></h2>
<p>Created by <?php echo $user->firstname . " " . $user->lastname?></p>
<?php if($creator){
	?><a href= <?php echo "./actions/action_deletePoll.php/?poll=". $pollid;?> ><input type="button" value="Delete Poll"/> </a><?php 
}?>
<div id='charts'></div>
