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
             $status = "Sorry, your file is larger than 25MB.";

          }elseif(move_uploaded_file($_FILES["file"]["tmp_name"], $target_FilePath)){
            $status = "The file ".$file_Name. " has been uploaded.";
        }else{
            $status = "Sorry, there was an error uploading your file.";
        }

        // If the file is not an accepted type
    }else{
        $status = 'Sorry, you can only upload TXT & PDF files.';
    }
}else{
    $status = 'Please select a file to upload.';
}

// Display current status
echo $status;
?>
