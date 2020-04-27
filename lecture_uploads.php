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

      <form action="" method="post" enctype="multipart/form-data">

   <?php create_thread(); ?>

      <div class="form-group border border-warning p-3">
        <label for="assignment">Create a Assignment Topic</label>
        <input type="text" name="thread" class="form-control border-warning" placeholder="Create your assignment topic here......">
        <br>
        <div class="form-group">
        <button type="submit" name="create_thread" onclick="check_upload()" class="btn btn-outline-warning mb-2">Upload</button>
      </div>
    </div>
    </form>

   <hr>

    <table class="table col-12 mx-auto table-bordered table-hover ">
      <thead>
        <tr class="border-warning p-3">
          <th scope="col">No</th>
          <th scope="col">Thread</th>
          <th scope="col">Username</th>
          <th scope="col">Title</th>
          <th scope="col">Uploads File</th>
          <th scope="col">Comment</th>
          <th scope="col">Upload date</th>
          <th scope="col">Comment</th>

        </tr>
      </thead>
      <tbody>    


<?php 

$query = query("SELECT * FROM uploads ORDER BY date DESC");
confirm($query);

  while($row = fetch_assoc($query)){

    $upload_id = $row['upload_id'];
    $upload_thread_id = $row['upload_thread_id'];
    $username = $row['username'];
    $title = $row['title'];
    $upload = $row['upload'];
    $comment = $row['comment'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);

    echo "<tr>";
    echo "<th>$upload_id</th>";

$query = query("SELECT * FROM threads WHERE thread_id = '{$upload_thread_id}' ");
confirm($query);

while($row = fetch_assoc($query)) {

  $thread_id = $row['thread_id'];
  $thread = $row['thread'];

    echo "<th>$thread</th>";
}

    echo "<th>$upload_thread_id</th>";
    echo "<th>$username</th>";
    echo "<th>$title</th>";
    echo "<th><a class='text-warning' href='lecture_uploads.php?download={$upload_id}'>$upload</a></th>";
    echo "<th>$comment</th>";
    echo "<th>$date</th>";
    echo "<th><a href='lecture_uploads_comment.php?add={$upload_id}' class='btn btn-outline-warning btn-sm'>Comment</a></th>";
    echo "</tr>";

}

?>
      </tbody>
    </table>

        </div>
      </div>
    </div>

<?php include './include/footer.php'; ?>

<script type="text/javascript">
  
function create_upload() {
    alert("Thread created successfully!");
  }


    $(function () {
      $(".alert").hide();
      var TutorName = "";
      //APPERENCE
      $(".navbar").addClass("bg-warning");
      $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");
    });

</script>

