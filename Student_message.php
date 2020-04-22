<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 1;
?>
<style type="text/css">
  #chat{
    bottom: 33px;
  }
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php 
    include 'include/sidebar.php'; 
    //include 'include/lecture-details.php';
    ?>
    

  </div>


  <div class="col-9 row p-3">
    <div class="container border border-primary">
      <!-- conversation -->
      <div class="flex-column mb-3 p-3" style="height: 78vh">

<?php


    $query = query("SELECT * FROM message ");
    confirm($query);

    while ($row = fetch_array($query)) {
      
    $username = $row['username'];
    $message = $row['message'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);

    echo "<h5 class='font-weight-bold text-uppercase' style='color:blue;'>{$username}</h5>";
    echo "<small class='float-right font-weight-bold text-uppercase'>$date</small>";
    echo "<p>{$message}</p>";
    echo "<hr>";
    }

?>       
      </div>
      <!-- chat -->
<?php

if (isset($_POST['submit'])) {

  //$username = escape_string($_POST['username']);
  $message = escape_string($_POST['message']);
  $date = date('d-m-y');

  $query = query("INSERT INTO message(username, message, date) VALUES ('{$_SESSION['username']}',  '{$message}', now())");
  confirm($query);

  echo "<h5 style='color:blue;'>{$_SESSION['username']}</h5>";
  echo "<p>{$message}</p>";
}


?>

      <form class="form-inline mt-3" method="post">
        <div class="form-group mx-sm-3 mb-2">
<!--           <input type="text" name="username" class="form-control border-primary" id="inputPassword2" placeholder="Username" style="width: 50vw">
        </div> -->
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" name="message" class="form-control border-primary" id="inputPassword2" placeholder="Chat here..." style="width: 50vw">
        </div>
        <button type="submit" name="submit" class="btn btn-outline-primary mb-2">Send</button>
      </form>
    </div>
  </div>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
  $(function () {
    $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
  })
</script>

  
  



