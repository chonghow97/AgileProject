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

 <div class="col-md-9">

                <?php

if (isset($_GET['pt_id'])) {

    $post_the_id = $_GET['pt_id'];


$query = query("SELECT * FROM post WHERE post_id = $post_the_id");
confirm($query);

 while ($row = fetch_array($query)) {
    
    $post_id = $row['post_id'];  
    $title = $row['title'];  
    $username = $row['username'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);
    $content = $row['content'];

    ?>

        <h3>Posts Details Article</h3>
      <hr>

            <!-- Article Details Post -->

      <h2 style="color: blue;"><?php echo $title ?></h2>
      <p>by <?php echo $username ?></p>
      <span><?php echo $date ?></span>
      <hr>
      <p><?php echo $content ?></p>
      <hr>

<?php } } ?>
      
</div>

<?php


if (isset($_POST['create_comment'])) {

    $post_the_id = $_GET['pt_id'];

    $comment = $_POST['comment'];

    if (!empty($comment)) {


$query = "INSERT INTO comment (comment_post_id, username, date, comment)";

$query .= "VALUES ($post_the_id, '{$_SESSION['username']}', now(), '{$comment}')";

$query = query("INSERT INTO comment(comment_post_id, username, date, comment) VALUES ('{$post_the_id}', '{$_SESSION['username']}', now(), '{$comment}')");
confirm($query);

  echo "<script>alert('Comment successfully!')</script>";

} else {

echo "<script>alert('Fields cannot be empty')</script>";

}


}


?>


               <!-- Comments Form -->
                <div class="col-md-9">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">

                        <div class="form-group">
                             <label for="comment">Comment</label>
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>



<?php

$query = query("SELECT * FROM comment WHERE comment_post_id = $post_the_id ORDER BY comment_id DESC");
confirm($query);

 while ($row = fetch_array($query)) {
    
    $username = $row['username'];
    $date = $row['date'];
    $date = strtotime($date);
    $date = date('d M Y', $date);
    $comment = $row['comment'];
   

?>
                 <!-- Comment -->

    <div class="col-md-9">
      <hr>
      <div class="media">
      <hr>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $username ?></h4>
            <small><?php echo $date ?></small><br>
            <?php echo $comment ?>
        </div>
      </div>
    </div>

<?php } ?>



      </div>
    </div>
  </div>
</div>
<?php include './include/footer.php'; ?>

<script type="text/javascript">
    $(function () {
      $(".alert").hide();
      var TutorName = "";
      //APPERENCE
      $("#nav").addClass("bg-warning");
      $(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");
    });
</script>





