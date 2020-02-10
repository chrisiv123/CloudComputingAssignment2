<?php 
//Require PHPMailer (using PHPMailer for emailing)
require_once('PHPMailer/PHPMailerAutoload.php');
// Email address and ingredients of the recipe
$email = $_GET['email'];
$ingredients = $_GET['ingredients'];
//PHPMailer setup
$mail = new PHPMailer();
$mail ->isSMTP();
$mail ->SMTPAuth= true;
$mail ->SMTPSecure= 'ssl';
$mail ->Host = 'smtp.gmail.com';
$mail ->Port = '465';
$mail ->isHTML();
// Credentials for the Gmail accoun
$mail ->Username = 'grocerylist558448@gmail.com';
$mail ->Password = 'testPass13!.';
// Parameters for the email
//@ SetFrom return address
//@Subject subject of the email
//@Body The work=ding of the email
//@AddAddress Sent to address
$mail ->SetFrom ('no-reply@howcode.org');
$mail ->Subject = 'Your ingredients for the recipe';
$mail ->Body = $ingredients;
$mail ->AddAddress ($email);
//Email sending action
$mail ->Send();
// Message for the user of what is happening. This will return them to the index page(mainpage) after 10 seconds.
echo 'Your email has been sent to '.$email.'. Please wait a moment while we redirect you!';
header('Refresh: 10; url=index.php');
?>