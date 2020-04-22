<?php 
$title = "E-learning";
$name = "Student"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment','Tutees Dashboard'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php','lecture_tuteeList.php'];
$active_index = 2;
?>

<style type="text/css">
	*{
		/*outline: 1px solid red;*/
	}
	#studentOut{
		resize: none;
	}
    td{
        color: #3d3d3d;
    }
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include 'include/sidebar.php'; ?>


	</div>  
			<div class="col-9 row p-3 mx-auto">
				<div class="col-lg-9">
					<h3 class="p-3">Meeting Approvement</h3>
<div class="overflow-auto mx-auto">
<table class="table table-bordered table-hover overflow-auto">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Title</th>
            <th>Comment</th>
            <th>Venue</th>
            <th>Action</th>
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
	$type = $row['type'];
    $venue = $row['venue'];
    $time = $row['time'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);
    $status = $row['status'];

if($status == 'Approved'){
    echo '<tr style="background-color:#03fcc2">';
}elseif($status == 'Disapproved'){
    echo '<tr style="background-color:#de5d93">';
}
else{
    echo '<tr>';
}
echo "<td>$appointment_id</td>";
echo "<td><b>$username<b></td>";
echo "<td>$title</td>";
echo "<td>$comment</td>";
echo "<td><b>$venue ($type)</b><br> $time <br> $date</td>";
echo "<td style='width: 110px'><div class='row mx-auto'><a href='lecture_meeting.php?approve=$appointment_id' class='btn btn-outline-dark btn-sm' onclick='check_approve()'>✔️</a>
<a href='lecture_meeting.php?disapprove=$appointment_id' class='btn btn-outline-dark btn-sm ml-1' onclick='check_disapprove()'>❌</a></div></td>";
echo "</tr>";

}


?>

    </tbody>

</table>
</div>
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
			$(".navbar").addClass("bg-warning");
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");
            function check_approve() {
            alert("Meeting status approve confirmed!");
        }


        function check_disapprove() {
            alert("Meeting status disapprove confirmed!");
        }
        });

	
        

</script>
