<?php 
$title = "E-learning";
$name = "Student"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 4;
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
					<h3 class="p-3">Assignment Approvement</h3>

<?php create_upload(); ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group border p-3">
        <label for="topic">Topic</label>
        <input type="text" name="topic" class="form-control-file">
      </div>
      <div class="form-group border p-3">
        <label for="upload">Please Upload your file</label>
        <input type="file" name="upload" class="form-control-file">
      </div>
      <div class="form-group mx-sm-3 mb-2">
          <input type="text" name="comment" class="form-control border-primary" placeholder="Comment here.." style="width: 52vw; height: 10vw;">
      </div>
        <div class="form-group">
        <button type="submit" name="create_upload" onclick="check_upload()" class="btn btn-outline-primary mb-2">Upload</button>
      </div>
    </form>
    <table class="table col-10 mx-auto table-bordered table-hover">
      <thead>
        <tr class="warning p-3">
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Comment</th>
          <th scope="col">Upload date</th>
          <th scope="col">Status</th>
          <th scope="col">Approve</th>
          <th scope="col">Disapprove</th>
          <th scope="col">Download</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <tbody>
<?php 

$query = query("SELECT * FROM uploads ORDER BY upload_id DESC");
confirm($query);

  while($row = mysqli_fetch_assoc($query)){
    $upload_id = $row['upload_id'];
    $upload = $row['upload'];
    $comment = $row['comment'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);
    $status = $row['status'];

    echo "<tr>";
    echo "<th>$upload_id</th>";
    echo "<th>$upload</th>";
    echo "<th>$comment</th>";
    echo "<th>$date</th>";
    echo "<th>$status</th>";
    echo "<td><a href='lecture_uploads.php?approve={$upload_id}' class='btn btn-outline-success btn-sm' onclick='check_approve()'>Approve</a></td>";
    echo "<td><a href='lecture_uploads.php?disapprove={$upload_id}' class='btn btn-outline-warning btn-sm' onclick='check_disapprove()'>Disapprove</a></td>";
    echo "<td><a href='lecture_uploads.php?download={$upload_id}' class='btn btn-outline-primary btn-sm'>Download</a></td>";
    echo "<td><a href='#' class='btn btn-outline-danger btn-sm' onclick=''>Edit</a></td>";
    echo "</tr>";

}

?>
      </tbody>
    </table>

<?php 

if(isset($_GET['approve'])) {

    $approve_upload_id = $_GET['approve'];
    
    $query = "UPDATE uploads SET status = 'Approved' WHERE upload_id = $approve_upload_id";    
    $approve_query = mysqli_query($connection, $query);
    header("Location: lecture_uploads.php");
}


if(isset($_GET['disapprove'])) {

    $disapprove_upload_id = $_GET['disapprove'];
    
    $query = "UPDATE uploads SET status = 'Disapproved' WHERE upload_id = $disapprove_upload_id";    
    $disapprove_query = mysqli_query($connection, $query);
    header("Location: lecture_uploads.php");
}


if(isset($_GET['delete'])) {

    $delete_upload_id = $_GET['delete'];
    
    $query = "DELETE FROM uploads WHERE upload_id = {$delete_upload_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: lecture_uploads.php");
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
    alert("Upload status approve confirmed!");
  }


function check_disapprove() {
    alert("Upload status disapprove confirmed!");
  }

</script>

