<?php
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$tipp = $_POST['tipp'];
$message = $_POST['message'];


$formcontent=" From: $name \n Address: $address \n Phone: $phone \n Tipp: $tipp \n  Message: $message";
$recipient = "florin.rosca.20@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
//mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");



