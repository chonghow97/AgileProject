<?php 
$title = "E-learning";
$name = "Student"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 0;
?>

<style type="text/css">
	*{
		/*outline: 1px solid red;*/
	}
	#studentOut{
		resize: none;
	}
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include 'include/sidebar.php'; ?>


	</div>
			<div class="col-9 row p-3">
				<div class="col-lg-6">
					<h3 class="p-3">Meeting Approvement</h3>

	<?php


    $query = query("SELECT * FROM appointment ORDER BY appointment_id DESC");
    confirm($query);

    while ($row = fetch_array($query)) {
    
    $appointment_id = $row['appointment_id'];  
    $username = $row['username'];
    $title = $row['title'];
	$type = $row['type'];
    $venue = $row['venue'];
    $time = $row['time'];
    $comment = $row['comment'];
    $status = $row['status'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);

?>  

					<div class="container border border-warning p-3">
						<div class="container border border-warning mb-3 p-3">
							<div class="row">
								<div class="col">
								<label class="text-primary float-right text-uppercase"><?php echo $username ?></label>
							<h4><?php echo $title ?></h4>
							<label><?php echo $comment ?></label>
							</div>
							<div class="col d-flex justify-content-end p-3">
								<button type="button" class="btn btn-outline-success ml-3">Approve</button>
								<button type="button" class="btn btn-outline-danger">Declined</button>
							</div>
							</div>
							<div class="d-flex justify-content-between">
								<span><?php echo $date ?></span>
								<span><?php echo $time ?></span>
								<span><?php echo $type ?></span>
								<span><?php echo $venue ?></span>
							</div>
						</div>					
					</div>
<?php } ?>	
				</div>

				<div class="col-lg-6">
					<h3 class="p-3">Assignment Approvement</h3>
					<div class="container border border-warning p-3">
						<div class="container border border-warning mb-3 p-3">
							<div class="row">
								<div class="col">
								<h4>Title</h4>
							<label class="text-primary">Student Name</label>
							</div>
							<div class="col d-flex justify-content-end p-3">
								<button type="button" class="btn btn-outline-danger">Declined</button>
								<button type="button" class="btn btn-outline-success ml-3">Approve</button>
							</div>
							</div>
							<div class="d-flex justify-content-between">
								<span>12/12/2020</span>
								<span>Upload</span>
								<span>Coursework</span>
							</div>
						</div>
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
			$(".alert").hide();
			var TutorName = "";
			//APPERENCE
			$("#nav").addClass("bg-warning");
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");


		});

	</script>

