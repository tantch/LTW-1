
<div id="header">
	<h1>Meh Polls</h1>
</div>
<div id="header_menu">
	<ul>
		<li><a href="./?pagina=home">Home</a></li>
			
			<?php if (isset($_SESSION['username'])) { ?>
			<li>
			<form action="./actions/action_logout.php" method="post">
				<label><?=$_SESSION['username']?></label> <input type="submit"
					value="Logout">
			</form>
		</li>
			<?php
				include 'template/searchform.php';
			} else {
				include 'template/login.php';
				?>
			<li><a href="./?pagina=register">
				<button class="button" type="button">Sign up</button>
		</a></li>
			<?php }	?>
			<li><a href="./?pagina=createPoll">New Poll</a></li>
	</ul>
</div>