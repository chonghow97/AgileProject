<?php
include ('database.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style type="text/css">
  #content{
    padding: 10px;
  }
</style>
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
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Allocation</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">List</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
      </div>
    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <!-- Allocation -->
        <form action="assignForm.php" method="post">
          <h3 class=" p-3">Assign One Tutor for One Student</h3>
          <div class="row">
            <div class="col">
              <h3>Select a Tutor</h3>
              <select style="width: 33%" class="form-control" id="tutor" name="tutor">
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
            <div class="col">
              <h3>Select a student</h3>
            <select style='height: 250px; width: 30%; ' size='2' class="form-control" id="student" name="student">
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
        </form>
  </div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <h1>List of assigned Tutors and Students</h1>
        <hr>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tutors</th>
      <th scope="col">Students</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Jazz</td>
      <td>Sally</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Ram</td>
      <td>Susan</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Liza</td>
      <td>Sam</td>
    </tr>
  </tbody>
</table>
  </div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">
  console.log($("#select1.value"));
</script>
</body>
</html>