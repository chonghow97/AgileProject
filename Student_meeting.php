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
    <div class="container mx-auto">
      <?php create_appointment(); ?>
      <!-- Meeting -->
      
      <div class="row">
        <div class="col overflow-auto" style="height: 80vh">
          <ul class="list-group mb-3">
            <li class="list-group-item list-group-item-warning pending">Pending</li>
            <?php 
            $query= query("SELECT `date`,`time`,`username`,`title`,`type`,`venue`,`comment` FROM appointment WHERE status='Pending'");
            confirm($query);
            while ($row = fetch_array($query)){
              echo "<li class='list-group-item'>
              <table class='col-12'>
              <tr><td>$row[0]</td><td rowspan='2'>$row[3]</td><td>$row[4]</td><td rowspan='2'>$row[6]</td></tr>
              <tr><td>$row[1]</td><td>$row[5]</td></tr>
              </table>
              </li>";
            }

            ?>
          </ul>
          <ul class="list-group mb-3">
            <li class="list-group-item list-group-item-success approved">Approved</li>
            <?php 
            $query= query("SELECT `date`,`time`,`username`,`title`,`type`,`venue`,`comment` FROM appointment WHERE status='approved'");
            confirm($query);
            while ($row = fetch_array($query)){
              echo "<li class='list-group-item'>
              <table class='col-12'>
              <tr><td>$row[0]</td><td rowspan='2'>$row[3]</td><td>$row[4]</td><td rowspan='2'>$row[6]</td></tr>
              <tr><td>$row[1]</td><td>$row[5]</td></tr>
              </table>
              </li>";
            }

            ?>
          </ul>
          <ul class="list-group mb-3">
            <li class="list-group-item list-group-item-danger declined">Declined</li>
            <?php 
            $query= query("SELECT `date`,`time`,`username`,`title`,`type`,`venue`,`comment` FROM appointment WHERE status='disapproved'");
            confirm($query);
            while ($row = fetch_array($query)){
              echo "<li class='list-group-item'>
              <table class='col-12'>
              <tr><td>$row[0]</td><td rowspan='2'>$row[3]</td><td>$row[4]</td><td rowspan='2'>$row[6]</td></tr>
              <tr><td>$row[1]</td><td>$row[5]</td></tr>
              </table>
              </li>";
            }

            ?>
          </ul>
        </div>

        <form class="col" action="" method="post" enctype="">
          <h3>Meeting</h3>
          <hr>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control border-primary" placeholder="Ex: Meetings...">
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="date">Date</label>
              <input type="date" name="date" class="form-control border-primary" id="date1">
            </div>

            <div class="form-group col">
              <label for="time">Time</label>
              <input type="time" name="time" class="form-control border-primary">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="type">Type of Meeting</label>
              <select name="type" class="form-control border border-primary">
                <option value="type">Select Options</option>
                <option>Virtual</option>
                <option>Real</option>

                <?php 

// $query = query("SELECT * FROM meeting_data");
// confirm($query);

// while ($row = mysqli_fetch_assoc($query)) {
//         $meetingData_Id = $row['meetingData_Id'];
//         $type = $row['type'];

//         echo "<option value='{$meetingData_Id}'>{type}</option>";

// }

                ?>
              </select>
            </div>



            <div class="form-group col">
              <label for="venue">Venue</label>
              <select value="venue" name="venue" class="form-control border border-primary">
                <option value="venue">Select Options</option>
                <option>None</option>
                <option>Classroom</option>
                <option>Foyer</option>
                <option>Hall</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="comment">Comment</label>
            <textarea type="text" name="comment" class="form-control border-primary" placeholder="Ex: Appointment for assignment questions..." rows="4"></textarea>
          </div>

          <button type="submit" name="create_appointment" class="btn btn-outline-primary form-group" value="Appointment">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
  $(function () {
    var today = new Date();
    var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10){
  dd='0'+dd
} 
if(mm<10){
  mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
$('#date1').attr("min", today);
$(".navbar").addClass("bg-primary");
$(".navbar-brand").addClass("text-white");
$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
})
</script>





