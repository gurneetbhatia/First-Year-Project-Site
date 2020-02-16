<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;
$mailgunC = new Mailgun::create('b27d88a95403dec1ae7c41d620df9603-52b6835e-819d5378');

$key = '';
$domain = "sandbox91a3c6061d6446f29f6c12f2a968d4a0.mailgun.org";

$Option[FROM_WB]= "user.service.whiteboard@gmail.com";
$Option[TO_USER]= "";
$Option[USER_MAIL]= "";
$Option[SUBJECT]= "Share exciting events";
$Option[BODY_TEXT]= "Hi ! \nYou have been invited to a new team on Whiteboard...
                     What are you waiting for ?
                     Login and see what exciting events there are. ";
$OPTION[BODY_HTML]="<html>
                    <h1 style=color:rgb(85,182,183)>Share exciting events</h1>
                    <p>Hi ! \nYou have been invited to a new team on Whiteboard...
                    What are you waiting for ?
                    Login and see what exciting events there are.</p>
                    </html>";

$to = ' ';
$subject = 'Your new adventure with WhiteBoard !';
$joinMessage = $mailgun->sendMessage($domain, array(
  'from' => "{$Option[FROM_WB]} < {$Option[WB_MAIL]}>",
  'to' => "{$Option[TO_USER]} <{$Option[USER_MAIL]}>",
  'subject' => $Option[SUBJECT],
  'text' => $Option[BODY_TEXT],
));

$result = $mailgunC->messages()->send($domain, $joinMessage);

 ?>
