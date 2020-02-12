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
$name = $_POST['reg_name'];
$email = $_POST['reg_email'];
$pin = rand(1000, 9999);
$password = password_hash($_POST['reg_passwd'], PASSWORD_DEFAULT);
$userid = rand(10000, 99999);
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO User (Name, Email, Pin, Password, UserID, Created_At) VALUES ('$name', '$email', '$pin', '$password', '$userid', '$date');";
doSQL($conn, $sql, true);

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
