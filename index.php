<?php 
  $title = "E-learning";
  $name = ""; 
  include_once 'include/function.php';
  include_once 'include/database.php';
?>


<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
</style>

<body>
  <header>
      <nav class="navbar navbar-light">
        <span class="navbar-brand mb-0 h1">E-learning</span>
      </nav>
  </header>
<style type="text/css">
  *{
    //outline: 1px solid red;
  }
  .vertical-text {
transform: rotate(90deg);
transform-origin: left top 0;
margin-left: 40px;
}
</style>
<!-- Sidebar -->
  <div class="float-left vertical-text p-1">
  <a href="./index.php" class="btn btn-primary">Student</a>
  <a href="./admin_index.php" class="btn btn-secondary ml-3">Admin</a>
  <a href="./lecture_index.php" class="btn btn-warning ml-3">Lecture</a>
</div>
<div class="container-md p-3 text-center mt-5">
<img src="https://images.all-free-download.com/images/graphiclarge/student_and_education_logo_free_download_6820451.jpg" width="200" height="200px" class="img-thumbnail">
<h1 class="p-3 text-primary">E-learning</h1>

  <form class="p-3 border border-primary text-left col-5 mx-auto" action="#" method="post">
 <?php login(); ?>
    <div class="form-group">
    <input name="email" type="email" placeholder="Enter Email address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <!-- <small class="text-danger">Invalid Username. Please Check Again!</small> -->
  </div>

  <div class="form-group">
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
    <!-- <small class="text-danger">Wrong Password. Please check again</small> -->
  </div>

  <button type="submit" name="login" class="btn btn-outline-primary">Submit</button>
  </form>
</div>
<?php 
  include './include/footer.php';
 ?>

<script type="text/javascript">
  $("nav:nth(0)").addClass("bg-primary");
  $("nav:nth(0)>span").addClass("text-white");
</script>

