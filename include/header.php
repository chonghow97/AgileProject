<?php 
	include_once 'function.php';
  include_once 'database.php';
?>


<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
</style>

<body class="container">
	<header>
			<nav class="navbar navbar-light">
				<span class="navbar-brand mb-0 h1">E-learning</span>
				<div class="dropdown justify-content-end">
          <?php 
            if(isset($_SESSION['username'])){
              echo "<a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Welcome, {$_SESSION['username']}</a>";
            }
           ?>
  

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="./logout.php">Logout</a>
  </div>
</div>
			</nav>
	</header>