<?php 
$title = "E-learning";
$name = "lecture";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Allocation','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['#','lecture_allocation.php','#','#','#','#','#'];
$active_index = 1;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3 mt-3">
		<?php include './include/sidebar.php'; ?>
	</div>
	<div class="col-8 mx-auto">
		<h3>Allocate One Tutor to One Student</h3>
		<hr>
    <form action="" method="post" >
          <div class="row">
            <div class="col">
              <h3>Select a Tutor</h3>
              <select style="width: 33%" class="form-control" id="tutorId" name="tutorId">
                <option name="tutorId" value="tutor">Select A Tutor</option>

              <?php 

  $query = query("SELECT * FROM tutor");
  confirm($query);
   
    while($row = mysqli_fetch_array($query)){
      $tutorId = $row['tutorId'];
      $username = $row['username'];

echo "<option value='{$tutorId}'>{$username}</option>";

   }

               ?>

              </select>
            </div>
            
            <div class="col">
              <h3>Select a student</h3>
            <select style='height: 250px; width: 30%; ' size='2' class="form-control" id="studId" name="studId">
              <option name="studId" value="studId">Select A Student</option>

              <?php 

  $query = query("SELECT * FROM student");
  confirm($query);
   
    while($row = mysqli_fetch_array($query)){
      $studId = $row['studId'];
      $username = $row['username'];


echo "<option value='{$studId}'>{$username}</option>";


   }

              ?>

            </select>
            </div>
          </div>

<div class="row"><button type="submit" name="create_allocation" onclick="show_confirm()" value="show confirm box" class="btn btn-primary float-left">Assign</button>

          <?php 


  if(isset($_POST['create_allocation'])){

    $allocate_tutorId = escape_string($_POST['tutorId']);
    $allocate_studId = escape_string($_POST['studId']);


      if (!empty($allocate_tutorId) && !empty($allocate_studId)) {

$query = query("INSERT INTO allocate(allocate_tutorId, allocate_studId) VALUES ('{$allocate_tutorId}','{$allocate_studId}')");

confirm($query);

echo "<script>alert('Assign confirmed!')</script>";
      
      } 

else {

  echo "<script>alert('Select assign!')</script>";
}

echo "<p> Tutor {$allocate_tutorId} is assign to student {$allocate_studId}.</p> <a href='lecture_allocation.php'>View List Allocated</a> ";
}

          ?>

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
  
  



