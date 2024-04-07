<?php
  include_once("dbconnect.php");

  $productID=$_POST["viewmediaelementID"];
  $targetDir = "media/" . $productID;

  $file_data = scandir($targetDir);
  $output = '
  <table>
   <tr>
   <th>Media</th> 
   <th>File Name</th> 
   <th>Delete</th>
   </tr>
  ';
  
  foreach($file_data as $file)
  {
   if($file === '.' or $file === '..')
   {
    continue;
   }
   else
   {
    $path = $targetDir . '/' . $file;
    $output .= '
    <tr>
     <td></td>
     <td><a name="'.$path.'" href="'.$path.'">'.$file.'</a></td>
     <td><button name="removemediabtn" class="open-modal-nested" data-target="modal-removemedia">Remove Media</button></td>
    </tr>
    ';
   }
  }
  $output .='</table>';
  echo $output;
 ?>