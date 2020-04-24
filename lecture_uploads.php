<?php 
$title = "E-learning";
$name = "Student"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 4;
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

		<?php include 'include/sidebar.php'; ?>


	</div>
			<div class="col-9 row p-3">
				<div class="col-lg-9">
					<h3 class="p-3">Assignment Approvement</h3>

<?php create_upload(); ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group border p-3">
        <label for="topic">Topic</label>
        <input type="text" name="topic" class="form-control-file">
      </div>
      <div class="form-group border p-3">
        <label for="upload">Please Upload your file</label>
        <input type="file" name="upload" class="form-control-file">
      </div>
      <div class="form-group mx-sm-3 mb-2">
          <input type="text" name="comment" class="form-control border-warning" placeholder="Comment here.." style="width: 52vw; height: 10vw;">
      </div>
        <div class="form-group">
        <button type="submit" name="create_upload" onclick="check_upload()" class="btn btn-outline-warning mb-2">Upload</button>
      </div>
    </form>
    


				</div>
			</div>
		</div>
<?php include './include/footer.php'; ?>
<script type="text/javascript">
  $(function () {
    $(".navbar").addClass("bg-warning");
    $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");
  })
</script>
