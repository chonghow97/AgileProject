<?php 
	include_once '../include/function.php';
	$query = query("select count(date),date from appointment group by `date`");
	confirm($query);
	$date = array();
	$count = array();
	while($result = mysqli_fetch_array($query)){
		array_push($date, $result[1]);
		array_push($count, $result[0]);
	}
	$myObj = new \stdClass();
	$myObj->date = $date;
	$myObj->count =$count;

$myJSON = json_encode($myObj);

echo $myJSON;
	
 ?>