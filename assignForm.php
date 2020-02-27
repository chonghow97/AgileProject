<?php
  include ('database.php');
?>

<!DOCTYPE html>
<html lang="em">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="li-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assign</title>
<link rel="stylesheet" href="include/bootstrap.min.css">
<script type="text/javascript" src="include/jquery.min.js"></script>
  </head>

<style type="text/css">
    
#content{
  padding: 10px;
}

</style>

  <body>
    <!-- Navigation  Bar -->
<body>
    <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">E-learning</span>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Admin</a>
      </li>
    </ul>
</nav>
 <!-- Sidebar  Bar -->
<div class="row">
  <div class="col-3">
    <nav class="nav flex-column">
  <a class="nav-link active disabled bg-primary text-white" href="#">Dashboard</a>
  <a class="nav-link disabled" href="#">Allocation</a>
  <a class="nav-link" href="#">Example</a>
  <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Example 2</a>
</nav>
</div>

<div class="col ">
  <p><h1 class="text-center">Assign One Tutor for One Student</h1></p>
    <div class="row ">
<form class="row" action="assignForm.php" method="post">
      <div class="column p-3">
        <h3>Select a Tutor</h3>
        <select class="form-control" id="tutor" name="tutor">
            <option name="tutor" value="tutor">Select A Tutor</option>
            <?php
              $query = "SELECT * FROM tutor";
              $sql = mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($sql)){
              echo '<option value="'.$row['tutorId'].'">'.$row['name'].'</option>';
            }
            ?>
          </select>
      </div>
      
      <div class="column p-3">
        <h3>Select a student</h3>
        <select style='height: 250px; width: 300px; ' size='2' class="form-control" id="student" name="student">
            <?php
              $query = "SELECT * FROM student";
              $sql = mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($sql)){
              echo '<option value="'.$row['studentId'].'">'.$row['name'].'</option>';
            }
            ?>
          </select>
      </div>
    </div>
    <div class="row"><button type="submit" name="submit" value="Assign" class="btn btn-primary float-left">Assign</button>
      <?php
  if (isset($_POST['submit'])) {
    $tutor=$_POST['tutor'];
    $student=$_POST['student'];

    echo "<p class='mt-3 ml-3'>Tutor ".$tutor." is assign to student ".$student.".</p>";
   }

?>

    </div>
      
      
  </div>
  </div>
  
</div>
  </body>
</html>
