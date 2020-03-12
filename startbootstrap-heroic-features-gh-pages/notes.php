<!DOCTYPE html>
<html>


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Heroic Features - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="cssnotes.css">
  <link rel="stylesheet" href="cssnotes1.css">
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
        <a href="events.php"><i class="fa fa-fw fa-calendar"></i> Events</a>
        <a href="teams.php"><i class="fa fa-fw fa-users"></i> Teams</a>
        <a1 href="notes.php"><i class="fa fa-fw fa-sticky-note"></i> Notes</a1>
        <a href=""><i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </div>
    </div>
  </nav>

  <div id="settingsnav" class="settings">
   <a href="#" id="account">Account</a>
   <a href="#" id="privacy">Privacy</a>
   <a href="#" id="about">About</a>
  </div>

  </div>

  <form action="notes.php" method="post" enctype="multipart/form-data">
      Select file to upload:
      <input class="inputBrowse" type="file" name="file">
      <input class="inputBrowse1" type="submit" name="submit" value="Upload">
  </form>

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
