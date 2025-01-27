<?php 
$title = "E-learning";
$name = "lecture";
include './include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 1;
?>
<style type="text/css">
  *{
    /*outline: 1px solid red;*/
  }
  #studentOut{
    resize: none;
  }
  #text{
    position: absolute;
    bottom: 0;
    left: 0;
  }
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php include 'include/sidebar.php'; ?>


  </div>
  <div class="col-9 row p-3">
    <div class="container border border-warning">
      <!-- conversation -->
      <div class="flex-column mb-3 p-3 overflow-auto" style="height: 78vh">
<?php

    $query = query("SELECT * FROM message");
    confirm($query);

    while ($row = fetch_array($query)) {
      
    $username = $row['username'];
    $message = $row['message'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);

    echo "<h5 class='font-weight-bold text-uppercase text-warning'>{$username}</h5>";
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

  $query = query("INSERT INTO message(username, message, date) VALUES ('{$_SESSION['username']}', '{$message}', now())");
  confirm($query);

  echo "<h5 class='text-warning'>{$_SESSION['username']}</h5>";
  echo "<p>{$message}</p>";
  header("Location: Lecture_message.php");
}


?>

      <form class="form-inline mt-3" method="post">
<!--         <div class="form-group mx-sm-3 mb-2">
          <input type="text" name="username" class="form-control border-warning" id="inputPassword2" placeholder="Username" style="width: 50vw">
        </div> -->
        <div class="form-group mx-sm-3 mb-2 row">
          <div class="col-10">
            <input type="text" name="message" class="form-control border-warning" id="inputPassword2" placeholder="Chat here..." style="width: 50vw">
          </div>
          <div class="col-2">
            <button type="submit" name="submit" class="btn btn-outline-warning mb-2">Send</button>
          </div>
        </div>
        
      </form>
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
  
  



