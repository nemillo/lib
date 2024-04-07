<?php
{
  if(file_exists($_POST["removemediaID"]))
  {
   unlink($_POST["removemediaID"]);
   echo 'File Deleted';
   return header("Location:index.php");
  }
 }

 ?>