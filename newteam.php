<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;
$mailgun = new Mailgun::create('key-example');

$key = '';
$domain = " ";

$Option[FROM_WB]= "user.service.whiteboard@gmail.com";
$Option[TO_USER]= "";
$Option[USER_MAIL]= "";
$Option[SUBJECT]= "Your new team";
$Option[BODY_TEXT]= "Hi ! \nYou have successfully created a new team.
                     It's time to invite your friends and share events
                     with them!";

$to = ' ';
$subject = 'Your new adventure with WhiteBoard !';
$confirmMessage = $mailgun->sendMessage($domain, array(
  'from' => "{$Option[FROM_WB]} < {$Option[WB_MAIL]}>",
  'to' => "{$Option[TO_USER]} <{$Option[USER_MAIL]}>",
  'subject' => $Option["SUBJECT"],
  'text' => $Option["BODY_TEXT"],
));

var dump($confirmMessage);

 ?>
