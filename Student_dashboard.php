<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 0;
?>
 
<!-- toast -->
<div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
  <a href="#">New Message From<strong>{Lecture Name}</strong></a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">

		<?php 
		include 'include/sidebar.php'; 
		//include 'include/lecture-details.php';
		?>
		
			
		</div>


		<div class="col-9 row">
			<!-- task -->
			<div class="p-3 col-lg-6">
				<h3>Task</h3>
				<!-- yellow -->
	<?php

    $query = query("SELECT * FROM appointment WHERE status LIKE '%pending%' ORDER BY appointment_id DESC");
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

				<ul class="list-group col">
				  <li class="list-group-item list-group-item-warning">Pending</li>
				  <?php	for ($i=0; $i < 1; $i++) { 
				  		echo "<li class='list-group-item'>$title</li>";
				  	} ?>
				</ul>
<?php } ?>	

<hr>

<?php

    $query = query("SELECT * FROM appointment WHERE status LIKE '%Disapproved%' ORDER BY appointment_id DESC");
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

				<ul class="list-group col">
				  <li class="list-group-item list-group-item-danger">Disapproved</li>
				  <?php	for ($i=0; $i < 1; $i++) { 
				  		echo "<li class='list-group-item'>$title</li>";
				  	} ?>
				</ul>
<?php } ?>

<hr>

<?php

    $query = query("SELECT * FROM appointment WHERE status LIKE '%Approved%' ORDER BY appointment_id DESC");
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

				<ul class="list-group col">
				  <li class="list-group-item list-group-item-success">Approved</li>
				  <?php	for ($i=0; $i < 1; $i++) { 
				  		echo "<li class='list-group-item'>$title</li>";
				  	} ?>
				</ul>
<?php } ?>

			</div>

			<!-- blog -->
			<div class="p-3 col-lg-6">
				<h3>Blog</h3>
				<ul class="list-group">
				  <?php 
				  	$title = "Title 1";
				  	$author = "sample 1";
				  	for ($i=0; $i < 5; $i++) { 
				  		echo "<li class='list-group-item'><a href='#'>$title</a><br><small>By: $author</small></li>";
				  	}
				   ?>

				</ul>
			</div>
		</div>
	</div>
	<?php 
	include './include/footer.php';
	?>
	<script type="text/javascript">
		$("#nav").addClass("bg-primary");
		$(function () {
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
		})
	</script>