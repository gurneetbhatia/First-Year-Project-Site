<?php

include('enter_pin.php');
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

$email = $_POST['email'];
$pin = $_POST['psw'];

$sql = "SELECT `Pin`, UserID FROM `User` WHERE Email='$email'";
$result = doSQL($conn, $sql, true);
if ($result->num_rows > 0) {
    // output data of each row
    if($row = $result->fetch_assoc()) {
    	if (empty($row['Pin'])) {
	    	alert("Email already verified!", "login.php");
	    }
        elseif ($pin === $row['Pin']) {
        	// pin provided is correct
        	$userid = $row['UserID'];
        	$sql = "UPDATE `User` SET `Pin`=NULL WHERE UserID=$userid";
        	doSQL($conn, $sql, true);
        	alert("Correct Pin", "login.php");
        }
       	else {
       		alert("Incorrect Pin Provided!", "enter_pin.php");
       	}
    }
} else {
    alert("Account not found!", 'login.php');
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

function alert($msg, $file)
{
	echo "<script type='text/javascript'>";
	echo "alert('$msg');";
	echo "window.location.href = '$file';";
	echo "</script>";
}



?>