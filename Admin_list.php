<?php 
$title = "E-learning";
$name = "Admin";
include './include/header.php';
$sidebar = ['Allocation','List'];
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
      <hr>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lecture</th>
      <th scope="col">Student</th>
    </tr>
  </thead>
  <tbody>
      <?php 
        $stu = "Student";
        $count = 5;
        for ($i=1; $i < 10; $i++) { 
          echo "<tr><th scope='row' rowspan='$count'>$i</th>
              <td rowspan='$count'><a href='#'>Mark</a></td>
              <td><a href='#'>$stu</a></td>";
        for ($j=0; $j < $count-1; $j++) { 
          echo"<tr> <td><a href='#'>$stu</a></td> </tr>";
        }
        echo "</tr>";
        }
        
       ?>
  </tbody>
</table>
    </div>

  </div>
</div>
<?php 
include './include/footer.php';
?>

<script type="text/javascript">
  $(function () {
    $("#nav").addClass("bg-dark");
      $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-dark");
  })
</script>
