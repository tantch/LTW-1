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
		<div>
		  <img src=<?php echo substr($row['imageURL'],1)?> alt="Poll image" style="width:304px;height:228px">
		<?php echo $row['name']?>
		</div>
	</a>

<br>
<?php
	}
}
search ();
?>