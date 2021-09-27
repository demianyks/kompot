<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$email = new PHPMailer(true);
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

// header('Content-type: application/json');
echo json_encode($response);
?>