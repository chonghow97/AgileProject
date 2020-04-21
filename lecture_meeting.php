<?php 
$title = "E-learning";
$name = "Student"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 2;
?>

<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include 'include/sidebar.php'; ?>


	</div>  
 <div class="col-9 p-3">
       <h3 class="p-3">Meeting Approvement</h3>

       <hr>
       <ul class="list-group mb-3">
          <li class="list-group-item list-group-item-warning pending">Pending</li>
          <?php 
              $query= query("SELECT `date`,`time`,`username`,`title`,`type`,`venue`,`comment` FROM appointment WHERE status='pending'");
            confirm($query);
            while ($row = fetch_array($query)){
              echo "<li class='list-group-item'>
              <table class='col-12'>
             <tr><td>$row[0]</td><td rowspan='2'><b>$row[2]</b></td><td rowspan='2'>$row[3]</td><td>$row[4]</td><td rowspan='2'>$row[6]</td><td rowspan='2'><button onclick='approved'>✔️</button>
           <button onclick='declined'>❌</button></td></tr>
             <tr><td>$row[1]</td><td>$row[5]</td></tr>
           </table>
              </li>";
            }

           ?>

      </ul>
      <ul class="list-group mb-3 col-12">
          <li class="list-group-item list-group-item-success approved">Approved</li>
          <?php 
              $query= query("SELECT `date`,`time`,`username`,`title`,`type`,`venue`,`comment` FROM appointment WHERE status='Approved'");
            confirm($query);
            while ($row = fetch_array($query)){
              echo "<li class='list-group-item'>
              <table class='col-12'>
             <tr><td>$row[0]</td><td rowspan='2'><b>$row[2]</b></td><td rowspan='2'>$row[3]</td><td>$row[4]</td><td rowspan='2'>$row[6]</td></tr>
             <tr><td>$row[1]</td><td>$row[5]</td></tr>
           </table>
              </li>";
            }

           ?>
      </ul>
      <ul class="list-group mb-3 col-12">
          <li class="list-group-item list-group-item-danger declined">Declined</li>
          <?php 
              $query= query("SELECT `date`,`time`,`username`,`title`,`type`,`venue`,`comment` FROM appointment WHERE status='Disapproved'");
            confirm($query);
            while ($row = fetch_array($query)){
              echo "<li class='list-group-item'>
              <table class='col-12'>
             <tr><td>$row[0]</td><td rowspan='2'><b>$row[2]</b></td><td rowspan='2'>$row[3]</td><td>$row[4]</td><td rowspan='2'>$row[6]</td></tr>
             <tr><td>$row[1]</td><td>$row[5]</td></tr>
           </table>
              </li>";
            }

           ?>
      </ul>
</div>
</div>


<?php 
include './include/footer.php';
?>

<script type="text/javascript">
  $(function () {
     $(".navbar").addClass("bg-warning");
     $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");
     
})

</script>
