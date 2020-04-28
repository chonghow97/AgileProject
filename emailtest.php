<?php
$conn=mysqli_connect("localhost","root","","nightowls");

//include required phpmailer filesize
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

//create instances of phpmailer
$mail = new PHPMailer();

try{
	
//set mailer to use smtp
$mail -> isSMTP();
//using smtp
$mail-> SMTPDebug = SMTP:: DEBUG_SERVER;
//define smtp host
$mail -> Host = "smtp.gmail.com";

//enable smtp authentication
$mail ->SMTPAuth = "true";

//set username
$mail ->Username = "hafizahmohdabdullah@gmail.com";
//set password
$mail ->Password = "ilwzvolldmqunent";

$mail-> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//set port to connect smtp
$mail ->Port = "587";

 $mail->setFrom('hafizahmohdabdullah@gmail.com', 'Hafizah');
 $sql= "select * from student where email=0";

 $res=mysqli_query($conn,$sql);
 if(mysqli_num_rows($res)>0)

 {
	 while($x= mysqli_fetch_assoc($res))
	 {
		 $mail->addAddress($x['email']);
	 }
	 
	 // Content		
    $mail->isHTML(true);                                  
    $mail->Subject = 'Allocation in Class';
    $mail->Body    = 'You have been allocated to this lecturer';
   

    $mail->send();

    echo "<script>alert('Message has been sent'); window.location.href = './admin_dashboard.php';</script>";


 }
else
	{
		echo "No data found";
	}
} 
    catch (Exception $e) 
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
	

?>