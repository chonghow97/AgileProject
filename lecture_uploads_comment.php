<?php 
$title = "E-learning";
$name = "lecture"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 4;
?>

<style type="text/css">
  *{
    /*outline: 1px solid red;*/
  }
  #studentOut{
    resize: none;
  }
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php include 'include/sidebar.php'; ?>

  </div>

      <div class="col-9 row p-3">
        <div class="col-lg-9">
          <h3 class="p-3">Assignment</h3>

<?php

if (isset($_GET['add'])) {

    $add_the_comment = escape_string($_GET['add']);


$query = query("SELECT * FROM uploads WHERE upload_id = $add_the_comment ");
confirm($query);

while ($row = fetch_assoc($query)) {

  $upload_id = $row['upload_id'];
  $upload_thread_id = $row['upload_thread_id'];
  $username = $row['username'];
  $title = $row['title'];
  $upload = $row['upload'];
  $comment = $row['comment'];
  $date = $row['date'];

}


if (isset($_POST['add_comment'])) {

  $comment = escape_string($_POST['comment']);
  
  $query  = query ("UPDATE uploads SET comment = '{$comment}' WHERE upload_id = '{$add_the_comment}' ");

  confirm($query);

  echo "<p class='text-warning'>Comment Update.<a href='lecture_uploads.php'>View Comment</a></p>";

}

} else {

    header("Location: lecture_uploads.php");
}


?>

      <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group border border-warning p-3">
        <label for="comment">Comment</label>
        <textarea name="comment" values="" class="form-control border-warning" rows="3"><?php echo $comment; ?></textarea>
        <br>
        <div class="form-group">
        <button type="submit" name="add_comment" onclick="check_comment()" class="btn btn-outline-warning mb-2">Upload</button>
      </div>
    </div>
    </form>

        </div>
      </div>
    </div>

<?php include './include/footer.php'; ?>

<script type="text/javascript">
  
function check_comment() {
    alert("Comment added successfully!");
  }


    $(function () {
      $(".alert").hide();
      var TutorName = "";
      //APPERENCE
      $(".navbar").addClass("bg-warning");
      $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");
    });

</script>

