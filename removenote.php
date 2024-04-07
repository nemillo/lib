<?php
  include_once("dbconnect.php");
  
  $noteID=$_POST["removenotesnoteID"];
 
 
  $sentence=$database->prepare("DELETE FROM notes WHERE noteID=:noteID;"); 

  $sentence->bindParam(':noteID',$noteID);
  
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