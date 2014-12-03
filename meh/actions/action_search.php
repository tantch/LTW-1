<?php
function search() {
	$db = new PDO ( 'sqlite:../database.db' );
	$stmt = $db->prepare ( 'SELECT * FROM poll WHERE name LIKE ? AND private = 0' );
	$stmt->execute ( array (
			'%'.$_GET ['pollsearch'].'%' 
	) );
	$result = $stmt->fetchAll ();
	foreach ( $result as $row ) {
		?>
		<?php echo $row['name']?>
<br>
<?php
	}
}
search ();?>