<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['#','#','Student_meeting.php','#','#','#','#'];
$active_index = 2;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
  <div class="list-group col-3 mt-3">
    <?php include './include/sidebar.php'; ?>
  </div>
  <div class="col-6 mx-auto">
    <h3>Meetings</h3>
    <hr>
    <form action="" method="post" >

  <div class="col">

  <div class="form-group">
    <h1>List of Appointment
    <a style="float: right;" class="btn btn-primary" href="Student_create_meeting.php" >Add New</a>
    </h1>
  </div>



<table class="table table-striped">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Student</th>
      <th scope="col">Tutor</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Venue</th>
      <th scope="col">Comment</th>
      <th scope="col">Status</th>
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
      $status = $row['status'];

      echo "<tr>";
      echo "<th scope='row'>$appointment_id</th>";
      echo "<th>$name</th>";
      echo "<th>$tutor</th>";
      echo "<th>$date</th>";
      echo "<th>$time</th>";
      echo "<th>$venue</th>";
      echo "<th>$comment</th>";
      echo "<th>$status</th>";
      echo "<td><a href='Student_meeting.php?approve={$appointment_id  }' class='btn btn-success'>Approve</a></td>";
      echo "<td><a href='Student_meeting.php?disapprove={$appointment_id}' class='btn btn-warning'>Disapprove</a></td>";
      echo "<td><a href='Student_meeting.php?delete={$appointment_id}' class='btn btn-danger' onclick='check_delete()'>Delete</a></td>";
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
    
    header("Location: Student_meeting.php");
}


 ?>

 <script type="text/javascript">
   
  function check_delete() {
    alert("Delete confirmed!");
  }


 </script>


</form>
  </div>
</div>
<div class="fixed-bottom">
  <?php 
        //lecture details
  $L_name = "Stacy";
  $L_Email = "stacy@gamil.com";
  $L_PhoneNumber = "+601236152221";
  ?>
  <li class="list-group-item active bg-dark btn-outline-dark"><label class="font-weight-bold pr-3">TUTOR'S DETAILS</label></li>
  <?php 
  if(0){
    echo "
    <li class='list-group-item'><label class='font-weight-bold pr-3'>Name:</label>$L_name</li>
    <li class='list-group-item'><label class='font-weight-bold pr-3'>Email:</label>$L_Email</li>
    <li class='list-group-item'><label class='font-weight-bold pr-3'>Subject:</label>$L_PhoneNumber</li>
    ";
  }else{
    echo "<li class='list-group-item'><label class='font-weight-bold pr-3'>Unassigned</li>";
  }
  ?>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
  $(function () {
    $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("active bg-dark btn-outline-dark");
  })
  // function check_appointment() {
 //    alert("Appointment confirmed!");
 //  }

</script>
  
  



