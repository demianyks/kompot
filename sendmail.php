<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$email = new PHPMailer(true);
$email->isSMTP();
$email->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$email->Port = 587; // Which port to use, 587 is the default port for TLS security.
$email->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$email->SMTPAuth = true; // Whether you need to login. This is almost always required.
$email->Username = 'kompot.uz.ua@gmail.com'; // Your Gmail address.
$email->Password = 'pdwhjeumwxgzoisd'; // Your Gmail login password or App Specific Password.

$email->CharSet='UTF-8';
$email->setLanguage('ru','phpmailer/language/');
$email->isHTML(true);

$email->setFrom('kompot.uz.ua@gmail.com','KOMPOT');
$email->addAddress("kompot.uz.ua@gmail.com");

$email->Subject='Перезвоніть мені';


if(trim(!empty($_POST['name'])))
	$body='<p>Від '.$_POST['name'].'</p>';

if(trim(!empty($_POST['phone'])))
	$body.='<p>Номер телефону: '.$_POST['phone'].'</p>';


$email->Body = $body;

if(!$email->send()){
	$message = 'Помилка!'; 
} else{
	$message = 'Дані надіслано!';
};

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>