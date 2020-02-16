<?php

require '../vendor/autoload.php';
use Mailgun\Mailgun;
use Mailgun\HttpClient\HttpClientConfigurator;
$mailgunC = new Mailgun('b27d88a95403dec1ae7c41d620df9603-52b6835e-819d5378');

//$key = '';
$domain = "sandbox91a3c6061d6446f29f6c12f2a968d4a0.mailgun.org";

$email = $_GET['email'];
$pin = $_GET['pin'];

$Option[FROM_WB]= "user.service.whiteboard@sandbox91a3c6061d6446f29f6c12f2a968d4a0.mailgun.org";
$Option[TO_USER]= $email;
$Option[USER_MAIL]= $email;
$Option[SUBJECT]= "Registration confirmation";
$Option[BODY_TEXT]= "Hi ! \nYou have successfully registered to WhiteBoard.
                     Next step? Login and discover the magic !";
$OPTION[BODY_HTML]="<html>
                   <h1 style=color:rgb(85,182,183)>Welcome to WhiteBoard</h1>
                   <p>Hi ! \nYou have successfully registered to WhiteBoard. \n You confirmation pin is $pin \n
                   Next step? Login and discover the magic !</p>
                   </html>";

$to = ' ';
$subject = 'Your new adventure with WhiteBoard !';
$confirmMessage = $mailgun->sendMessage($domain, array(
  'from' => "{$Option[FROM_WB]} < {$Option[WB_MAIL]}>",
  'to' => "{$Option[TO_USER]} <{$Option[USER_MAIL]}>",
  'subject' => $Option[SUBJECT],
  'text' => $Option[BODY_TEXT],
));

$result = $m;

$result = $mailgunC->messages()->send($domain, $confirmMessage);
changePage("../Login/enter_pin.php");

function changePage($newpage) {
	echo "<script type='text/javascript'>";
	echo "window.location.href = '$newpage';";
	echo "</script>";
}

 ?>

