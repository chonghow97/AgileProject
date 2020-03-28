<?php 
$title = "E-learning";
$name = "Admin";
include './include/function.php';
include './include/database.php';
include './include/header.php';
$sidebar = ['Allocation','List'];
$url = ['./Admin_dashboard.php','./Admin_list.php'];
$active_index = 0;
?>
<style type="text/css">
	*{
		/*outline: 1px solid red;*/
	}
	#studentOut{
		resize: none;
	}
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include './include/sidebar.php'; ?>


	</div>
	<div class="col-9">

		<div class="container p-3">
			
			<h3>Allocation</h3>
			<hr>
			<form action="Admin_dashboard.php" method="post">
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Tutor</label>
					<div class="col-sm-10">
						<select class="custom-select" id="tutor">
							<option selected disabled value="">Select A Tutor</option>
							<?php get_tutor(); ?>
						</select>
					</div>
				</div>

				<div class="form-group row ">
					<label for="staticEmail" class="col-sm-2 col-form-label">Student</label>
					<div class="col-sm-10">
						<div class="p-3">
							<input type="" name="" class="col-9" placeholder="Search" id="search">
						</div>
						<!-- checkbox -->
						<div class="checkbox d-flex flex-wrap">
							<?php 
								get_student();
							 ?>
							
						</div>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-outline-dark col-3" data-toggle="modal" data-target="#finalCheck">Submit</button>
				</div>
				</form>
				<fieldset disabled>
				<div class="row">
					<div class="text-center p-3 col-3">
				<input type="text" id="tutorOut" class="form-control" placeholder="Lecture Name here">
			</div>
			<div class="text-center p-3 col-8">
				<textarea class="form-control" id="studentOut" rows="5" placeholder="Student Name Here"></textarea>
			</div>
				</div>
			
			</fieldset>
			</div>
			<div id="result"></div>
		</div>
	</div>
	<!-- Modal -->
<div class="modal fade" id="finalCheck" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you Sure To Allocate?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="finalContent">
        <small><i>Nothing to Select</i></small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Let me think about it</button>
        <button type="button" class="btn btn-secondary" id='allocate'>i'm sure</button>
      </div>
    </div>
  </div>
</div>

	<?php 
	include './include/footer.php';
	?>

	<script type="text/javascript">
		$(function () {
			$(".alert").hide();
			var TutorName = "";
			//APPERENCE
			$("#nav").addClass("bg-dark");
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-dark");

			
			//STUDENT NAME HERE
			$(".checkbox,#tutor").change(function (){
				TutorName = $("#tutor option:selected").text();
				$("#tutorOut").attr("placeholder", TutorName);
				var students = [];
				
				$(".student:checked").each(function (){
					students.push($(this).next('label').text());
				})
				$("#studentOut").attr("placeholder", students);

				TutorName = $("#tutorOut").attr("placeholder");

				var content = "<table class='table table-sm'> <thead> <tr> <th scope='col'>Lecture</th> <th scope='col'>Student</th> </tr> </thead> <tbody> <tr> <td>"+TutorName+"</td> <td>"+students+"</td> </tr> </tbody> </table>";
				finalContent.innerHTML = content;
				//allocation
				$("#allocate").click(function (){
					//close modal
					$(this).attr("data-dismiss","modal");

					//post
					
				})
			})
			
			//Search
			$('#search').keyup(function (){
				console.log($(this).val());
			})

			//test
			$(".checkstudent").each(function (){
				console.log($(this).children("label").text());
			})

			

			//email part


		});

	</script>
