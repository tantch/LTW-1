<h1>Home</h1>
<?php 
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
	?>