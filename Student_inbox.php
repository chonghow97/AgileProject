<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','#','Student_uploads.php','Student_inbox.php'];
$active_index = 5;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">
		<?php include './include/sidebar.php'; ?>
	</div>
	<div class="col-6 mx-auto">
		<h3>Inbox</h3>
		<hr>
<?php

$query = query("SELECT * FROM message");
confirm($query);

while($row = mysqli_fetch_assoc($query)){
    $message_id = $row['message_id'];
    $title = $row['title'];
    $message_tutorId = $row['message_tutorId'];
    $content = $row['content'];
    $date = $row['date'];

?>

    <div class="col-9">
      <div class="row">
        <!--Inbox -->
        <div class="col mt-3">
          <div class="card" style="width: 35rem;">
            <div class="card-header font-weight-bold">
              Inbox
            </div>
            <ul class="list-group list-group-flush">
              <?php
              // if(1){
              //   for($x=0;$x<5;$x++){
                echo "<li class='list-group-item'>";
                echo "<label class='font-weight-bold'>$title</label>";
                echo "<label class='float-right font-weight-bold text-uppercase'>$date</label>";
                echo"<br>";
                echo"<small>$content
                     <label class='float-right font-weight-bold text-uppercase'>
                     <a href='Student_inbox.php?delete={$message_id}' class='btn btn-outline-danger btn-sm' onclick='check_delete()'>Delete</a></label>
                     </small>
                </li>";
              //   }
              // }else{
                
              // } 
              
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
<?php } ?>

<?php 

if(isset($_GET['delete'])) {

  $delete_message_id = $_GET['delete'];

  $query = "DELETE FROM message WHERE message_id = {$delete_message_id} ";
  $delete_query = mysqli_query($connection, $query);
  header("Location: Student_inbox.php");

}


?>

 <script type="text/javascript">
   
  function check_delete() {
    alert("Delete confirmed!");
  }


 </script>

	</div>
</div>
<div class="fixed-bottom">
	<?php 
				//lecture details
	$L_name = "Stacy";
	$L_Email = "stacy@gamil.com";
	$L_PhoneNumber = "+601236152221";
	?>
	<li class="list-group-item active bg-dark btn-outline-dark"><label class="font-weight-bold pr-3">TUTOR'S DETAILS</label></li>
	<?php 
	if(0){
		echo "
		<li class='list-group-item'><label class='font-weight-bold pr-3'>Name:</label>$L_name</li>
		<li class='list-group-item'><label class='font-weight-bold pr-3'>Email:</label>$L_Email</li>
		<li class='list-group-item'><label class='font-weight-bold pr-3'>Subject:</label>$L_PhoneNumber</li>
		";
	}else{
		echo "<li class='list-group-item'><label class='font-weight-bold pr-3'>Unassigned</li>";
	}
	?>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
	$(function () {
		$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("active bg-dark btn-outline-dark");
	})

</script>
  
  



