<?php include ('./include/database.php'); ?>
<?php include ('./include/function.php'); ?>


 <!-- Header-->
<?php include ('include/header.php'); ?>

<!-- Navigation  Bar -->
 <?php include ('include/navigation.php'); ?>

  <!-- Sidebar  Bar -->
  <?php include ('include/sidebar.php'); ?>

  <div class="col-md-8">
          <h1>List of assigned Tutors and Students</h1>
  <div class="col-xs-4">
    <a class="btn btn-primary" href="assignForm.php" >Add New</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tutors</th>
      <th scope="col">Students</th>
    </tr>
  </thead>
  <tbody>
<?php

  $query = query("SELECT * FROM allocate");
  confirm($query);
   
    while($row = mysqli_fetch_assoc($query)){

      $allocateId = $row['allocateId'];
      $allocate_tutorId = $row['allocate_tutorId'];
      $allocate_studId = $row['allocate_studId'];

      echo "<tr>";
      echo "<th scope='row'>$allocateId</th>";
      echo "<th>$allocate_tutorId</th>";
      echo "<th>$allocate_studId</th>";
      echo "<td><a href='allocate.php?delete={$allocateId}' class='btn btn-danger' onclick='check_delete()'>Delete</a></td>";
      echo "</tr>";

    }


?>
  </tbody>
</table>
  </div>

<?php 

if(isset($_GET['delete'])) {

    $delete_allocate_id = $_GET['delete'];
    
    $query = "DELETE FROM allocate WHERE allocateId = {$delete_allocate_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: allocate.php");
}


 ?>

 <script type="text/javascript">
   
  function check_delete() {
    alert("Delete confirmed!");
  }


 </script>



