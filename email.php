<?php
echo getcwd();
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure ='tls';
$mail->Host ='smtp.gmail.com';
$mail->Port ='587';
$mail->Username = 'oleandror@utp.edu.co';
$mail->Password = 'oscar919';
$mail->setFrom ('@gmail.com','codigos prueba');
$mail->addAddress('oscar.rodriguez@risaralda.gov.co','prueba');
$mail->Subject ='hola';
$mail->Body =' hola';

if($mail->send())
{
    echo 'Enviado';
    
}
else
{
    echo 'Error';
}



