<?php
require '/lib/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();				//Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';			//Specify main and backup SMTP servers
$mail->SMTPAuth = true;				//Enable SMTP autentication
$mail->Username = 'gymsender@gmail.com';	//SMTP username
$mail->Password = 'gymsender1';			//SMTP password
$mail->SMTPSecure = 'tls';			//Enable TLS encryption, 

$mail->From = 'alexnzioka42@gmail.com';		
$mail->FromName = 'The Gym';
$mail->addAddress('alexnzioka92@gmail.com');
$mail->addCC('alexo1@students.uonbi.ac.ke');

$mail->isHTML(true);				//set email format to html

$mail->Subject = 'Test Mail Subject!';
$mail->Body    = 'Thank you for registering with The Gym. <br><b> Keep this number safe  </b>.';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
    echo '<br>Message has been sent<br>';
}
?>