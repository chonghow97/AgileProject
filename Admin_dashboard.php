<?php 

$title = "E-learning";
include './include/header.php';
$sidebar = ['Allocation','List'];
$url = ['Admin_dashboard.php','Admin_list.php'];
$active_index = 0;

?>
<style type="text/css">

</style>

<div class="row container-fluid mx-auto">
	<div class="list-group col-2">
		<?php include 'include/sidebar.php'; ?>
	</div>
	<div class="col-10 p-3">
		<div class="container">
			<p class="test"></p>
			<h3>Allocation</h3>
			<hr>
			<form class="container">
				<div class="row">
					<div class="col-xl-6">
						<div class="form-group">

							<label for="tutor">Tutor</label>

							<select class="form-control" id="tutor">
								<option hidden>Please Select Tutor</option>
								<?php get_tutor() ?>
							</select>
						</div>
					</div>
					<div class="col-xl-6">
						<label for="student">Student</label>
						<div class="form-group">
							<div class="mb-3">
								<input type="text" name="" class="container-fluid">
							</div>
							
							<div class="border pt-2 overflow-auto" style="height: 24rem" id="students">
								<?php get_student() ?>
							</div>
						</div>
					</div>
					<div class="row container-fluid mx-auto">
						<div class="col-11">
							<input class="form-control Stu_display" type="text" placeholder="Student Name" readonly>
						</div>
						<div class="col-1">
							<button type="button" class="btn btn-outline-dark" id="allocate">Submit</button>
						</div>
					</div>
					
				</div>
			</form>
		</div>
		<p id="result">123</p>
	</div>
</div>
<?php 
include './include/footer.php';
?>

<script type="text/javascript">
	$(function () {
		//apperance
		$("nav:nth(0)").addClass("bg-dark");
		$("nav:nth(0)>span").addClass("text-white");
		$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-dark");

		//student
		$("#students").hide();
		$("#tutor").change(function () {
			$("#students").show();
		});
		$("#tutor,#students").change(function () {
			var student = {name:[],id:[]};
			$(".student:checked").each(function () {
				student.id.push($(this).val());
				student.name.push($(this).next().text());
			})
			var names = student.name.toString().replace(/,/g, ' | ');

			$(".Stu_display").attr("placeholder",names);

			var allocation = {tutor: $("#tutor option:selected").val(),student:student.id};

			console.log(allocation);
			$("#allocate").click(function () {
					$.ajax({
						url:"./include/function.php",
						method: "POST",
						data: {allocation: allocation},
						success: function(data){
							$('#result').html(data);
							$(".student:checked").parent().remove();
						}
					})
				})
		})

	});

	
</script>

