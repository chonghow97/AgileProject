<?php 
$title = "E-learning";
$name = "Admin";
include './include/header.php';
$sidebar = ['Allocation','List of Dashboard'];
$url = ['./Admin_dashboard.php','./Admin_list.php'];
$active_index = 1;
?>

<style type="text/css">
  *{
    /*outline: 1px solid red;*/
  }
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php include './include/sidebar.php'; ?>


  </div>
  <div class="col-9">
    <div class="container p-3">
      <h3>List</h3>
      
<div class="row">
  <div class="col-md-6">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Student</th>
    </tr>
  </thead>
  <tbody>
      
<?php 

$query = query("SELECT * FROM student ORDER BY studId DESC");
confirm($query);

 while ($row = fetch_array($query)) {
    
    $studId = $row['studId'];  
    $username = $row['username'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];

echo "<tr>";
echo "<td><a href='student_dashboard.php?id=$studId'>$firstName "." $lastName</td>";
echo "</tr>";

}
       ?>
  </tbody>
</table>

</div>

  <div class="col-md-6">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Tutor</th>
    </tr>
  </thead>
  <tbody>
      
<?php 

$query = query("SELECT * FROM tutor ORDER BY tutorId DESC");
confirm($query);

 while ($row = fetch_array($query)) {
    
    $tutorId = $row['tutorId'];  
    $username = $row['username'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];

echo "<tr>";
echo "<td><a href='lecture_dashboard.php?id=$tutorId'>$firstName "." $lastName</td>";
echo "</tr>";

}
       ?>
  </tbody>
</table>
</div>
</div>


    </div>

  </div>
</div>
<?php 
include './include/footer.php';
?>

<script type="text/javascript">
  $(function () {
   //apperance

		$("nav:nth(0)").addClass("bg-dark");
		$("nav:nth(0)>span").addClass("text-white");
		$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-dark");
  })
</script>
