<?php 

include './include/function.php';
include './include/database.php';

?>

<?php 

	$_SESSION['username'] = null;
	$_SESSION['firstName'] = null;
	$_SESSION['lastName'] = null;
	$_SESSION['email'] = null;

	header("Location: index.php");



 ?>
