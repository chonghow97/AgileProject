<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
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
<form class="col" action="Student_create_blog.php" method="post" enctype="">
 <button type="submit" class="btn btn-outline-primary form-group" value="create_article">Add Article</button>
</form>

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
    $content = substr($row['content'],0, 200);


echo "<div class='container border border-primary mb-3'>";
echo "<h4><a href='Student_comment_blog.php?pt_id=$post_id '>$title</a></h4>";
echo "<hr>";
echo "<small>By : $username</small>";
echo "<br>";
echo "<small>$date</small>";
echo "<p>$content....</p>";
echo "</div>";

 } 

 ?>
		</div>
	</div>
</div>

<?php include './include/footer.php'; ?>


<script type="text/javascript">
	$(function () {
		$(".navbar").addClass("bg-primary");
			$(".navbar-brand").addClass("text-white");
		$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
	})
</script>




