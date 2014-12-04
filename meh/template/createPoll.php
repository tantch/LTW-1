<?php 
if (!isset ( $_SESSION ['username'] )){
		$_SESSION['msg']='<p id="error">Not logged in</p>';
		header ( 'Location: ./' );
		return false;
	}?>

<script type="text/javascript" src="./JS/createPoll_buttons.js"></script>
<h2>Create poll</h2>
<form action="actions/action_create_poll.php" method="post" enctype="multipart/form-data">
	Poll Name: <br>
	<input type="text" required name="title" />
	<br> Private :<input type="checkbox" name="private"/>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<br>
	<input type="button" id="addQuestion" value="&#43 Question" />
	<input type="submit" value="Create"/>
</form>
