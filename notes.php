<!DOCTYPE html>
<html>

<h1> Notes </h1>


<body>
  <form action="notes.php" method="post" enctype="multipart/form-data">
      Select file to upload:
      <input type="file" name="file">
      <input type="submit" name="submit" value="Upload">
  </form>
</body>
</html>

<?php
$status = '';

// File upload path
$target_Dir = "uploads/";
$file_Name = basename($_FILES["file"]["name"]);
$target_FilePath = $target_Dir . $file_Name;
$file_Type = pathinfo($target_FilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    //accept certain file formats
    $accepted_Types = array('txt','pdf','xls');
    if(in_array($file_Type, $accepted_Types)){

          if ($_FILES["file"]["size"] > 25000000) { // Check file size
             $status = "<br>Sorry, your file is larger than 25MB.";

          }elseif(move_uploaded_file($_FILES["file"]["tmp_name"], $target_FilePath)){
            $status = "<br>The file ".$file_Name. " has been uploaded.";
        }else{
            $status = "<br>Sorry, there was an error uploading your file.";
        }

        // If the file is not an accepted type
    }else{
        $status = '<br>Sorry, you can only upload TXT & PDF files.';
    }
  }else{
      $status = '';
  }

// Display current status
echo $status;

?>
