<?php

$name = "Pierre";
$to      = 'nobody@example.com';
$subject = 'the subject';
$message = file_get_contents("mon_mail.php");
$headers = array(
    'From' => 'webmaster@example.com',
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);

?>

