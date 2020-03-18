<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['Student_dashboard.php','#','Student_meeting.php','#','Student_uploads.php','#','#'];
$active_index = 0;
?>

<div class="container-fluid row">
	<div class="list-group col-3 mt-3">

		<?php include './include/sidebar.php'; ?>
		<div class="fixed-bottom">
			<?php 
				//lecture details
				$L_name = "Stacy";
				$L_Email = "stacy@gamil.com";
				$L_PhoneNumber = "+601236152221";
			 ?>
			<li class="list-group-item active bg-dark btn-outline-dark"><label class="font-weight-bold pr-3 ">TUTOR'S DETAILS</li>
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
			
		</div>


		<div class="col-9">
			<div class="row">
				<!--Inbox -->
				<div class="col mt-3">
					<div class="card" style="width: 18rem;">
						<div class="card-header font-weight-bold">
							Inbox
						</div>
						<ul class="list-group list-group-flush">
							<?php
							$title = "Github";
							$content = "Hello User..";
							$date = "12FEB";
							$Empty = "<li class='list-group-item font-weight-lighter font-italic text-center'>Empty</li>";
							if(1){
								for($x=0;$x<5;$x++){
								echo "<li class='list-group-item'>
								<label class='font-weight-bold'>$title</label>
								<br>
								<small>$content<label class='float-right font-weight-bold text-uppercase'>$date</label></small>
								</li>";
								}
							}else{
								echo $Empty;
							} 
							
							?>
						</ul>
					</div>
				</div>


				<!--Files -->
				<div class="col mt-3">
					<div class="card" style="width: 18rem;">
						<div class="card-header font-weight-bold ">
							Files
						</div>
						<ul class="list-group list-group-flush">
							<?php 
								$file_name = "123.docx";
								$date = "12FEB";
								$url = "#";

								if (1) {
									for ($i=0; $i < 5; $i++) { 
										echo "<li class='list-group-item'><a href='$url'>$file_name</a><b class='float-right'>$date</b></li>";
									}
								}else{
									echo $Empty;
								}
								
								
							 ?>
							
						</ul>
					</div>
				</div>
				<!--Meetings -->
				<div class="col mt-3">
					<div class="card" style="width: 18rem;">
						<div class="card-header font-weight-bold">
							Meetings
						</div>
						<ul class="list-group list-group-flush">

							<?php 
								if(1){
									//pending
									echo "<li class='list-group-item'>Cras justo odio <span class='float-right font-weight-bold font-italic'>Pending</span></li>";

									//approved
									echo "<li class='list-group-item'>Dapibus ac facilisis in <span class='float-right font-weight-bold font-italic text-success'>Approved</span></li>";
									//declined
									echo "<li class='list-group-item'>Vestibulum at eros <span class='float-right font-weight-bold font-italic text-danger'>Declined</span></li>";
								}else{
									//empty
									echo $Empty;
								}
							 ?>

							
							
						</ul>
					</div>
				</div>
				<!--Forums -->
				<div class="col mt-3">
					<div class="card" style="width: 18rem;">
						<div class="card-header font-weight-bold">
							Forums
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Cras justo odio <span class="float-right font-italic">just now</span></li>
							<li class="list-group-item">Cras justo odio <span class="float-right font-italic">just now</span></li>
							<li class="list-group-item">Cras justo odio <span class="float-right font-italic">just now</span></li>
						</ul>
					</div>
				</div>
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




