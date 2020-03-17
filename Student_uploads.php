<?php 
$title = "E-learning";
$name = "Student";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Forums','Files / Uploads','Inbox'];
$url = ['#','#','Student_meeting.php','#','Student_uploads.php','#','#'];
$active_index = 4;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
  <div class="list-group col-3 mt-3">
    <?php include './include/sidebar.php'; ?>
  </div>
  <div class="col-9 mx-auto">
    <h3>Files / uploads</h3>
    <hr>
<?php create_upload(); ?>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group border p-3">
        <label for="upload">Please Upload your file</label>
        <input type="file" class="form-control-file" id="upload" name="upload">
      </div>
      <div class="form-group">
        <input class="btn btn-outline-dark" type="submit" name="create_upload" value="Upload" >
      </div>
    </form>
    <hr>
    <table class="table col-10 mx-auto">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Upload date</th>
      </thead>
      <tbody>
        <?php 

        $query = query("SELECT * FROM uploads");
        confirm($query);
   
          while($row = mysqli_fetch_assoc($query)){
            $upload_id = $row['upload_id'];
            $upload = $row['upload'];
            $date = $row['date'];

            echo "<tr>";
            echo "<th scope='row'>$upload_id</th>";
            echo "<th>$upload</th>";
            echo "<th>$date</th>";
            echo "<td><a href='student_uploads.php?download={$upload_id}' class='btn btn-outline-success btn-sm'>Download</a></td>";
            echo "<td><a href='student_uploads.php?delete={$upload_id}' class='btn btn-outline-danger btn-sm' onclick='check_delete()'>Delete</a></td>";
            echo "</tr>";

         }

        //   $name = "example.pdf";
        //   $date = "12 DEC 2012";
        //   $size = "123kB";
        // if (1) {
        //   echo "<tr> <th>$name</th> <td><small>$date</small></td> <td><small><i>$size</i></small></td> <td> <button type='button' class='btn btn-outline-success btn-sm'>Download</button> <button type='button' class='btn btn-outline-danger btn-sm'>Delete</button> </td> </tr>";
        // }else{
        //   echo "<tr> <th colspan='4' class='text-center'><small><i>No Files yet</i></small></th> </tr>";
        // }
        ?>
      </tbody>
    </table>

    <?php 

    if(isset($_GET['delete'])) {

      $delete_upload_id = $_GET['delete'];

      $query = "DELETE FROM uploads WHERE upload_id = {$delete_upload_id} ";
      $delete_query = mysqli_query($connection, $query);
      header("Location: Student_uploads.php");
    }


    ?>
  </div>
</div>
<div class="fixed-bottom">
  <?php 
        //lecture details
  $L_name = "Stacy";
  $L_Email = "stacy@gamil.com";
  $L_PhoneNumber = "+601236152221";
  ?>
  <li class="list-group-item active bg-dark btn-outline-dark"><label class="font-weight-bold pr-3">TUTOR'S DETAILS</label></li>
  <?php 
  if(0){
    echo "
    <li class='list-group-item'><label class='font-weight-bold pr-3'>Name:</label>$L_name</li>
    <li class='list-group-item'><label class='font-weight-bold pr-3'>Email:</label>$L_Email</li>
    <li class='list-group-item'><label class='font-weight-bold pr-3'>Subject:</label>$L_PhoneNumber</li>
    ";
  }else{
    echo "<li class='list-group-item'><label class='font-weight-bold pr-3'>Unassigned</li>";
  }
  ?>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
  $(function () {
    $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("active bg-dark btn-outline-dark");
  })
  // function check_appointment() {
  //   alert("Appointment confirmed!");
  // }

</script>





