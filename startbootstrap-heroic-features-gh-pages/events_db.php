<?php

$servername = "remotemysql.com:3306";
$username = "6s7vM7E9Nh";
$password = "NL70C8aGk7";
$database = "6s7vM7E9Nh";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
	die("Connection failed " . mysqli_connect_error());
}
echo "Connected Successfully";

$title = $_POST['titleText'];
$description = $_POST['descriptionText'];
$date = $_POST['date'];
$time = $_POST['appt'];
$location = $_POST['location'];
$notif = $_POST['notificationCheck'];
$owner = $_GET['userid'];

$id = rand(10000, 99999);
$sql = "SELECT * FROM `Event` WHERE `EventID`=$id";
$result = doSQL($conn, $sql, true);
while ($result->num_rows > 0) {
	$id = rand(1000, 9999);
	$sql = "SELECT * FROM `Event` WHERE `EventID`=$id";
	$result = doSql($conn, $sql, false);
}
$datetime =  ($date . ' ' . $time . ':00');
if(empty($notif)) {
	$notif = 0;
} else {
	$notif = 1;
}

$sql = "INSERT INTO `Event`(`EventID`, `Title`, `Time`, `Location`, `Description`, `Notifications_En`, `OwnerID`) VALUES ($id, '$title', '$datetime', '$location', '$description', $notif, $owner)";
doSql($conn, $sql, true);

function doSQL($conn, $sql, $testMsgs)
{
	if($testMsgs)
	{
		echo ("<br><code>SQL: $sql</code>");
		if ($result = $conn->query($sql))
			echo ("<code> - OK </code>");
		else
			echo ("<code> - FAIL! " . $conn->error . " </code>");
	}
	else
		$result = $conn->query($sql);
	return $result;
}

?>