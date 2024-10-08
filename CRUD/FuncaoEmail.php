<?php
  require("PHPMailer-master\src\PHPMailer.php"); 
  require("PHPMailer-master\src\SMTP.php");
  require("PHPMailer-master\src\Exception.php");

  $token = bin2hex(random_bytes(2));

  $email = $_POST["login"];


  $phpmailer = new PHPMailer\PHPMailer\PHPMailer();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'live.smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 587;
  $phpmailer->Username = 'api';
  $phpmailer->Password = '8f0d636a3bb4531b4d37331c09b0ab82';


  // Sender and recipient settings
  $phpmailer->setFrom('mailtrap@demomailtrap.com', 'From Name');
  $phpmailer->addAddress($email, 'Recipient Name');

  // Sending plain text email
  $phpmailer->isHTML(true); // Set email format to plain text
  $phpmailer->Subject = 'Código de validação';
  $phpmailer->Body    = 'O código é: ' . $token;

  if($phpmailer->send())
  {
    echo " E-mail enviado com sucesso <br>";
  }
  else
  {
    echo " E-mail com problemas <br>";
    echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
  }
?>