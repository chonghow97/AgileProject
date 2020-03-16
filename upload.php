<?php include ('database.php'); ?>
<?php include ('function.php'); ?>

 <!-- Header-->
<?php include ('include/header.php'); ?>

<!-- Navigation  Bar -->
 <?php include ('include/navigation.php'); ?>

  <!-- Sidebar  Bar -->
  <?php include ('include/sidebar.php'); ?>

<?php



?>

<?php create_upload(); ?>

<div class="row">

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="upload">Upload</label>
		<input type="file" name="upload">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_upload" value="Upload" >
	</div>

</form>
<hr>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Upload</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
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
    	echo "<td><a href='upload.php?delete={$upload_id}' class='btn btn-danger' onclick='check_delete()'>Delete</a></td>";
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

<script type="text/javascript">
  
  function check_delete() {
    alert("Delete confirmed!");
  }


</script>



