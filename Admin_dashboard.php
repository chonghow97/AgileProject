<?php 
$title = "E-learning";
$name = "Admin";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Allocation','List'];
$url = ['./Admin_dashboard.php','./Admin_list.php'];
$active_index = 0;
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
			<h3>Allocation</h3>
			<hr>
			<form action="Admin_dashboard.php" method="post">
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Lecture</label>
					<div class="col-sm-10">
						<select class="custom-select">
							<option selected>Select A Tutor</option>
							<?php get_tutor(); ?>
						</select>
					</div>
				</div>

				<div class="form-group row ">
					<label for="staticEmail" class="col-sm-2 col-form-label">Student</label>
					<div class="col-sm-10">
						<div class="p-3">
							<input type="" name="" class="col-9" placeholder="Search">
						</div>
						<div class="overflow-auto row p-3 border mx-auto" style="height: 23rem">
							<?php
								get_student(); 
							 ?>
							
						</div>

					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-outline-dark col-3">Submit</button>
				</div>
				</form>
			</div>
			<fieldset disabled>
				<div class="row">
					<div class="text-center p-3 col-3">
				<input type="text" id="disabledTextInput" class="form-control" placeholder="Lecture Name here">
			</div>
			<div class="text-center p-3 col-8">
				<input type="text" id="disabledTextInput" class="form-control" placeholder="Student Name here">
			</div>
				</div>
			
			</fieldset>
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
