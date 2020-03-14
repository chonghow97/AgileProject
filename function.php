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

<option value="{$row['studId']}">{$row['username']}</option>

DELIMETER;

echo $student_links;

   }
}

function assign_allocation(){


	if(isset($_POST['submit'])){
		$tutor = escape_string($_POST['tutor']);
		$student = escape_string($_POST['student']);

echo "<p class='mt-3 ml-3'>Tutor {$tutor} is assign to student {$student}.</p>";

}
        
           }

function  create_appointment(){
	if (isset($_POST['create_appointment'])) {
		$name = escape_string($_POST['name']);
		$tutor = escape_string($_POST['tutor']);
		$date = escape_string($_POST['date']);
		$time = escape_string($_POST['time']);
		$venue = escape_string($_POST['venue']);
		$comment = escape_string($_POST['comment']);

		$query = query("INSERT INTO appointment(name, tutor, date, time, venue, comment) VALUES ('{$name}','{$tutor}','{$date}','{$time}','{$venue}','{$comment}')");
		confirm($query);
	}
}

function create_upload(){

	if (isset($_POST['create_upload'])) {

	$upload = $_FILES['upload']['name'];
	$upload_temp = $_FILES['upload']['tmp_name'];
	$date = date('d-m-y');

	move_uploaded_file($upload_temp, "images/$upload");

	$query = query("INSERT INTO uploads(upload, date) VALUES ('{$upload}','{$date}')");
		confirm($query);
}

}


?>