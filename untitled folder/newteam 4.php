<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;
$mailgunC = new Mailgun::create('b27d88a95403dec1ae7c41d620df9603-52b6835e-819d5378');

$key = '';
$domain = "sandbox91a3c6061d6446f29f6c12f2a968d4a0.mailgun.org";

$Option[FROM_WB]= "user.service.whiteboard@gmail.com";
$Option[TO_USER]= "";
$Option[USER_MAIL]= "";
$Option[SUBJECT]= "Your new team";
$Option[BODY_TEXT]= "Hi ! \nYou have successfully created a new team.
                     It's time to invite your friends and share events
                     with them!";
$OPTION[BODY_HTML]="<html>
                    <h1 style=color:rgb(85,182,183)>Your new team</h1>
                    <p>Hi ! \nYou have successfully created a new team.
                     It's time to invite your friends and share events
                     with them!</p>
                     </html>";

$to = ' ';
$subject = 'Your new adventure with WhiteBoard !';
$teamMessage = $mailgun->sendMessage($domain, array(
  'from' => "{$Option[FROM_WB]} < {$Option[WB_MAIL]}>",
  'to' => "{$Option[TO_USER]} <{$Option[USER_MAIL]}>",
  'subject' => $Option[SUBJECT],
  'text' => $Option[BODY_TEXT],
));

$result = $mailgunC->messages()->send($domain, teamMessage);

 ?>
