<?php
  include_once("dbconnect.php");
  
  $Name=$_POST["newauthorName"];
  $Surname=$_POST["newauthorLastName"];
  $Comments=$_POST["newauthorComments"];
 
  $sentence=$database->prepare("INSERT INTO authors (Surname,Name,Comments)
   VALUES(:Surname,:Name,:Comments);");

 
  if (!$sentence) {
  echo "\nPDO::errorInfo():\n";
  print_r($sentence->errorInfo());
  }  
  
  $sentence->bindParam(':Surname',$Surname);
  $sentence->bindParam(':Name',$Name);
  $sentence->bindParam(':Comments',$Comments);
  
 
  
  if($sentence->execute()){
    return header("Location:index.php");
  } else
  {
    echo "error sentence" ;
    echo "\nPDOStatement::errorInfo():\n";
    $arr = $sentence->errorInfo();
    print_r($arr);
    return "error";
  }

?>