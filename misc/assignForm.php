<?php include ('database.php'); ?>
<?php include ('function.php'); ?>


 <!-- Header-->
<?php include ('include/header.php'); ?>

<!-- Navigation  Bar -->
 <?php include ('include/navigation.php'); ?>

  <!-- Sidebar  Bar -->
  <?php include ('include/sidebar.php'); ?>

    <div class="col-9">

        <!-- Allocation -->
        <form action="assignForm.php" method="post" enctype="multipart/form-data">
          <h3 class=" p-3">Assign One Tutor for One Student</h3>
          <div class="row">
            <div class="col">
              <h3>Select a Tutor</h3>
              <select style="width: 33%" class="form-control" id="tutor" name="tutorId">
                <option name="tutor" value="tutor">Select A Tutor</option>

              <?php 

  $query = query("SELECT * FROM tutor");
  confirm($query);
   
    while($row = mysqli_fetch_array($query)){
      $tutorId = $row['tutorId'];
      $username = $row['username'];

echo "<option value='{$tutorId}'>{$username}</option>";

   }

               ?>

              </select>
            </div>
            <div class="col">
              <h3>Select a student</h3>
            <select style='height: 250px; width: 30%; ' size='2' class="form-control" id="student" name="studId">
              <option name="student" value="student">Select A Student</option>

              <?php 

  $query = query("SELECT * FROM student");
  confirm($query);
   
    while($row = mysqli_fetch_array($query)){
      $studId = $row['studId'];
      $username = $row['username'];


echo "<option value='{$studId}'>{$username}</option>";


   }

              ?>

            </select>
            </div>
          </div>
<!-- 
  <script type="text/javascript">
    function show_confirm(){
      var r=confirm("Do you want to assign selected option?");
      if (r==true) {
        alert("Assign confirmed");
      }
      else {
        alert("Assign option is cancel!");
      }
    }

  </script> -->


<div class="row"><button type="submit" name="submit" onclick="show_confirm()" value="show confirm box" class="btn btn-primary float-left">Assign</button>

          <?php 


  if(isset($_POST['submit'])){

    $allocate_tutorId = escape_string($_POST['tutorId']);
    $allocate_studId = escape_string($_POST['studId']);


      if (!empty($allocate_tutorId) && !empty($allocate_studId)) {

$query = query("INSERT INTO allocate(allocate_tutorId, allocate_studId) VALUES ('{$allocate_tutorId}','{$allocate_studId}')");

confirm($query);

echo "<script>alert('Assign confirmed!')</script>";
      
      } 

else {

  echo "<script>alert('Select assign!')</script>";
}

echo "<p> Tutor {$allocate_tutorId} is assign to student {$allocate_studId}.</p> <a href='allocate.php'>View List Allocated</a> ";
}

          ?>

        </div>
        </form>
  </div>
