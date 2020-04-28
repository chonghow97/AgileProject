<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 4;
?>
<style type="text/css">
  #chat{
    bottom: 33px;
  }
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php 
    include './include/sidebar.php'; 
    //include './include/lecture-details.php';
    ?>

  </div>


  <div class="col-9 p-3 row">

    <div class="container p-3">
      <h3>Upload Assignment</h3>
    <hr>

<?php create_upload(); ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class="form-group col">
              <label for="thread">Thread</label>
              <select value="thread" name="thread" class="form-control border border-primary">
                <option value="thread">Select Options</option>

<?php 

$query = query("SELECT * FROM threads");
confirm($query);

while($row = mysqli_fetch_assoc($query)){

    $thread_id = escape_string($row['thread_id']);
    $thread = escape_string($row['thread']);

    echo "<option value='{$thread_id}'>{$thread}</option>";

}

?>

              </select>
            </div>
          <div class="form-group col">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control border-primary" placeholder="Ex: Reports...">
          </div>
          </div>
      <div class="form-group border p-3">
        <label for="upload">Please Upload your file</label>
        <input type="file" name="upload" class="form-control-file">
        <br>
        <button type="submit" name="create_upload" onclick="check_upload()" class="btn btn-outline-primary mb-2">Upload</button>
      </div>
    </form>

   <hr> 

<div class="col-md-9 overflow-auto">
    <ul class="list-group mb-3">
  
  <?php 
  $query = query ("SELECT * FROM uploads ORDER BY upload_id DESC");
  confirm($query);

  while ($row = fetch_array($query)){

     $upload_id = $row['upload_id'];
     $upload_thread_id = $row['upload_thread_id'];
     $title = $row['title'];
     $upload = $row['upload'];
     $comment = $row['comment'];
     $date = $row['date'];
     $date = strtotime($date);
     $date = date('d M Y', $date);


  $query = query("SELECT * FROM threads WHERE thread_id = {$upload_thread_id}");
  confirm($query);

while($row = mysqli_fetch_assoc($query)){

    $thread_id = $row['thread_id'];
    $thread = $row['thread'];

        echo "<li class='list-group-item list-group-item-primary'>$thread</li>";
    }

    echo "<li class='list-group-item'>";
    echo "<table class='col-12'>";
    echo "<tr>";
    echo "<td>$title</td>";
    echo "<td rowspan='2'>$comment</td>";
    echo "<td>$date</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><a href='student_uploads.php?download={$upload}' download='{$upload}'>$upload</a></td>";
    echo "</tr>";
    echo "</table>";
    echo "</li>";
    echo "<br>";
  }

  ?>

</ul>
</div>
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





