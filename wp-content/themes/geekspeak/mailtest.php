<?php

error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

$to      = 'mc.pakage@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: info@geekspeak.co.nz' . "\r\n" .
    'Reply-To: info@geekspeak.co.nz' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$result = mail($to, $subject, $message, $headers);
var_dump($result);

?>