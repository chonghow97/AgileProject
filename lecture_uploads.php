<?php 
$title = "E-learning";
$name = "lecture"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment','Tutees Dashboard'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php','lecture_tuteeList.php'];
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
					<h3 class="p-3">Assignment</h3>

        <form action="" method="post" enctype="multipart/form-data">

   <?php 
if (isset($_POST['create_upload'])) {

    $topic = escape_string($_POST['topic']);

    if (!empty($topic)) {
      

  $query = query("INSERT INTO uploads(topic) VALUES ('{$topic}')");
  confirm($query);

  echo "<script>alert('Assignment topic is created successfully!')</script>";

    } else {

      echo "<script>alert('Fields cannot be empty')</script>";

    }
    
  }

           ?>

      <div class="form-group border p-3">
        <label for="assignment">Create a Assignment Topic</label>
        <input type="text" name="topic" class="form-control border-primary" placeholder="Create your assignment topic here......">
<br>
        <div class="form-group">
        <button type="submit" name="create_upload" onclick="check_upload()" class="btn btn-outline-primary mb-2">Upload</button>
      </div>
    </div>
    </form>

   <!--  <hr> -->


    <table class="table col-10 mx-auto table-bordered table-hover">
      <thead>
        <tr class="warning p-3">
          <th scope="col">Topic</th>
          <th scope="col">Uploads File</th>
          <th scope="col">Comment</th>
          <th scope="col">Upload date</th>
        </tr>
      </thead>
      <tbody>
<?php 

$query = query("SELECT * FROM uploads ORDER BY upload_id DESC");
confirm($query);

  while($row = mysqli_fetch_assoc($query)){

    $upload_id = $row['upload_id'];
    $topic = $row['topic'];
    $upload = $row['upload'];
    $comment = $row['comment'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);

    echo "<tr>";
    echo "<th>$topic</th>";
    echo "<th><a href='lecture_uploads.php?download={$upload_id}'>$upload</a></th>";
    echo "<th>$comment</th>";
    echo "<th>$date</th>";
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


		});

	</script>

<script type="text/javascript">
	
function create_upload() {
    alert("Upload successfully!");
  }



</script>

