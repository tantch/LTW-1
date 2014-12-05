<?php 
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
	?>
	
<img src="css/feup.jpg" alt="feup" style="width:100%;height:100%;z-index:-1;opacity: 0.4;" class="img">
<h1 class="title">Poll Generator</h1>
<h3 class="home-text">Welcome to our poll generator website!</h3>	