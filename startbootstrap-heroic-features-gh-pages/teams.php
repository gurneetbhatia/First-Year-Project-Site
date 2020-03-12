<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Whiteboard - Teams</title>

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
        <a href="#"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </div>
    </div>
  </nav>

  <div id="settingsnav" class="settings">
   <a href="#" id="account">Account</a>
   <a href="#" id="privacy">Privacy</a>
   <a href="#" id="about">About</a>
  </div>


    <!-- Teams -->
    <div class="content">
      <button type="button" class="btnEvent" data-toggle="modal" data-target="#newTeam">
        New Team
      </button>
    </div>
    <!--<div class="content">
      <button type="button" class="btnTeam1" data-toggle="modal" data-target="#exampleModalCenter">
        Team 1
      </button>
    </div>
    <div class="content">
      <button type="button" class="btnTeam2" data-toggle="modal" data-target="#exampleModalCenter">
        Team 2
      </button>
    </div>
    <div class="content">
      <button type="button" class="btnTeam3" data-toggle="modal" data-target="#exampleModalCenter">
        Team 3
      </button>
    </div>-->

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

$sql = "SELECT * FROM `Team`";
$result = doSql($conn, $sql, false);

while ($row = mysqli_fetch_row($result)) {
    createButtonForTeam($row[0]);
}

function createButtonForTeam($teamname) {

    echo "<div class='content'>";
    echo "<button type='button' class='teamBtn' data-toggle='modal' data-target='#displayTeam'>";
    echo "$teamname";
    echo "</button>";
    echo "</div>";

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

    <!-- New Team Member Modal -->
    <div id="newMember" class="modal fade" role="dialog" style="width:1620px;">
      <div class="modal-dialog">
        <div class="modal-content" style="width:800px;">
          <div class="modal-header">
            <h3 class="modal-title" id="New member">New Member</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="titleText">Name*:</label>
                <input type="text" class="form-control" id="titleText" required>
              </div>
              <div>
                <button type="button" class="btnCancel" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg">Go back</button>
                <button type="submit" class="btnPrimary">Add Member</button>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>



    <!-- Team Modal -->
    <div class="modal fade bd-example-modal-lg" id="displayTeam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="Team 1 title">Team 1</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5> Members </h5>
            <div class="w3-container">
              <ul class="w3-ul w3-card-4">
                <li class="w3-bar">
                  <span onclick="message" class="">✉</span>
                  <img src="user-512.png" class="" style="width:30px">
                  <div class="w3-bar-item">
                    <span class="w3-large">Aissata</span><br>
                  </div>
                </li>

                <li class="w3-bar">
                  <span onclick="message" class="">✉</span>
                  <img src="user-512.png" class="" style="width:30px">
                  <div class="w3-bar-item">
                    <span class="w3-large">Andrei</span><br>
                  </div>
                </li>

                <li class="w3-bar">
                  <span onclick="message" class="">✉</span>
                  <img src="user-512.png" class="" style="width:30px">
                  <div class="w3-bar-item">
                    <span class="w3-large">Boran</span><br>
                  </div>
                </li>
              </ul>
            </div>

            <h5> Events </h5>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th class="column" scope="col" margin-top: 5px;>#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Time</th>
                  <th scope="col">Location</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Project Lab</td>
                  <td>12 PM</td>
                  <td>Kilburn LF31</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Manchester City game</td>
                  <td>5 PM</td>
                  <td>Ethiad Stadium</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Meeting</td>
                  <td>9 AM</td>
                  <td>Kilburn 2.113</td>
                </tr>
              </tbody>
            </table>

            <div class="modal-footer">
              <button type="button" class="btnCancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="" data-toggle="modal" data-dismiss="modal" data-target="#newEvent">
                + New Team Event
              </button>
              <button type="button" class="" data-toggle="modal" data-dismiss="modal" data-target="#newMember">
                + New Team Member
              </button>
            </div>
          </div>
        </div>
      </div>
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
                <form method="POST" action='create_team.php?sessionid=<?php echo $_GET['sessionid'] ?>&userid=<?php echo $_GET['userid'] ?>'>
                  <div class="form-group">
                    <label for="titleText">Team Name:</label>
                    <input type="text" class="form-control" name="titleText" id="titleText" required>
                  </div>

                  <div class="form-group">
                    <label for="desText">Description:</label>
                    <input type="text" class="form-control" name="desText" id="desText">
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
