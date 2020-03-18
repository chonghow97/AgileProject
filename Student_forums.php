<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','#','Student_uploads.php','Student_inbox.php'];
$active_index = 3;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">
		<?php include './include/sidebar.php'; ?>
	</div>
	<div class="col-9 mx-auto">
		<h3>Forums</h3>
		<hr>
	</div>
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
  
  



