<?php 
$title = "E-learning";
$name = "Student";
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meetings','Blog','Assignment','Inbox'];
$url = ['Student_dashboard.php','Student_message.php','Student_meeting.php','Student_blog.php','Student_uploads.php','Student_inbox.php'];
$active_index = 3;
?>
<style type="text/css">
  #chat{
    bottom: 33px;
  }
</style>
<div class="container-fluid row">
  <div class="list-group col-3">

    <?php 
    include './include/sidebar.php'; 
    //include './include/lecture-details.php';
    ?>
    
  </div>

  <div class="col-9 row p-3">
    <div class="container mx-auto">

      <!-- Create Blog Article -->
      
      <div class="row">

      <form class="col" action="" method="post" enctype="">
        <h3>Create Blog Article</h3>
     

  <?php

if (isset($_POST['create_article'])) {

    $title = escape_string($_POST['title']);
    $content = escape_string($_POST['content']);


    if (!empty($title) && !empty($content)) {
      

  $query = query("INSERT INTO post(title, username, date, content) VALUES ('{$title}', '{$_SESSION['username']}', now(), '{$content}')");
  confirm($query);

  echo "<script>alert('Post is created successfully!')
  window.location.href = './Student_blog.php'</script>";
    } else {

      echo "<script>alert('Fields cannot be empty')</script>";

    }
    
  }


?>    
     <hr>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control border-primary" placeholder="Title...">
        </div>
        
        <div class="form-group">
          <label for="content">Content</label>
          <textarea type="text" name="content" class="form-control border-primary" placeholder="Article content..." rows="4"></textarea>
        </div>
          <button class="btn btn-outline-primary form-group" ><a href="Student_blog.php">Back</a></button>        
        <button type="submit" name="create_article" class="btn btn-outline-primary form-group" value="Article">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php 
include './include/footer.php';
?>
<script type="text/javascript">
  $(function () {
    $(".navbar").addClass("bg-primary");
    $(".navbar-brand").addClass("text-white");
    $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-primary");
  })
</script>





