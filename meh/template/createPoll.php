<?php
if (! isset ( $_SESSION ['username'] )) {
	$_SESSION ['msg'] = '<p id="error">Not logged in</p>';
	header ( 'Location: ./' );
	return false;
}
?>

<script type="text/javascript" src="./JS/createPoll_buttons.js"></script>
<div class="create-poll-box">
	<h2>Create poll</h2>
	<form action="actions/action_create_poll.php" method="post"
		enctype="multipart/form-data">
		<br>Poll Name: <br>
		<div class="col-md-12">
			<input type="text" required name="title" /> <br> Private :
		</div>
		<div class="col-md-12">
			<input type="checkbox" name="private" />
		</div>
		<div class="col-md-12">
			<input type="file" name="fileToUpload" id="fileToUpload">
		</div>
		<div class="col-md-12">
			<input type="button" id="addQuestion" value="&#43 Question" />
		</div>
		<div class="col-md-12">
			<input type="submit" value="Create" />
		</div>
	</form>
</div>