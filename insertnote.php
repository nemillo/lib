<?php
  include_once("dbconnect.php");
  
  $Note=$_POST["newNote"];
  $Date=$_POST["newNoteDate"];
  $ElementID=$_POST["newNoteElementID"];
    
  $sentence=$database->prepare("INSERT INTO notes (note,noteDate,elementID)
   VALUES(:Note,:Date,:ElementID);");

 
  if (!$sentence) {
  echo "\nPDO::errorInfo():\n";
  print_r($sentence->errorInfo());
  }  
  
  $sentence->bindParam(':Note',$Note);
  $sentence->bindParam(':Date',$Date);
  $sentence->bindParam(':ElementID',$ElementID);
  
  $sentence->execute();
    
  return header("Location:index.php");
?>