<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 5;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php 
    include './include/sidebar.php'; 
    //include './include/lecture-details.php';
    ?>
    

  </div>


  <div class="col-9 row p-3">
    <div class="container">
<?php create_appointment(); ?>
      <!-- Inbox -->
      <h3>Inbox</h3>
		<hr>
<?php

$query = query("SELECT * FROM message");
confirm($query);

while($row = mysqli_fetch_assoc($query)){
    $message_id = $row['message_id'];
    $username = $row['username'];
    $message = $row['message'];
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
              if(1){
                for($x=0;$x<1;$x++){
                echo "<li class='list-group-item'>";
                echo "<label class='font-weight-bold'>$username</label>";
                echo "<label class='float-right font-weight-bold text-uppercase'>$date</label>";
                echo"<br>";
                echo"<small>$message
                     <label class='float-right font-weight-bold text-uppercase'>
                     <a href='Student_inbox.php?delete={$message_id}' class='btn btn-outline-danger btn-sm' onclick='check_delete()'>Delete</a></label>
                     </small>
                </li>";
                }
              }else{
                
              } 
              
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

 </div>
  </div>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
  $(function () {
    $(".navbar").addClass("bg-primary");
      $(".navbar-brand").addClass("text-white");
    $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
  })
</script>



