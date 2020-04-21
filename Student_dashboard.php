<?php 

$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 0;
?>
 
</div>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">

		<?php 
		include 'include/sidebar.php'; 
		//include 'include/lecture-details.php';
		?>
		
			
		</div>


		<div class="col-9">
			<!-- task -->
				<h3 class="mt-3">Task</h3>
				<br>
			<div class="row">
				<ul class="list-group mb-3 col-xl-6">
					<?php 
						$a = query("SELECT count(appointment_id) FROM appointment WHERE status='Approved'");
						$d = query("SELECT count(appointment_id) FROM appointment WHERE status='Disapproved'");
						$p = query("SELECT count(appointment_id) FROM appointment WHERE status='Pending'");
    					confirm($a,$d,$p);
    					$status = array_merge(mysqli_fetch_row($a),mysqli_fetch_row($d),mysqli_fetch_row($p));
					 ?>
					<li class="list-group-item list-group-item-primary"><a href="./Student_meeting.php">Appointment</a></li>
					<li class="list-group-item">Approved<span class="badge badge-success ml-2"><?php echo  $status[0]?></span></li>
					<li class="list-group-item">Pending<span class="badge badge-warning ml-2"><?php echo  $status[1]?></span></li>
					<li class="list-group-item">Declined<span class="badge badge-danger ml-2"><?php echo  $status[2]?></span></li>
				</ul>
				<ul class="list-group mb-3 col-xl-6">
					<li class="list-group-item list-group-item-primary"><a href="./Student_uploads.php">Assignment</a></li>
					<li class="list-group-item">Overdue<span class="badge badge-danger ml-2">23</span></li>
					<li class="list-group-item">Completed<span class="badge badge-success ml-2">23</span></li>
					<li class="list-group-item">Pending<span class="badge badge-warning ml-2">23</span></li>
				</ul>
			</div>


				<?php 
				include './include/footer.php';
				 ?>
	
	<script type="text/javascript">
		
		$(function () {
			$(".navbar").addClass("bg-primary");
			$(".navbar-brand").addClass("text-white");
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
			$.ajax(){

			}
		})
	</script>