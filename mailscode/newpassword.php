<?php

require 'vendor/autoload.php';        // import vendor
use Mailgun\Mailgun;
$mailgunC = new Mailgun::create('b27d88a95403dec1ae7c41d620df9603-52b6835e-819d5378');

$key = '';                            // whiteboard key and domain
$domain = "sandbox91a3c6061d6446f29f6c12f2a968d4a0.mailgun.org";

$Option[FROM_WB]= "user.service.whiteboard@gmail.com";
$Option[TO_USER]= "";
$Option[USER_MAIL]= "";
$Option[SUBJECT]= "Changing password";
$Option[BODY_TEXT]= "Hi ! \n
                     You have successfully changed your password on WhiteBoard.";
$OPTION[BODY_HTML]="<html>
                    <h1 style=color:rgb(85,182,183)>Everything sorted</h1>
                    </html>
                    <p>Hi ! \n
                    You have successfully changed your password on WhiteBoard.</p>
                    </html>";

$to = ' ';
$subject = 'Your new adventure with WhiteBoard !';
$passwordMessage = $mailgun->sendMessage($domain, array(
  'from' => "{$Option[FROM_WB]} < {$Option[WB_MAIL]}>",
  'to' => "{$Option[TO_USER]} <{$Option[USER_MAIL]}>",
  'subject' => $Option[SUBJECT],
  'text' => $Option[BODY_TEXT],
));

$result = $mailgunC->messages()->send($domain, $passwordMessage);

 ?>
