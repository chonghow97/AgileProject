<?php include ('database.php'); ?>
<?php include ('function.php'); ?>


 <!-- Header-->
<?php include ('include/header.php'); ?>

<!-- Navigation  Bar -->
 <?php include ('include/navigation.php'); ?>

  <!-- Sidebar  Bar -->
  <?php include ('include/sidebar.php'); ?>

    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


        <!-- Allocation -->
        <form action="assignForm.php" method="post">
          <h3 class=" p-3">Assign One Tutor for One Student</h3>
          <div class="row">
            <div class="col">
              <h3>Select a Tutor</h3>
              <select style="width: 33%" class="form-control" id="tutor" name="tutor">
              <option name="tutor" value="tutor">Select A Tutor</option>

              <?php get_tutor(); ?>

              </select>
            </div>
            <div class="col">
              <h3>Select a student</h3>
            <select style='height: 250px; width: 30%; ' size='2' class="form-control" id="student" name="student">
              <option name="student" value="student">Select A Student</option>

              <?php get_student(); ?>

            </select>
            </div>
          </div>

  <script type="text/javascript">
    function show_confirm(){
      var r=confirm("Do you want to assign selected option?");
      if (r==true) {
        alert("Email is send out!");
      }
      else {
        alert("Assign option is cancel!");
      }
    }

  </script>


          <div class="row"><button type="submit" name="submit" onclick="show_confirm()" value="show confirm box" class="btn btn-primary float-left">Assign</button>

          <?php assign_allocation(); ?>

        </div>
        </form>
  </div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <h1>List of assigned Tutors and Students</h1>
        <hr>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tutors</th>
      <th scope="col">Students</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Jazz</td>
      <td>Sally</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Ram</td>
      <td>Susan</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Liza</td>
      <td>Sam</td>
    </tr>
  </tbody>
</table>
  </div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
</div>
</div>


