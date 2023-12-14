<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$number = $_POST['number'];

/* print_r($_POST); */

$host = "localhost";
$dbname = "law_contacts";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
  die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO contacts (name, email,	subject, phone)
        VALUES (?, ?, ?, ?)";


$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $number);

mysqli_stmt_execute($stmt);


require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

 $mail->SMTPDebug = SMTP::DEBUG_SERVER; 

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->CharSet = 'utf-8';

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "wendy.njeri@students.jkuat.ac.ke"; /* Auto MailUsername & Password */
$mail->Password = "0746214858WendyNjeri";

$mail->setFrom("info@desotech.co.ke", "Maintainance Team");
$mail->addAddress("Wendy.njeri@students.jkuat.ac.ke", "Wendy Njeri");

$mail->Subject = "New Contact";
$mail->Body = "New Form Information:"."\nname: ".$name."\nEmail: ".$email."\nSubject: ".$subject."\nContact number: ".$number."\n";

$mail->send();


header("Location: send.html")


?> 