<?php
require_once "Mail.php";

$from = '<adriansoft93@gmail.com>';
$to = '<susanarebollo96@gmail.com>';
$subject = 'Probando SMTP';
$body = "Te ha llegadoo";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '25',
        'auth' => true,
        'username' => 'Susana Rebollo',
        'password' => 'GradoSuperior1415!'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
	
    echo('<p>Message successfully sent!</p>');

}
?>