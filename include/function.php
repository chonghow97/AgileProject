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


/**********************STUDENT FUNCTIONS*************************/

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
    $login_role = $row['student'];
    }

if ($email === $login_email && $password === $login_password) {
  
  $_SESSION['username'] = $login_username;
  $_SESSION['firstName'] = $login_firstname;
  $_SESSION['lastName'] = $login_lastname;
  $_SESSION['email'] = $login_email;
  $_SESSION['student'] = $login_role;

  echo "<script>alert('Welcome, {$_SESSION['username']} to student dashboard.')</script>";

  header("Location: Student_dashboard.php");


} else {

  echo "<script>alert('Invalid username or password!')</script>";
  //header("Location: index.php");
  
  }


}


}


// function list_conversation() {

//   $query = query("SELECT * FROM message");
//   confirm($query);

//   while ($row = fetch_array($query)) {
   
//   $message = $row['message'];
//   $_SESSION['username'] = $row['username'];
//   // $_SESSION['student'] = $row['role'];
//   // $_SESSION['tutor'] = $row['role'];

//   // if($_SESSION['student'] == $row['role'])
//   // {
//     echo "<h5>{$_SESSION['username']}</h5>";
//     echo "<p class='bg-primary p-2 text-white rounded-sm mb-3' >{$message}</p>";
//   // }
//   // if($_SESSION['tutor'] == $row['role'])
//   // {
//   //   echo "<h5>{$_SESSION['username']}</h5>";
//   //   echo "<p class='bg-primary p-2 text-white rounded-sm mb-3' >{$message}</p>";
//   //}

  

//   }

// }

// function chat() {

//   if (isset($_POST['submit'])) {

//   $message = escape_string($_POST['message']);
//   $date = date('d-m-y');
//   //$_SESSION['student'] = $row['role'];
//   // $_SESSION['tutor'] = $row['role'];

//   $query = query("INSERT INTO message(username, message, date) VALUES ('{$_SESSION['username']}', '{$message}', now())");
//   confirm($query);

//   echo "<h5 style='color:blue;'>{$_SESSION['username']}</h5>";
//   echo "<p>{$message}</p>";
// }

// }


function  create_appointment(){

if (isset($_POST['create_appointment'])) {

    $title = escape_string($_POST['title']);
    $date = escape_string($_POST['date']);
    $time = escape_string($_POST['time']);
    $meeting_type = escape_string($_POST['meeting_type']);
    $venue = escape_string($_POST['venue']);
    $comment = escape_string($_POST['comment']);

    // $date = strtotime($date);
    // $date = date('d-m-Y', $date);

    if (!empty($title) && !empty($date) && !empty($time) && !empty($meeting_type) && !empty($venue) && !empty($comment)) {
      

  $query = query("INSERT INTO appointment(username, title, date, time, meeting_type, venue, comment) VALUES ('{$_SESSION['username']}', '{$title}', '{$date}','{$time}','{$meeting_type}','{$venue}','{$comment}')");
  confirm($query);

  echo "<script>alert('Meeting appointment is created successfully!')</script>";

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

    if (!empty($upload) && !empty($date)) {

      $query = query("INSERT INTO uploads(upload, comment, date) VALUES ('{$upload}', '{$comment}', now() )");
      confirm($query);

      echo "<script>alert('File uploaded successfully!')</script>";

    } else {

      echo "<script>alert('Upload files cannot be empty')</script>";

    }

  
}

}


/**********************ADMIN FUNCTIONS*************************/

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


function get_tutor(){

  $query = query("SELECT * FROM tutor");
  confirm($query);
   
    while($row = mysqli_fetch_array($query)){

$tutor_links = <<<DELIMETER

<option value="{$row['tutorId']}">{$row['username']}</option>

DELIMETER;

echo $tutor_links;

   }
}

function get_student(){
  $query = query("SELECT * FROM student");
  confirm($query);
   
    while($row = mysqli_fetch_array($query)){

$student_links = <<<DELIMETER

<div class="form-check col-lg-4 col-md-6 col-xm-12 checkstudent"> <input class="form-check-input student" type="checkbox" name="checkBoxArray[]" value="{$row["studId"]}" id="{$row["studId"]}"> <label class="form-check-label" for="{$row["studId"]}"> {$row['firstName']}  {$row['lastName']}</label> </div>
DELIMETER;

echo $student_links;

   }

}

function allocate() {

  if (isset($_POST['allocate'])) {
    
  $allocate_tutor = $_POST['tutorOut'];
  $allocate_student = $_POST['studentOut'];

    if (!empty($allocate_tutor) && !empty($allocate_student)) {

  $query = query("INSERT INTO allocate(allocate_tutor. allocate_student) VALUES ('{$allocate_tutor}','{$allocate_student}')");
  confirm($query);

  echo "<script>alert('Allocation is successfully!')</script>";

   } else {

  echo "<script>alert('Allocation cannot be empty')</script>";

    }


  }
}


/*********************LECTURE FUNCTIONS************************/


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


?>