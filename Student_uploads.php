<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 4;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php 
    include 'include/sidebar.php'; 
    //include 'include/lecture-details.php';
    ?>
    

  </div>


  <div class="col-9 p-3 row">

    <div class="container p-3">
      <h3>Upload Assignment</h3>
    <hr>
<?php create_upload(); ?>
        <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group border p-3">
        <label for="upload">Please Upload your file</label>
        <input type="file" name="upload" class="form-control-file">
      </div>
      <div class="form-group mx-sm-3 mb-2">
          <input type="text" name="comment" class="form-control border-primary" placeholder="Comment here.." style="width: 52vw; height: 10vw;">
      </div>
        <div class="form-group">
        <button type="submit" name="create_upload" onclick="check_upload()" class="btn btn-outline-primary mb-2">Upload</button>
      </div>
    </form>

    <hr>
    <table class="table col-10 mx-auto">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Comment</th>
          <th scope="col">Upload date</th>
        </tr>
      </thead>
      <tbody>
        <?php 

        $query = query("SELECT * FROM uploads ORDER BY upload_id DESC");
        confirm($query);
   
          while($row = mysqli_fetch_assoc($query)){
            $upload_id = $row['upload_id'];
            $upload = $row['upload'];
            $comment = $row['comment'];
            $date = $row['date'];
            $date = strtotime($date);
            $date = date('d M Y', $date);

            echo "<tr>";
            echo "<th>$upload</th>";
            echo "<th>$comment</th>";
            echo "<th>$date</th>";
            echo "<td><a href='student_uploads.php?download={$upload_id}' class='btn btn-outline-success btn-sm'>Download</a></td>";
            echo "<td><a href='student_uploads.php?delete={$upload_id}' class='btn btn-outline-danger btn-sm' onclick='check_delete()'>Delete</a></td>";
            echo "</tr>";

         }
        ?>
      </tbody>
    </table>

        </div>
  </div>
<?php 

if(isset($_GET['delete'])) {

$delete_upload_id = $_GET['delete'];

$query = "DELETE FROM uploads WHERE upload_id = {$delete_upload_id} ";
$delete_query = mysqli_query($connection, $query);
header("Location: Student_uploads.php");
}


?>
<script type="text/javascript">
   
  function check_delete() {
    alert("Delete confirmed!");
  }

 </script>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
  $(function () {
    $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
  })
</script>





