<?php include ('database.php'); ?>
<?php include ('function.php'); ?>


 <!-- Header-->
<?php include ('include/header.php'); ?>

<!-- Navigation  Bar -->
 <?php include ('include/navigation.php'); ?>

  <!-- Sidebar  Bar -->
  <?php include ('include/sidebar.php'); ?>


<?php create_appointment(); ?>
  <h3>
      Create Appointment
  </h3>

<form action="" method="post" >

  <div class="col">

     <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control">
         
     </div>
 
      <div class="form-group">
          <label for="tutor">Tutor</label>
      <input type="text" name="tutor" class="form-control"   >
         
     </div> 


      <div class="form-group">
          <label for="date">Date</label>
      <input type="date" name="date" class="form-control">
         
     </div>


      <div class="form-group">
          <label for="time">Time</label>
      <input type="text" name="time" class="form-control">
         
     </div>
 
      <div class="form-group">
          <label for="venue">Venue</label>
      <input type="text" name="venue" class="form-control">
         
     </div> 


      <div class="form-group">
          <label for="comment">Comment</label>
      <textarea type="text" name="comment" class="form-control"></textarea>
         
     </div>

    
      <div class="form-group">

      <input type="submit" name="create_appointment" class="btn btn-primary pull-right" value="Appointment">
         
     </div>
  </div>
</form>

<!-- <script type="text/javascript">
  
  function check_appointment() {
    alert("Appointment confirmed!");
  }


</script> -->

