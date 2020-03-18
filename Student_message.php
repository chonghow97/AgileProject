<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','#','Student_uploads.php','Student_inbox.php'];
$active_index = 1;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">
		<?php include './include/sidebar.php'; ?>
	</div>
	<div class="col-6 mx-auto">
		<h3>Message</h3>
		<hr>

<?php 

if (isset($_POST['create_message'])) {

    $title = escape_string($_POST['title']);
    $message_tutorId = escape_string($_POST['tutor']);
    $content = escape_string($_POST['content']);
    $date = date('d-m-y');

    if (!empty($title) && !empty($message_tutorId) && !empty($content) && !empty($date)) {
      

    $query = query("INSERT INTO message(title, message_tutorId, content, date) VALUES ('{$title}','{$message_tutorId}','{$content}',now())");
    confirm($query);

    echo "<script>alert('Message is sent!')</script>";
    header("Location: Student_inbox.php");


    } else {

      echo "<script>alert('Fields cannot be empty')</script>";

    }
    
  }

?>


	<form action="" method="post"enctype="multipart/form-data">

  <div class="col">

     <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control">
         
     </div>
 
     	<div class="form-group">
     	<label for="tutor">Tutor</label>
		<select name="tutor" id="">

			<option value="tutor">Select Options</option>
<?php 

$select_tutorId = query("SELECT * FROM tutor");
confirm($select_tutorId);

 while($row = mysqli_fetch_assoc($select_tutorId)){
        $tutorId = $row['tutorId'];
        $username = $row['username'];

        echo "<option value='{$tutorId}'>{$username}</option>";

         }

?>


		</select>

	</div>


<!--       <div class="form-group">
          <label for="date">Date</label>
      <input type="date" name="date" class="form-control">
         
     </div> -->


      <div class="form-group">
          <label for="content">Message</label>
      <textarea type="text" name="content" class="form-control"></textarea>
         
     </div>

    
      <div class="form-group">

      <input type="submit" name="create_message" class="btn btn-outline-dark pull-right" value="Send" >
         
     </div>
  </div>
</form>
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
  
  



