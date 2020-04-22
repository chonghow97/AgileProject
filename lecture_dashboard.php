<?php 
$title = "E-learning";
$name = "Student"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment','Tutees Dashboard'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php','lecture_tuteeList.php'];
$active_index = 0;
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
</style>
<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include 'include/sidebar.php'; ?>


	</div>
	<div class="col-9 row p-3">
		<div class="col-6">
			<h3>Meeting</h3>
			<canvas id="meeting" width="400" height="200"></canvas>
		</div>
		<div class="col-6">
			<h3>Assignment</h3>
			<canvas id="assignment" width="400" height="200"></canvas>
		</div>
	</div>
</div>

<?php 
include './include/footer.php';
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript">

	$(function () {
		var id =1;
		$(".alert").hide();
		var TutorName = "";
			//APPERENCE
			$(".navbar").addClass("bg-warning");
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");

			$.ajax({
				url:"test1.php",
				method:"GET",
				success:function(data){
					var a = JSON.parse(data);
					console.log(a);
					//meeting
					var ctx = document.getElementById('meeting').getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: a.date,
							datasets: [{
								data: a.count,
								borderWidth: 1
							}]
						},
						options: {
							legend: {
								display: false
							},
							tooltips: {
								callbacks: {
									label: function(tooltipItem) {
										return tooltipItem.yLabel;
									}
								}
							}
						}
					});
					//Assignment
					var ctl = document.getElementById('assignment').getContext('2d');
					var Assignment = new Chart(ctl, {
						type: 'bar',
						data: {
							labels: a.date,
							datasets: [{
								data: a.count,
								borderWidth: 1
							}]
						},
						options: {
							legend: {
								display: false
							},
							tooltips: {
								callbacks: {
									label: function(tooltipItem) {
										return tooltipItem.yLabel;
									}
								}
							}
						}
					});
				}
			})
		});

	</script>

