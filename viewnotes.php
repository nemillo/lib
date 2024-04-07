<?php
  include_once("dbconnect.php");

  $elementID=$_POST["viewnoteselementID"];
  $sentencenotes=$database->prepare("SELECT * FROM notes WHERE elementID=:ElementID;");
  $sentencenotes->bindParam(':ElementID',$elementID);
  if($sentencenotes->execute()){
    $notes = $sentencenotes->fetchAll(PDO::FETCH_OBJ);
  }
  else{echo 'error sentence suppliers';}
  $output = '
  <table>
   <tr>
   <th>Note Global ID</th> 
   <th>Element ID</th> 
   <th>Note Date</th>
   <th>Note</th>
   <th></th>
   <th></th>
   </tr>
  ';
  
  foreach($notes as $note)
  {
   $output .= '
    <tr>
    <td>'.$note->noteID.'</td> 
    <td>'.$note->elementID.'</td> 
    <td>'.$note->noteDate.'</td>
     <td>'.$note->note.'</td>
     <td><button name="editnotebtn" class="open-modal-nested" data-target="modal-editnote">Edit Note</button></td>
     <td><button name="removenotebtn" class="open-modal-nested" data-target="modal-removenote">Remove Note</button></td>
    </tr>
    ';
   }
  $output .='</table>';
  echo $output;
 ?>