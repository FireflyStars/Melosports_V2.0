<?php
$to      = 'mailtoprasa@gmail.com';
$subject = 'test';
$message = 'hello';
$headers = 'From: admin@leaguerocks.com' . "\r\n" .
    'Reply-To: admin@leaguerocks.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>