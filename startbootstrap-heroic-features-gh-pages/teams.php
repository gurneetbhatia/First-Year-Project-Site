<!DOCTYPE html>
<html lang="en">

<?php

$servername = "remotemysql.com";
$username = "6s7vM7E9Nh";
$password = "NL70C8aGk7";
$database = "6s7vM7E9Nh";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
  die("Connection failed " . mysqli_connect_error());
}

?>

<head>

  <script type="text/javascript" src="main.js"></script>
  <script type="text/javascript" src="index.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Whiteboard | My Teams</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dropdown.css">
  <link rel="stylesheet" href="button.css">
  <link rel="stylesheet" href="sidenav.css">
  <link rel="stylesheet" href="cssteam.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.php"><img class="logo" src="Logo.png" height="30" width="30">Whiteboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar">
        <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="events.php"><i class="fa fa-fw fa-calendar"></i> Events</a>
        <a1 href="teams.php"><i class="fa fa-fw fa-users"></i> Teams</a1>
        <a href="notes.php"><i class="fa fa-fw fa-sticky-note"></i> Notes</a>
        <a href="../Login/login.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </div>
    </div>
  </nav>

  <div id="settingsnav" class="settings">
   <a href="#" id="account">Account</a>
   <a href="#" id="privacy">Privacy</a>
   <a href="#" id="about">About</a>
  </div>

  <!-- New Team Modal -->
    <div id="newTeam" class="modal fade" role="dialog" style="width:1620px;">
      <div class="modal-dialog">
        <div class="modal-content" style="width:800px;">
          <div class="modal-header">
            <h3 class="modal-title" id="New team">New Team Event</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <form method="POST" action="create_team.php?sessionid=<?php echo $_GET['sessionid'] ?>&userid=<?php echo $_GET['userid'] ?>">
                  <div class="form-group">
                    <label for="titleText">Team Name*:</label>
                    <input type="text" class="form-control" name="titleText" id="titleText" required>
                  </div>

                  <div class="form-group">
                    <label for="desText">Description*:</label>
                    <input type="text" class="form-control" name="desText" id="desText" required>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="publicCheck" id="publicCheck">
                    <label class="form-check-label" for="publicCheck">Enable anyone to add members</label>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btnCancel" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btnPrimary">Create Team</button>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>




    <!-- Teams -->
    <div class="contentnewteams">
      <button type="button" class="btnEvent" data-toggle="modal" data-target="#newTeam">
        New Team
      </button>
    </div>


<?php

$sql = "SELECT * FROM `Team`";
$result = doSql($conn, $sql, false);

$counter = 0;
while ($row = mysqli_fetch_row($result)) {
    $counter += 1;
    createButtonForTeam($row[0], $counter, $row[2]);
}

function createButtonForTeam($teamname, $counter, $id) {
    addTeamMember($id);
    addTeamEvent($id);
    createTeamEventModal($id);

    $servername = "remotemysql.com";
    $username = "6s7vM7E9Nh";
    $password = "NL70C8aGk7";
    $database = "6s7vM7E9Nh";

  $conn = mysqli_connect($servername, $username, $password, $database);
  if(!$conn)
  {
    die("Connection failed " . mysqli_connect_error());
  }

      echo "<div class='contentteams'>";
      echo "<button type='button' class='btnTeam' data-toggle='modal' data-target='#team$counter'>";
      echo "$teamname";
      echo "</button>";
      echo "</div>";


    echo "<div class='modal fade bd-example-modal-lg' id='team$counter' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>";
    echo "<div class=\"modal-dialog modal-lg\">";
    echo "<div class=\"modal-content\">";
    echo "<div class=\"modal-header\">";
    echo "<h3 class=\"modal-title\" id=\"Team 1 title\">$teamname</h3>";
    echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
    echo "<span aria-hidden=\"true\">&times;</span>";
    echo "</button>";
    echo "</div>";
    echo "<div class=\"modal-body\">";
    echo "<h5> Members </h5>";
    echo "<div class=\"w3-container\">";
    echo "<ul class=\"w3-ul w3-card-4\">";


    $sql = "SELECT `UserID` FROM `TeamMembership` WHERE `TeamID`='$id'";
    $result = doSQL($conn, $sql, false);
    while($row = mysqli_fetch_row($result)) {
      $sql1 = "SELECT * FROM `User` WHERE `UserID`='$row[0]'";
      $result1 = doSQL($conn, $sql1, false);
      $name = mysqli_fetch_row($result1)[0];

      echo "<li class=\"w3-bar\">";
      echo '<img src="user-512.png" class="" style="width:30px">';
      echo '<div class="w3-bar-item">';
      echo "<span class=\"w3-large\">$name</span><br>";
      echo '</div>';
      echo '</li>';
    }
    echo "</ul>";
    echo "</div>";

    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th class="column" scope="col" margin-top: 5px;>#</th>';
    echo '<th scope="col">Title</th>';
    echo '<th scope="col">Time</th>';
    echo '<th scope="col">Location</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $sql = "SELECT * FROM `Event`";
    $result = doSQL($conn, $sql, true);
    $sql1 = "SELECT `UserID` FROM `TeamMembership` WHERE `TeamID`='$id'";
    $result1 = doSQL($conn, $sql1, true);
    $rows = [];
    while($row = mysqli_fetch_array($result1))
    {
        //echo "here " . $id . $row[0];
        $rows[] = $row[0];
    }
    $counter = 0;
    while($row = mysqli_fetch_row($result)) {
      //echo array_values($rows[0]);
      if(in_array($row[6], $rows)) {
        $counter += 1;
        echo '<tr>';
        echo '<th scope="row">';
        echo $counter;
        echo "</th>";
        echo '<td>';
        echo $row[1];
        echo '</td>';
        echo '<td>';
        echo $row[2];
        echo '</td>';
        echo '<td>';
        echo $row[3];
        echo '</td>';
        echo '</tr>';
      }
    }

    echo "</tbody>";
    echo "</table>";

	echo "<form action=\"http://localhost:3000\">";
	echo "<input class=\"btnPrimary\" target=\"_blank\" type=\"submit\" value=\"Chat\" />";
	echo "</form>";
    echo "<div class=\"modal-footer\">";
    //echo "<button onclick=\"127.0.0.1:3000\" type=\"button\" class=\"btnPrimary\" >Chat</button>";
    //echo "<a href=\"http://localhost:3000\" target=\"_blank\" class=\"btnPrimary\"> Chat</a>";
    echo "<button type=\"button\" class=\"btnCancel\" data-dismiss=\"modal\">Cancel</button>";
    echo "<button type=\"button\" class=\"btnPrimary\" data-toggle=\"modal\" data-dismiss=\"modal\" data-target=\"#newEvent\">";
    echo "+ Team Event";
    echo "</button>";
    echo "<button type=\"button\" class=\"btnPrimary\" data-toggle=\"modal\" data-dismiss=\"modal\" data-target=\"#newMember\">";
    echo "+ Team Member";
    echo "</button>";
    echo "</div>";



    /*<li class="w3-bar">
                    <span onclick="message" class="">✉</span>
                    <img src="user-512.png" class="" style="width:30px">
                    <div class="w3-bar-item">
                      <span class="w3-large">Aissata</span><br>
                    </div>
                  </li>*/

}

function addTeamEvent($id) {

}

function createTeamEventModal($id) {
  $ownerid = $_GET['userid'];
echo '<div class="modal fade" id="newEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
echo '<div class="modal-dialog modal-dialog-centered" role="document">';
echo '';
echo '';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<h5 class="modal-title" id="exampleModalLongTitle">New Team Event</h5>';
echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
echo '<span aria-hidden="true">&times;</span>';
echo '</button>';
echo '</div>';
echo '<div class="modal-body">';
echo '';
echo '';
echo '';
echo '';
echo "<form method='POST' action='team_create_event.php?teamid=" . $id . "&ownerid=" . $ownerid . "'>";
echo '<div class="form-group">';
echo '<label for="titleText">Title*:</label>';
echo '<input type="text" class="form-control" name=\'titleText\' id="titleText" required>';
echo '</div>';
echo '';
echo '<div class="form-group">';
echo '<label for="descriptionText">Description:</label>';
echo '<textarea class="form-control" name="descriptionText" id="descriptionText" rows="3"></textarea>';
echo '</div>';
echo '';
echo '<div class="form-group">';
echo '<label for="date">Date*:</label>';
echo '<input type="date" id="date" name="date"  required>';
echo '</div>';
echo '';
echo '<div class="form-group">';
echo '<label for="appt">Time:</label>';
echo '<input type="time" id="appt" name="appt">';
echo '</div>';
echo '';
echo '<div class="form-group">';
echo '<label for="location">Location*:</label>';
echo '<input type="text" class="form-control" name="location" id="location"  required>';
echo '</div>';
echo '';
//echo '<button type="chat" class="message"></button>';
echo '<div class="form-check">';
echo '<input type="checkbox" class="form-check-input" name="notificationCheck" id="notificationCheck">';
echo '<label class="form-check-label" for="notificationCheck">Enable notifications for this event</label>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btnCancel" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg">Go back</button>';
echo '<button type="submit" class="btnPrimary">Create</button>';
echo '</div>';
echo '</form>';
echo '';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}

function addTeamMember($id) {
echo '<div id="newMember" class="modal fade" role="dialog" style="width:1620px;">';
echo '<div class="modal-dialog">';
echo '<div class="modal-content" style="width:800px;">';
echo '<div class="modal-header">';
echo '<h3 class="modal-title" id="New member">New Member</h3>';
echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
echo '<span aria-hidden="true">&times;</span>';
echo '</button>';
echo '</div>';
echo '<div class="modal-body">';
echo "<form method='POST' action='add_team_member.php?cuserid=" . $_GET['userid'] . "&teamid=" . $id . "'>";
echo '<div class="form-group">';
echo '<label for="titleText">Email Address*:</label>';
echo '<input type="text" class="form-control" name="emailText" id="emailText" required>';
echo '</div>';
echo '<div>';
echo '<button type="button" class="btnCancel" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg">Go back</button>';
echo '<button type="submit" class="btnPrimary">Add Member</button>';
echo '</div>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


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








  <!-- Footer -->
  <footer class="py-5 bg-dark" style="padding-bottom: 10px;">
    <div class="container">

    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
