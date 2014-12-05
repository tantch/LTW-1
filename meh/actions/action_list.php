<?php
	$db = new PDO ( 'sqlite:./database.db' );
	$stmt = $db->prepare ( 'SELECT * FROM poll WHERE private = 0' );
	$stmt->execute ( array (
	) );
	$result = $stmt->fetchAll ();
	foreach ( $result as $row ) {
		?>
<a href="?pagina=poll&id=<?php echo $row['pollId']?>">
		<?php echo $row['name']?></a>
<br><?php } ?>