<?php 
// not working rn 
require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail ->isSMTP();
$mail ->SMTPAuth= true;
$mail ->SMTPSecure= 'ssl';
$mail ->Host = 'smtp.gmail.com';
$mail ->Port = '465';
$mail ->isHTML();
$mail ->Username = 'grocerylist558448@gmail.com';
$mail ->Password = 'testPass13!.';
    
$mail ->SetFrom ('no-reply@howcode.org');
$mail ->Subject = 'It works!!';
$mail ->Body = '<3';
$mail ->AddAddress ('no mail');

$mail ->Send();
echo 'testPass13!.';
// testPass13!.
?>