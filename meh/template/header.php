<div class="nav-bar" id="header_menu">
	<ul>
		<li><a href="./?pagina=home">Home</a></li>
			
			<li><a href="./?pagina=register">Sign up</a></li>
			
			<li><a href="./?pagina=createPoll">New Poll</a></li>

			<li >
			<?php if (isset($_SESSION['username'])) { ?>
			<form action="./actions/action_logout.php" method="post" id="logout">
				<label><?=$_SESSION['username']?></label> <input type="submit" id="button-logout"
					value="Logout">
			</form>
		</li>
			<?php
				
			} else {
				include 'template/login.php';
			
			
			
				}	?>
				<li><a><?php include 'template/searchform.php';?></a></li>
	</ul>
</div>