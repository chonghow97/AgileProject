<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['#','#','#','#','#','#','#'];
$active_index = 4;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">
		<?php include './include/sidebar.php'; ?>
	</div>
	<div class="col-9 mx-auto">
		<h3>Files / uploads</h3>
		<hr>
		<form>
  <div class="form-group border p-3">
    <label for="exampleFormControlFile1">Please Upload your file</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <div class="form-group">
		<input class="btn btn-outline-dark" type="submit" name="create_upload" value="Upload" onclick="check_upload()">
	</div>
</form>
<hr>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Upload</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php

$query = query("SELECT * FROM uploads");
confirm($query);
   
    while($row = mysqli_fetch_assoc($query)){
    	$upload_id = $row['upload_id'];
    	$upload = $row['upload'];
    	$date = $row['date'];

    	echo "<tr>";
      	echo "<th scope='row'>$upload_id</th>";
      	echo "<th>$upload</th>";
      	echo "<th>$date</th>";
    	echo "<td><a href='upload.php?delete={$upload_id}' class='btn btn-danger'>Delete</a></td>";
    	echo "</tr>";

    }


?>
  </tbody>
</table>
<?php 

if(isset($_GET['delete'])) {

    $delete_upload_id = $_GET['delete'];
    
    $query = "DELETE FROM uploads WHERE upload_id = {$delete_upload_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: upload.php");
}


 ?>
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
	function check_appointment() {
    alert("Appointment confirmed!");
  }

</script>
  
  



