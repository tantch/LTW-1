<?php 
function search() {
	$db = new PDO ( 'sqlite:../database.db' );
	$stmt = $db->prepare ( 'SELECT * FROM poll WHERE name LIKE ? AND private = 0' );
	$stmt->execute ( array (
			'%' . $_GET ['pollsearch'] . '%' 
	) );
	$result = $stmt->fetchAll ();
	foreach ( $result as $row ) {
		?>
<a href="?pagina=poll&id=<?php echo $row['pollId']?>">
		<?php echo $row['name']?></a>
<br>
<?php
	}
}
search ();
?>