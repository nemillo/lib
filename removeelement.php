<?php
  include_once("dbconnect.php");
  
  $elementID=$_POST["removeElementID"];
  
  $targetDir = "media/" . $elementID;
  
  $files = scandir($targetDir);
  foreach($files as $file)
  {
   if($file === '.' or $file === '..')
   {
    continue;
   }
   else
   {
    unlink($targetDir . '/' . $file);
   }
  }
  if(!rmdir($targetDir)){
    echo "error removing media directory";
    return "error removing media directory";
  }
  
  $sentence=$database->prepare("DELETE FROM base WHERE ID=:elementID;"); 

  $sentence->bindParam(':elementID',$elementID);
  
  if($sentence->execute()){
      return header("Location:index.php");
  }
  else{
    echo "error SQL"  ;  
    echo "\nPDOStatement::errorInfo():\n";
    $arr = $sentence->errorInfo();
    print_r($arr);
    return "error";
  }

?>