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
  <div class="header">
   <h1>Your Notes</h1>
 </div>
  </div>
  <h14></h14>
  <form action="notes.php" method="post" enctype="multipart/form-data">
      Select file to upload:
      <input class="inputBrowse" type="file" name="file">
      <input class="inputBrowse1" type="submit" name="submit" value="Upload">

  </form>
   <button class="deletebtn" type="button">Delete a file</button>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
$status = '';

// File upload path
if (!file_exists('uploads/')) {
    mkdir('uploads/', 0777, true);
}

$target_Dir = "uploads/";
$file_Name = basename($_FILES["file"]["name"]);
$target_FilePath = $target_Dir . $file_Name;
$file_Type = pathinfo($target_FilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    //accept certain file formats
    $accepted_Types = array('txt','pdf','xls');
    if(in_array($file_Type, $accepted_Types)){

          if ($_FILES["file"]["size"] > 25000000) { // Check file size
             $status ='<div style="position:absolute; left:50px; bottom:170px;">Sorry, your file is larger than 25MB.</div>';

          }elseif(move_uploaded_file($_FILES["file"]["tmp_name"], $target_FilePath)){
            //$status ='<div style="position:absolute; left:50px; bottom:170px;">The file ".$file_Name. " has been uploaded. <br>Type: " . $_FILES["file"]["type"] . "
          //  <br> Size: " . ($_FILES["file"]["size"] / 1024) . " Kb"</div>';
            $status = '<div style="position:absolute; left:50px; bottom:130px;">The file '.$file_Name.' has been uploaded. <br>
                      Type: ' . $_FILES["file"]["type"] . '
                      <br> Size: ' . ($_FILES["file"]["size"] / 1024) . ' Kb</div>';
        }else{
          $status ='<div style="position:absolute; left:50px; bottom:170px;">Sorry, there was an error uploading your file.</div>';
            //$status = "<br>Sorry, there was an error uploading your file.";
        }

        // If the file is not an accepted type
    }else{
       $status ='<div style="position:absolute; left:50px; bottom:170px;">Sorry, you can only upload TXT & PDF files.</div>';
        //$status = '<br>Sorry, you can only upload TXT & PDF files.';
    }
  }else{
      $status = '';
  }

// Display current status


echo $status;


// display files
$dir = "uploads/";
$n = 1;
// Open the folder

$dir_handle = @opendir($dir) or die("Unable to open $dir");

// Loop through the files
while ($file = readdir($dir_handle)) {

if($file == "." || $file == ".." || $file == "index.php" )
    continue;
  echo '<hr>';
  echo "<pre>                                                        ".$n."-<a href=\"".$dir."/".$file."\">$file</a></pre>";
  $n = $n+1;



}




?>
