<?php 

include './include/function.php';
include './include/database.php';

?>

<?php 

if (isset($_POST['login'])) {
	
	$email = escape_string($_POST['email']);
	$password = escape_string($_POST['password']);

	$query = query("SELECT * FROM student WHERE email = '{$email}' ");
  	confirm($query);

  	while ($row = fetch_array($query)) {
  		
  		$login_id = $row['studId'];
		$login_username = $row['username'];
		$login_password = $row['password'];
		$login_firstname = $row['firstName'];
		$login_lastname = $row['lastName'];
		$login_email = $row['email'];
  	}

if ($email === $login_email && $password === $login_password) {
	
	$_SESSION['username'] = $login_username;
	$_SESSION['firstName'] = $login_firstname;
	$_SESSION['lastName'] = $login_lastname;
	$_SESSION['email'] = $login_email;

	header("Location: Student_dashboard.php");


} else {

	header("Location: index.php");
	
	}


}


 ?>
