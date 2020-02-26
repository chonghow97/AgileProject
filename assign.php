<?php
  include ('database.php');

    if (isset($_POST['submit'])) {
      $tutor=$_POST['tutor'];
      $student=$_POST['student'];

      echo "Tutor ".$tutor." is assign to student ".$student.".";
    }

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
        <h1 class="text-center">List of assigned Tutors and Students</h1>
      </div>

      <table border="1">
        <thead>
          <th>No</th>
          <th>Tutors</th>
          <th>Students</th>
        </thead>
        <tr>
          <td>1</td>
          <td>Jazz</td>
          <td>Sally</td>
        </tr>

        <tr>
          <td>2</td>
          <td>Ram</td>
          <td>Susan</td>
        </tr>

        <tr>
          <td>3</td>
          <td>Liza</td>
          <td>Sam</td>
        </tr>
      </table>

      </div>
  </body>
</html>
