<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 3;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php 
		include './include/sidebar.php'; 
		include './include/lecture-details.php';
		?>
		

	</div>


	<div class="col-9 p-3 row">

		<div class="container p-3">
			<h3>Blog</h3>
		<hr>
			<?php 

				$title = "Unknown";
				$author = "test1";
				for ($i=0; $i < 5; $i++) { 
					echo "<div class='container border border-primary mb-3'> <a href='#'>$title</a><br> <small>By : $author</small> </div>";
				}
			 ?>
			  </div>
	</div>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
	$(function () {
		$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
	})
</script>




