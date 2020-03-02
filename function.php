<?php

function set_message($msg){
	
	if(!empty($msg)){
		
		$_SESSION['message'] = $msg;
	} else {
		
		$msg = "";
	}
	
}

function display_message(){
	
	if(isset($_SESSION['message'])) {
		
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	
}


function redirect($location){
	
	header("Location: $location ");
	
}


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


?>