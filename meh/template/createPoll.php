<?php
if (! isset ( $_SESSION ['username'] )) {
	$_SESSION['msg']='<script> alert("Please log in");</script>';
	header ( 'Location: ./' );
	return false;
}
?>

<script type="text/javascript" src="./JS/createPoll_buttons.js"></script>
<div class="create-poll-box">
	<h2>Create poll</h2>
	<form action="actions/action_create_poll.php" method="post"
		enctype="multipart/form-data" class="row" id="create-poll">
		<br>Poll Name: <br>
		<div class="col-md-12">
			<input type="text" required name="title" />
		</div>
		<div class="col-md-12">
			<p>
				Private : <input type="checkbox" name="private" />


			</p>
			<div style='height: 0px; width: 0px; overflow: hidden;'>
				<input type="file" name="fileToUpload" id="fileToUpload"
					style="float: right;"required/>
			</div>
			<img id="prev" src="#" alt="No image uploaded" />
			<button id="addFile" class="btn-addFile"
				onClick="document.getElementById('fileToUpload').click()">
				<i class="fa fa-plus" style="color: #00669B;"></i> Add Photo
			</button>
		</div>
		<div class="col-md-12">
			<button id="addQuestion" class="btn-addquestion" value="&#43">
				<i class="fa fa-plus" style="color: #00669B;"></i> Add Question
			</button>
		</div>
		<div class="col-md-12">
			<input type="submit" value="Create" id="btn-submit" />
		</div>
	</form>
</div>