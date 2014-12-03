<?php
if (empty ( $_GET )) {
	echo 'empty get';
	return false;
}
if (! isset ( $_GET ['id'] )) {
	echo 'empty id';
	return false;
}
$stmt = $db->prepare ( 'UPDATE answer SET count = count + 1 WHERE pollId = ? AND questionId = ? AND answerId = ?' );

?>