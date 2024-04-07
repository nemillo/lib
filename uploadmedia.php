<?php
include_once("dbconnect.php");

$productID=$_POST["uploadMediaElementID"];
$targetDir = "media/" . $productID;

if($_FILES["uploadmedia"]["name"] != '')
{
 $data = explode(".", $_FILES["uploadmedia"]["name"]);
 $extension = $data[1];
 $allowed_extension = array("jpg", "png", "gif","pdf", "epub", "cbr", "cbz");
 if(in_array($extension, $allowed_extension))
 {
  $new_file_name = $targetDir . '/' . $_FILES["uploadmedia"]["name"];
  if(move_uploaded_file($_FILES["uploadmedia"]["tmp_name"], $new_file_name))
  {
   echo 'Media Uploaded';
   return header("Location:index.php");
  }
  else
  {
   echo 'There is some error';
  }
 }
 else
 {
    print_r($data);
    echo 'Invalid Media File';
 }
}
else
{
 print_r($_FILES);
 echo 'Please Select Media';
}
?>