<?php 
$title = "E-learning";
$name = "Admin";
include './include/header.php';
$sidebar = ['Allocation','List'];
$url = ['./Admin_dashboard.php','./Admin_list.php'];
$active_index = 1;
?>
<style type="text/css">
	*{
		/*outline: 1px solid red;*/
	}
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include './include/sidebar.php'; ?>


	</div>
	<div class="col-9">
		<div class="container p-3">
			<h3>List</h3>
			<hr>
      <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Enter Name Here" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
  </div>
</div>
			<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Student</th>
      <th scope="col">Tutor</th>
    </tr>
  </thead>
  <tbody>
      
    	<?php 
      $student_name = "Student";
      $tutor_name = "Tutor";
        for ($i=0; $i < 10; $i++) { 
          echo "<tr> <td><a href='#'>$student_name $i</a></td> <td><a href='#'>$tutor_name $i</a></td> </tr>";
        }
       ?>
  </tbody>
</table>
		</div>

	</div>
</div>
<?php 
include './include/footer.php';
?>

<script type="text/javascript">
	$(function () {
		$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("active bg-dark btn-outline-dark");
	})
</script>
