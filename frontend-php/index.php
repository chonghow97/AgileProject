<?php 
	$title = "E-learning";
	$name = "";
	include './include/header.php';
?>
<style type="text/css">
	*{
		//outline: 1px solid red;
	}
</style>
<div class="container-md p-3 text-center mt-5">
<img src="https://dummyimage.com/200x200/3d3d3d/fff.png&text=Logo+Here" alt="..." class="img-thumbnail">
<h1 class="p-3">E-learning</h1>
	<form class="p-3 border border-dark text-left col-5 mx-auto">
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
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" class="btn btn-outline-dark">Submit</button>
	</form>
</div>
<?php 
	include './include/footer.php';
 ?>


