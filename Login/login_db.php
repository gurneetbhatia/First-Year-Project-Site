<?php

include('login.php');

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

$email = $_POST['login_email'];
$passwd = $_POST['login_passwd'];

$sql = "SELECT * FROM `User` WHERE Email='$email'";
$result = doSQL($conn, $sql, true);

if($result->num_rows > 0) {
	if ($row = $result->fetch_assoc()) {
		if (empty($row['Pin'])) {
			if (password_verify($passwd, $row['Password'])) {
				// password is correct and the email has been verified
				// create a session id for this user
				$sessionid = rand(10000, 99999);
				$sql = "SELECT `SessionID` FROM `Session` WHERE `SessionID`=$sessionid";
				$result = doSQL($conn, $sql, true);
				if ($result->num_rows > 0) {
					$sessionid = rand(10000, 99999);
					$sql = "SELECT `SessionID` FROM `Session` WHERE `SessionID`=$sessionid";
					$result = doSql($conn, $sql, false);
				}
				$userid = $row['UserID'];
				$sql = "INSERT INTO `Session`(`SessionID`, `UserID`) VALUES ($sessionid, $userid)";
				$GLOBALS['userid'] = $userid;
				$GLOBALS['sessionid'] = $sessionid;
				doSQL($conn, $sql, true);
				changePage("../startbootstrap-heroic-features-gh-pages/home.php?userid=$userid&sessionid=$sessionid");// change this to home page
			}
			else {
				alert('Incorrect Password!');
			}
		}
		else {
			alert('Email ID still needs to be verified!');
		}
	}
}
else {
	alert("Account not found!");
}

function alert($msg)
{
	echo "<script type='text/javascript'>";
	echo "alert('$msg');";
	echo "window.location.href = 'login.php';";
	echo "</script>";
}

function changePage($newpage) {
	echo "<script type='text/javascript'>";
	echo "window.location.href = '$newpage';";
	echo "</script>";
}

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