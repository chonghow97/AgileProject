<?php 
$title = "E-learning";
$name = "Student";
include './include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['#','#','#','#','#','#','#'];
$active_index = 2;
?>
<style type="text/css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php 
		include './include/sidebar.php'; 
		include './include/lecture-details.php';
		?>
		

	</div>


	<div class="col-9 p-3 row">
		<div class="col-lg-6">
			<ul class="list-group mb-3">
				<li class="list-group-item list-group-item-warning">Pending</li>
				<li class="list-group-item"><a href="#">Example</a></li>
				<li class="list-group-item text-center"><small><i>Empty</i></small></li>

			</ul>
			<ul class="list-group mb-3">
				<li class="list-group-item list-group-item-success">Apporved</li>
				<li class="list-group-item"><a href="#">Example</a></li>
				<li class="list-group-item text-center"><small><i>Empty</i></small></li>

			</ul>
		</div>
		<div class="col-lg-6">
			<form class="border border-outline-primary p-3">
				<div class="col mb-3">
					<label for="Title">Title</label>
					<input type="text" class="form-control" placeholder="Title">
				</div>
				<div class="row mb-3 ml-1">
					<div class="col">
						<label for="Title">Date</label>
						<input type="Date" class="form-control" placeholder="Title">
					</div>
					<div class="col">
						<label for="Title">Time</label>
						<input type="time" class="form-control" placeholder="Title" id="test">
					</div>
				</div>
				<div class="row mb-3 ml-1">
					<div class="col">
						<label for="Title">Type of meeting</label>
						<select class="form-control" id="exampleFormControlSelect1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
					<div class="col">
						<label for="Title">Vanue</label>
						<select class="form-control" id="exampleFormControlSelect1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				<div class="col mb-3">
					<label for="Title">Comment</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
				</div>
				<div class="col mb-3 text-right">
					<button type="submit" class="btn btn-outline-primary text-right">Send</button>
				</div>
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




