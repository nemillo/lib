<?php
  include_once("dbconnect.php");
  
  $Tag=$_POST["newtagtag"];
  $Comments=$_POST["newtagcomments"];
   
  $sentence=$database->prepare("INSERT INTO tags (tag,comments)
   VALUES(:Tag,:Comments);");

 
  if (!$sentence) {
  echo "\nPDO::errorInfo():\n";
  print_r($sentence->errorInfo());
  }  
  
  $sentence->bindParam(':Tag',$Tag);
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