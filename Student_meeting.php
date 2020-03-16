<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['#','#','#','#','#','#','#'];
$active_index = 2;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">
		<?php include './include/sidebar.php'; ?>
	</div>
	<div class="col-6 mx-auto">
		<h3>Meetings</h3>
		<hr>
		<form action="" method="post" >

  <div class="col">

     <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control">
         
     </div>
 
      <div class="form-group">
          <label for="tutor">Tutor</label>
      <input type="text" name="tutor" class="form-control"   >
         
     </div> 


      <div class="form-group">
          <label for="date">Date</label>
      <input type="date" name="date" class="form-control">
         
     </div>


      <div class="form-group">
          <label for="time">Time</label>
      <input type="time" name="time" class="form-control">
         
     </div>
 
      <div class="form-group">
          <label for="venue">Venue</label>
      <input type="text" name="venue" class="form-control">
         
     </div> 


      <div class="form-group">
          <label for="comment">Comment</label>
      <textarea type="text" name="comment" class="form-control"></textarea>
         
     </div>

    
      <div class="form-group">

      <input type="submit" name="create_appointment" class="btn btn-outline-dark pull-right" value="Appointment" onclick="check_appointment()">
         
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
	function check_appointment() {
    alert("Appointment confirmed!");
  }

</script>
  
  



