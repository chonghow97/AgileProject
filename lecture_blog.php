<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment','Tutees Dashboard'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php','lecture_tuteeList.php'];
$active_index = 3;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include 'include/sidebar.php'; ?>
		

	</div>


	<div class="col-9 p-3 row">

		<div class="container p-3">
			<h3>Blog</h3>
		<hr>

<?php

$query = query("SELECT * FROM post ORDER BY post_id DESC");
confirm($query);

 while ($row = fetch_array($query)) {
    
    $post_id = $row['post_id'];  
    $title = $row['title'];  
    $username = $row['username'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);
    $content = $row['content'];


echo "<div class='container border border-primary mb-3'>";
echo "<a href='Lecture_comment_blog.php?pt_id=$post_id '>$title</a>";
echo "<hr>";
echo "<small>By : $username</small>";
echo "<br>";
echo "<small>$date</small>";
echo "<p>$content</p>";
echo "</div>";

 } 

 ?>
		</div>
	</div>
</div>

<?php include './include/footer.php'; ?>


<script type="text/javascript">
		$(function () {
			$(".alert").hide();
			var TutorName = "";
			//APPERENCE
			$("#nav").addClass("bg-warning");
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");
		});
</script>




