<?php

include('teams.php');

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

$name = $_POST['titleText'];
$description = $_POST['desText'];
$publicCheck = $_POST['publicCheck'];
$ownerid = $_GET['userid'];

$id = rand(10000, 99999);
$sql = "SELECT * FROM `Team` WHERE `TeamID`=$id";
$result = doSQL($conn, $sql, true);
while ($result->num_rows > 0) {
	$id = rand(10000, 99999);
	$sql = "SELECT * FROM `Team` WHERE `TeamID`=$id";
	$result = doSql($conn, $sql, false);
}

if(empty($publicCheck)) {
	$publicCheck = 0;
} else {
	$publicCheck = 1;
}

$sql = "INSERT INTO `Team`(`Name`, `Description`, `TeamID`, `Privacy`, `OwnerID`) VALUES ('$name', '$description', '$id', '$publicCheck', '$ownerid')";
doSql($conn, $sql, true);

$sql = "INSERT INTO `TeamMembership`(`TeamID`, `UserID`) VALUES ('$id', '$ownerid')";
doSql($conn, $sql, true);


$sessionid = $_GET['sessionid'];
$userid = $_GET['userid'];
changePage("teams.php?sessionid=$sessionid&userid=$userid");

function changePage($newpage) {
	echo "<script type='text/javascript'>";
	echo "window.location.href = '$newpage';";
	echo "</script>";
}


/*function doSQL($conn, $sql, $testMsgs)
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
}*/

?>