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
    <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 h1">E-learning</span>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Admin</a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <div class="row">
        <h1 class="text-center">Assign One Tutor for One Student</h1>
      </div>

    <form class="row" action="assignForm.php" method="post">
      <div class="form-group">
        <label>Tutor</label>
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
          <br>
        <label>Student</label>
          <select class="form-control" id="student" name="student">
            <option name="student" value="student">Select A Student</option>
            <?php
              $query = "SELECT * FROM student";
              $sql = mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($sql)){
              echo '<option value="'.$row['studentId'].'">'.$row['name'].'</option>';
            }
            ?>
          </select>
          <br>
          <div>
            <input type="submit" name="submit" value="Assign"/>
          </div>
<br>

<?php
  if (isset($_POST['submit'])) {
    $tutor=$_POST['tutor'];
    $student=$_POST['student'];

    echo "Tutor ".$tutor." is assign to student ".$student.".";
   }

?>

      </div>
    </form>
    </div>
  </body>
</html>
