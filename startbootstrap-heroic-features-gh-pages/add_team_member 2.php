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

$email = $_POST['emailText'];
$teamid = $_GET['teamid'];

$sql = "SELECT `UserID` FROM `User` WHERE `Email`='$email'";
$result = doSQL($conn, $sql, true);
if ($result->num_rows == 0) {
	alert("No account linked to provided email!");
	$cuserid = $_GET['cuserid'];
	changePage("teams.php?userid=$cuserid");
} else {
	$userid = mysqli_fetch_row($result)[0];
	$sql = "SELECT `UserID` FROM `TeamMembership` WHERE `TeamID`='$teamid' AND `UserID`='$userid'";
	$result = doSQL($conn, $sql, true);
	if($result->num_rows > 0) {
		alert('User already in team!');
		$cuserid = $_GET['cuserid'];
		changePage("teams.php?userid=$cuserid");
	}
	else {
		$sql = "INSERT INTO `TeamMembership`(`TeamID`, `UserID`) VALUES ('$teamid', '$userid')";
		doSQL($conn, $sql, true);
		$cuserid = $_GET['cuserid'];
		changePage("teams.php?userid=$cuserid");
	}
}


function alert($msg)
{
	echo "<script type='text/javascript'>";
	echo "alert('$msg');";
	echo "</script>";
}

function changePage($newpage)
{
	echo "<script type='text/javascript'>";
	echo "window.location.href = '$newpage';";
	echo "</script>";
}

?>