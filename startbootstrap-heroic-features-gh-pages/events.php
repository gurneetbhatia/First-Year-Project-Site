<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WhiteBoard | My Events</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css1.css">
  <link rel="stylesheet" href="dropdown.css">
  <link rel="stylesheet" href="button.css">
  <link rel="stylesheet" href="sidenav.css">
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
        <a1 href="events.php"><i class="fa fa-fw fa-calendar"></i> Events</a1>
        <a href="teams.php"><i class="fa fa-fw fa-users"></i> Teams</a>
        <a href="notes.php"><i class="fa fa-fw fa-sticky-note"></i> Notes</a>
        <a href="../Login/login.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </div>
    </div>
  </nav>

  <div id="settingsnav" class="settings">
   <a href="settings.html" id="account">Settings</a>
   <a href="policy.html" id="privacy">Privacy</a>
   <a href="us.html" id="about">About</a>
  </div>
  <!-- Page Content -->
  <div class="container">
    <ul>

    </ul>
    <div class="dropdown">
      <button class="dropbtn">Duration</button>
      <div class="dropdown-content">
        <a href="#">Today</a>
        <a href="#">This Week</a>
        <a href="#">This Month</a>
 </div>
</div>



    <!-- Jumbotron Header -->
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


    <!-- Page Features -->

    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Events Button -->
<button type="button" class="btnEvent" data-toggle="modal" data-target="#exampleModalCenter">
  + New Event
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">




            <form method="POST" action="events_db.php?sessionid=<?php echo $_GET['sessionid'] ?>&userid=<?php echo $_GET['userid'] ?>">
              <div class="form-group">
                <label for="titleText">Title:</label>
                <input type="text" class="form-control" name='titleText' id="titleText" required>
              </div>

              <div class="form-group">
                <label for="descriptionText">Description:</label>
                <textarea class="form-control" name="descriptionText" id="descriptionText" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date"  required>
              </div>

              <div class="form-group">
                <label for="appt">Time:</label>
                <input type="time" id="appt" name="appt">
              </div>

              <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" name="location" id="location"  required>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="notificationCheck" id="notificationCheck">
                <label class="form-check-label" for="notificationCheck">Enable notifications for this event</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btnCancel" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btnPrimary">Create</button>
              </div>
            </form>

      </div>
    </div>
  </div>
</div>



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
