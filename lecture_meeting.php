<?php 
$title = "E-learning";
$name = "Student"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 2;
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
				<div class="col-lg-9">
					<h3 class="p-3">Meeting Approvement</h3>

<table class="table col-10 mx-auto table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Title</th>
            <th>Comment</th>
            <th>Type of Meeting</th>
            <th>Venue</th>
            <th>Time</th>
            <th>Date</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Disapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php 

$query = query("SELECT * FROM appointment ORDER BY appointment_id DESC");
confirm($query);

    while ($row = fetch_array($query)) {
    
    $appointment_id = $row['appointment_id'];  
    $username = $row['username'];
    $title = $row['title'];
    $comment = $row['comment'];
	$meeting_type = $row['meeting_type'];
    $venue = $row['venue'];
    $time = $row['time'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);
    $status = $row['status'];

echo "<tr>";
echo "<td>$appointment_id</td>";
echo "<td>$username</td>";
echo "<td>$title</td>";
echo "<td>$comment</td>";
echo "<td>$meeting_type</td>";
echo "<td>$venue</td>";
echo "<td>$time</td>";
echo "<td>$date</td>";
echo "<td>$status</td>";
echo "<td><a href='lecture_meeting.php?approve=$appointment_id' class='btn btn-outline-success' onclick='check_approve()'>Approve</a></td>";
echo "<td><a href='lecture_meeting.php?disapprove=$appointment_id' class='btn btn-outline-warning' onclick='check_disapprove()'>Disapprove</a></td>";
echo "<td><a href='lecture_meeting.php?delete=$appointment_id' class='btn btn-outline-danger' onclick='check_delete()'>Delete</a></td>";
echo "</tr>";

}


?>

    </tbody>

</table>

<?php 

if(isset($_GET['approve'])) {

    $approve_appointment_id = $_GET['approve'];
    
    $query = "UPDATE appointment SET status = 'Approved' WHERE appointment_id = $approve_appointment_id";    
    $approve_query = mysqli_query($connection, $query);
    header("Location: lecture_meeting.php");
}


if(isset($_GET['disapprove'])) {

    $disapprove_appointment_id = $_GET['disapprove'];
    
    $query = "UPDATE appointment SET status = 'Disapproved' WHERE appointment_id = $disapprove_appointment_id";    
    $disapprove_query = mysqli_query($connection, $query);
    header("Location: lecture_meeting.php");
}


if(isset($_GET['delete'])) {

    $delete_appointment_id = $_GET['delete'];
    
    $query = "DELETE FROM appointment WHERE appointment_id = {$delete_appointment_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: lecture_meeting.php");
}


 ?>


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

<script type="text/javascript">
	
function check_delete() {
    alert("Delete confirmed!");
  }


function check_approve() {
    alert("Meeting status approve confirmed!");
  }


function check_disapprove() {
    alert("Meeting status disapprove confirmed!");
  }

</script>
