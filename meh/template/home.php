<?php
if (isset ( $_SESSION ['msg'] )) {
	echo $_SESSION ['msg'];
	unset ( $_SESSION ['msg'] );
}
?>
<img src="css/feup.jpg" alt="feup" style="  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; min-heigth: 100%; z-index: -1; opacity: 0.4;" class="img">

<h1 class="title">Poll Generator</h1>
<h3 class="home-text">Welcome to our poll generator website!</h3>
