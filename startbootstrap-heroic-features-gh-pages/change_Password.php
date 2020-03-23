<?php
session_start();
?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Whiteboard | Home</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="cssnotes.css">
  <link rel="stylesheet" href="csshome1.css">
  <link rel="stylesheet" href="stylesheet1.css">
  <link rel="stylesheet" href="sidenav.css">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

<div class="textt">
  <p>WELCOME TO WHITEBOARD</p>
</div>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.php"><img class="logo" src="Logo.png" height="30" width="30">Whiteboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar">
        <a1 href="home.php"><i class="fa fa-fw fa-home"></i> Home</a1>
        <a href="events.php"><i class="fa fa-fw fa-calendar"></i> Events</a>
        <a href="teams.php"><i class="fa fa-fw fa-users"></i> Teams</a>
        <a href="notes.php"><i class="fa fa-fw fa-sticky-note"></i> Notes</a>
        <a href=""><i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </div>
    </div>
  </nav>


  <!-- Page Content -->

    <!-- Jumbotron Header -->

 <button type="button" style="background-color: #4CAF50; border-radius: 8px; border: 2px solid black" onclick="location.href='settings.html'">Go back</button>

    <!-- Page Features -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark" style="padding-bottom: 10px;">
    <div class="container">
       <p1>
         WHITEBOARD<sup>©</sup>
       </p1>

    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


<?php
$conn = mysqli_connect("remotemysql.com:3306", "6s7vM7E9Nh", "NL70C8aGk7", "6s7vM7E9Nh") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = doSQL($conn, "SELECT * from User WHERE userId='" . $_SESSION["userId"] . "'", true);
    $row = mysqli_fetch_array($result);
    if(password_verify($_POST['currentPassword'], $row['Password'])) {
      $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        doSQL($conn, "UPDATE User set Password='" . $password . "' WHERE UserID='" . $_SESSION["userId"] . "'", true);
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
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

<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
}
return output;
}
</script>
</head>
<body>
<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Change Password</td>
</tr>
<tr>
<td width="40%"><label>Current Password</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>
