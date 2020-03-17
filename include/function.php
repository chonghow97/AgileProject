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


/************************ADMIN FUNCTIONS***************************/

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

// 	if(isset($_POST['submit'])){
// 		$tutor = escape_string($_POST['tutor']);
// 		$student = escape_string($_POST['student']);

// echo "<p class='mt-3 ml-3'>Tutor {$tutor} is assign to student {$student}.</p>";

// }
        
//            }

function  create_appointment(){

if (isset($_POST['create_appointment'])) {

    $name = escape_string($_POST['name']);
    $tutor = escape_string($_POST['tutor']);
    $date = date('d-m-y');
    $time = escape_string($_POST['time']);
    $venue = escape_string($_POST['venue']);
    $comment = escape_string($_POST['comment']);


    if (!empty($name) && !empty($tutor) && !empty($date) && !empty($time) && !empty($venue) && !empty($comment)) {
      

    $query = query("INSERT INTO appointment(name, tutor, date, time, venue, comment) VALUES ('{$name}','{$tutor}','{$date}','{$time}','{$venue}','{$comment}')");
    confirm($query);
    echo "<script>alert('Appointment is successful!')</script>";
    header("Location: Student_meeting.php");


    } else {

      echo "<script>alert('Fields cannot be empty')</script>";

    }
    
  }

}

function create_upload(){



}


?>