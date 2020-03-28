<?php

function query($sql) {
  
  global $connection;
  
  return mysqli_query($connection, $sql);
  
}

function confirm($result) {
  
  global $connection;
  
  if(!$result) {
    die("QUERY FAILED" . mysqli_error($connection));  
  }
}


function escape_string($string) {
  global $connection;
  
  return mysqli_real_escape_string($connection, $string);
    
  }

function fetch_array($result){
  return mysqli_fetch_array($result);
}


/************************LOGIN FUNCTIONS***************************/

 
function login() {

if (isset($_POST['login'])) {

  $email = escape_string($_POST['email']);
  $password = escape_string($_POST['password']);

  $query = query("SELECT * FROM student WHERE email = '{$email}' ");
    confirm($query);

    while ($row = fetch_array($query)) {
      
    $login_id = $row['studId'];
    $login_username = $row['username'];
    $login_password = $row['password'];
    $login_firstname = $row['firstName'];
    $login_lastname = $row['lastName'];
    $login_email = $row['email'];
    }

if ($email === $login_email && $password === $login_password) {
  
  $_SESSION['username'] = $login_username;
  $_SESSION['firstName'] = $login_firstname;
  $_SESSION['lastName'] = $login_lastname;
  $_SESSION['email'] = $login_email;

  echo "<script>alert('Welcome, {$_SESSION['username']} to student dashboard.')</script>";

  header("Location: Student_dashboard.php");


} else {

echo "<script>alert('Invalid username or password!')</script>";
  header("Location: index.php");
  
  }


}


}


function admin_login() {

if (isset($_POST['admin_login'])) {
  
  $email = escape_string($_POST['email']);
  $password = escape_string($_POST['password']);

  $query = query("SELECT * FROM admin WHERE email = '{$email}' ");
    confirm($query);

    while ($row = fetch_array($query)) {
      
    $admin_login_id = $row['adminId'];
    $admin_login_username = $row['username'];
    $admin_login_password = $row['password'];
    $admin_login_firstname = $row['firstName'];
    $admin_login_lastname = $row['lastName'];
    $admin_login_email = $row['email'];
    }

if ($email === $admin_login_email && $password === $admin_login_password) {
  
  $_SESSION['username'] = $admin_login_username;
  $_SESSION['firstName'] = $admin_login_firstname;
  $_SESSION['lastName'] = $admin_login_lastname;
  $_SESSION['email'] = $admin_login_email;

  header("Location: Admin_dashboard.php");


} else {

  header("Location: Admin_index.php");
  
  }


}

}


function lecture_login() {

if (isset($_POST['lecture_login'])) {
  
  $email = escape_string($_POST['email']);
  $password = escape_string($_POST['password']);

  $query = query("SELECT * FROM tutor WHERE email = '{$email}' ");
    confirm($query);

    while ($row = fetch_array($query)) {
      
    $lecture_login_id = $row['tutorId'];
    $lecture_login_username = $row['username'];
    $lecture_login_password = $row['password'];
    $lecture_login_firstname = $row['firstName'];
    $lecture_login_lastname = $row['lastName'];
    $lecture_login_email = $row['email'];
    }

if ($email === $lecture_login_email && $password === $lecture_login_password) {
  
  $_SESSION['username'] = $lecture_login_username;
  $_SESSION['firstName'] = $lecture_login_firstname;
  $_SESSION['lastName'] = $lecture_login_lastname;
  $_SESSION['email'] = $lecture_login_email;

  header("Location: Lecture_dashboard.php");


} else {

  header("Location: Lecture_index.php");
  
  }


}


}



/**********************STUDENT FUNCTIONS*************************/

// function get_tutor(){


// }

// function get_student(){


// }

// function assign_allocation(){

// <<<<<<< HEAD:function.php
// =======
// <div class="form-check col-lg-4 col-md-6 col-xm-12"> <input class="form-check-input" type="checkbox" value="{$row["studId"]}" id="{$row["studId"]}"> <label class="form-check-label" for="{$row["studId"]}"> {$row['username']} </label> </div>
// DELIMETER;

// echo $student_links;

//    }
// }
// >>>>>>> a8dc777747a5a3097d87883152b76e7abe780b36:include/function.php

//  if(isset($_POST['submit'])){
//    $tutor = escape_string($_POST['tutor']);
//    $student = escape_string($_POST['student']);

// echo "<p class='mt-3 ml-3'>Tutor {$tutor} is assign to student {$student}.</p>";

// }
        
//            }

function  create_appointment(){

if (isset($_POST['create_appointment'])) {

    $title = escape_string($_POST['title']);
    // $tutor = escape_string($_POST['tutor']);
    // $username = $_SESSION['username'];
    $time = escape_string($_POST['time']);
    $type = escape_string($_POST['type']);
    $venue = escape_string($_POST['venue']);
    $comment = escape_string($_POST['comment']);
    $date = escape_string($_POST['date']);
    // $date = strtotime($date);
    // $date = date('d-m-Y', $date);

    if (!empty($title) && !empty($date) && !empty($time) && !empty($comment)) {
      

  $query = query("INSERT INTO appointment(title, date, time, type, venue, comment) VALUES ('{$title}', '{$date}','{$time}','{$type}','{$venue}','{$comment}')");
  confirm($query);

  echo "<script>alert('Appointment is created successfully!')</script>";

    } else {

      echo "<script>alert('Fields cannot be empty')</script>";

    }
    
  }

}

function create_upload() {

  if (isset($_POST['create_upload'])) {

  $comment = $_POST['comment'];
  $date = date('d-m-y');
  $upload = $_FILES['upload']['name'];
  $upload_temp = $_FILES['upload']['tmp_name'];

  move_uploaded_file($upload_temp, "images/$upload");

    if (!empty($upload) && !empty($comment) && !empty($date)) {

      $query = query("INSERT INTO uploads(upload, comment, date) VALUES ('{$upload}', '{$comment}', now() )");
      confirm($query);

      echo "<script>alert('File uploaded successfully!')</script>";

    } else {

      echo "<script>alert('Upload files cannot be empty')</script>";

    }

  
}

}


?>