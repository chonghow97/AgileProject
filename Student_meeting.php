<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 2;
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


  <div class="col-9 row p-3">
    <div class="container border border-primary">
<?php create_appointment(); ?>
      <!-- Meeting -->
      <h3>Meeting</h3>
      <form class="form-inline mt-3" action="" method="post" enctype="">

        <div class="form-group mx-sm-3 mb-2">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control border-primary" placeholder="Ex: Meetings..." style="width: 45vw">
        </div>

        <div class="form-group mx-sm-3 mb-2">
          <label for="date">Date</label>
          <input type="date" name="date" class="form-control border-primary">
        </div>

        <div class="form-group mx-sm-3 mb-2">
          <label for="time">Time</label>
          <input type="time" name="time" class="form-control border-primary">
        </div>

        <div class="form-group col-xs-4">
          <label for="type">Type of Meeting</label>
            <select typr="type" name="meeting_type">
              <option value="type">Select Options</option>
              option>
              <option>Virtual</option>
              <option>Real</option>

<?php 

// $query = query("SELECT * FROM meeting_data");
// confirm($query);

// while ($row = mysqli_fetch_assoc($query)) {
//         $meetingData_Id = $row['meetingData_Id'];
//         $meeting_type = $row['meeting_type'];

//         echo "<option value='{$meetingData_Id}'>{$meeting_type}</option>";

// }

?>
            </select>
        </div>



        <div class="form-group mx-sm-3 mb-2">
          <label for="venue">Venue</label>
          <select value="venue" name="venue">
              <option value="venue">Select Options</option>
              <option>None</option>
              <option>Classroom</option>
              <option>Foyer</option>
              <option>Hall</option>
            </select>
        </div>

        <div class="form-group mx-sm-3 mb-2">
          <label for="comment">Comment</label>
          <input type="text" name="comment" class="form-control border-primary" placeholder="Ex: Appointment for assignment questions..." style="width: 45vw; height:10vw">
        </div>

        <br>
        <button type="submit" name="create_appointment" class="btn btn-outline-primary mb-2" value="Appointment">Send</button>
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
  
  



