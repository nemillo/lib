<?php
  include_once("dbconnect.php");
  
  $noteID=$_POST["editnotesnoteID"];
  $elementID=$_POST["editnoteselementID"];
  $note=$_POST["editnotesNote"];
  $noteDate=$_POST["editnotesNoteDate"];
 
  $sentence=$database->prepare("UPDATE notes SET noteID=:noteID,note=:note,noteDate=:noteDate,elementID=:elementID WHERE noteID=:noteID;"); 

  $sentence->bindParam(':noteID',$noteID);
  $sentence->bindParam(':note',$note);
  $sentence->bindParam(':noteDate',$noteDate);
  $sentence->bindParam(':elementID',$elementID);
  
  if($sentence->execute()){
      return header("Location:index.php");
  }
  else{
    echo "error"  ; 
    $arr = $sentence->errorInfo();
    print_r($arr);
    return "error";
  }

?>