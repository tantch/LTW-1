<?php
	$db = new PDO ( 'sqlite:./database.db' );
	$stmt = $db->prepare ( 'SELECT * FROM poll WHERE private = 0' );
	$stmt->execute ( array (
	) );
	$result = $stmt->fetchAll ();
	foreach ( $result as $row ) {
		?>
		  <img src=<?php echo substr($row['imageURL'],1)?> alt="Poll image" style="width:304px;height:228px">
<a href="?pagina=poll&id=<?php echo $row['pollId']?>">
		<p><?php echo $row['name']?></p></a>
<br><?php } ?>