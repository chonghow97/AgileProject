<?php 
$title = "E-learning";
$name = "Lecture";
// include './include/function.php';
// include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['./lecture_dashboard.php','lecture_message.php','#','#','#'];
$active_index = 1;
?>
<style type="text/css">
	*{
		/*outline: 1px solid red;*/
	}
	#studentOut{
		resize: none;
	}
	#text{
		position: absolute;
		bottom: 0;
		left: 0;
	}
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include './include/sidebar.php'; ?>


	</div>
	<div class="col-9 row p-3">
		<div class="container border border-primary">
			<!-- conversation -->
			<div class="d-flex align-items-end flex-column mb-3 p-3" style="height: 78vh">
<?php

  	$query = query("SELECT * FROM message");
    confirm($query);

    while ($row = fetch_array($query)) {
      
    $username = $row['username'];
    $message = $row['message'];

    echo "<h4>{$_SESSION['username']}</h4>";
    echo "<p class='border border-primary p-2 text-primary rounded-sm mb-3'>{$message}</p>";

    }

?>				
			</div>
			<!-- chat -->
<?php

if (isset($_POST['submit'])) {

	$message = escape_string($_POST['message']);
	$date = date('d-m-y');

	$query = query("INSERT INTO message(username, message, date) VALUES ('{$_SESSION['username']}', '{$message}', now())");
	confirm($query);

	echo "<h4 style='color:blue;'>{$_SESSION['username']}</h4>";
	echo "<p>{$message}</p>";
}


?>

			<form class="form-inline mt-3" method="post">
				<div class="form-group mx-sm-3 mb-2">
					<input type="text" name="message" class="form-control border-primary" id="inputPassword2" placeholder="Chat here..." style="width: 50vw">
				</div>
				<button type="submit" name="submit" class="btn btn-outline-primary mb-2">Send</button>
			</form>
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
