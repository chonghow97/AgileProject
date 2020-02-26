<?php
	define ('SERVER', 'localhost');
	define ('USER' , 'root');
	define ('PASSWORD' , '');
	define ('DATABASE' , 'e-learning');
	
  $conn = mysqli_connect('localhost', 'root', '', 'e-learning');
	if (mysqli_connect_errno()) {
		echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
	}
?>
