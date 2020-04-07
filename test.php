<?php 

defined("DB_HOST") ? null : define("DB_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASS") ? null : define("DB_PASS",  "");

defined("DB_NAME") ? null : define("DB_NAME", "nightowls");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

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

$query = query("SELECT tutorId,username FROM tutor");
  confirm($query);
while($row = mysqli_fetch_array($query)) {
       echo $row['username'];
}
?>