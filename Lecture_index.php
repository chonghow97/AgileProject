<?php 
  $title = "E-learning";
  $name = "";
  include './include/header.php';
?>
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
  <a href="./" class="btn btn-primary">Student</a>
  <a href="./admin_index.php" class="btn btn-secondary ml-3">Admin</a>
  <a href="./lecture_index.php" class="btn btn-warning ml-3">Lecture</a>
</div>

<div class="container-md p-3 text-center mt-5">
<img src="https://dummyimage.com/200x200/ffc107/000.png&text=Logo+Here" alt="..." class="img-thumbnail">
<h1 class="p-3">E-learning</h1>
  <form class="p-3 border border-warning text-left col-5 mx-auto">
    <div class="form-group">
    <input type="email" Placeholder="Email address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small class="text-danger">Invalid Username. Please Check Again!</small>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <small class="text-danger">Wrong Password. Please check again</small>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label " for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" class="btn btn-outline-warning">Submit</button>
  </form>
</div>
<?php 
  include './include/footer.php';
 ?>

<script type="text/javascript">
  $("nav:nth(0)").addClass("bg-warning");
  // $("nav:nth(0)>span").addClass("text-white");
</script>

