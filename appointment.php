<?php include ('database.php'); ?>
<?php include ('function.php'); ?>

 <!-- Header-->
<?php include ('include/header.php'); ?>

<!-- Navigation  Bar -->
 <?php include ('include/navigation.php'); ?>

  <!-- Sidebar  Bar -->
  <?php include ('include/sidebar.php'); ?>


<div class="col-md-8">

	<div class="form-group">
    <h1>List of Appointment</h1>
	</div>


<table class="table table-striped">

  <div class="col-xs-4">
    <a class="btn btn-primary" href="createAppointment.php" >Add New</a>
</div>

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Student</th>
      <th scope="col">Tutor</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Venue</th>
      <th scope="col">Comment</th>
    </tr>
  </thead>
  <tbody>

<?php

  $query = query("SELECT * FROM appointment");
  confirm($query);
   
    while($row = mysqli_fetch_assoc($query)){

      $appointment_id = $row['appointment_id'];
    	$name = $row['name'];
    	$tutor = $row['tutor'];
      $date = $row['date'];
      $time = $row['time'];
      $venue = $row['venue'];
      $comment = $row['comment'];
      //$status = $row['status'];

    	echo "<tr>";
      echo "<th scope='row'>$appointment_id</th>";
      echo "<th>$name</th>";
      echo "<th>$tutor</th>";
      echo "<th>$date</th>";
      echo "<th>$time</th>";
      echo "<th>$venue</th>";
      echo "<th>$comment</th>";
      //echo "<th>$status</th>";
      //echo "<td><a href='appointment.php?approve={$appointment_id}' class='btn btn-success'>Approve</a></td>";
    	echo "<td><a href='appointment.php?delete={$appointment_id}' class='btn btn-danger' onclick='check_delete()'>Delete</a></td>";
    	echo "</tr>";

    }


?>

  </tbody>
</table>

</div>

<?php 

if(isset($_GET['delete'])) {

    $delete_appointment_id = $_GET['delete'];
    
    $query = "DELETE FROM appointment WHERE appointment_id = {$delete_appointment_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: appointment.php");
}


 ?>

 <script type="text/javascript">
   
  function check_delete() {
    alert("Delete confirmed!");
  }


 </script>




