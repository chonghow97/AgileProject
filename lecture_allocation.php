<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Allocation','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['#','lecture_allocation.php','#','#','#','#','#'];
$active_index = 1;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">
		<?php include './include/sidebar.php'; ?>
	</div>
	<div class="col-6 mx-auto">

    <form action="" method="post" >

  <div class="col">

  <div class="form-group">
    <h1>List of Appointment
    <a style="float: right;" class="btn btn-primary" href="lecture_create_allocation.php" >Add New</a>
    </h1>
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
      echo "<td><a href='lecture_allocation.php?delete={$allocateId}' class='btn btn-outline-danger btn-sm' onclick='check_delete()'>Delete</a></td>";
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
    header("Location: lecture_allocation.php");
}


 ?>


</form>
</div>
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

	function check_delete() {
    alert("Delete confirmed!");
  }

</script>
  
  



