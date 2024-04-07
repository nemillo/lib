<?php
  include_once("dbconnect.php");
  
  $Title=$_POST["newelementTitle"];
  $Author=explode(" ,",$_POST["newelementAuthor"]);
  $Language=$_POST["newelementLanguage"];
  $Support=$_POST["newelementSupport"];
  $StartDate=$_POST["newelementStartDate"];
  $EndDate=$_POST["newelementEndDate"];
  $Abstract=$_POST["newelementAbstract"];
  $Stars=$_POST["newelementStars"];
  if (isset($_POST["newelementTags"])) {$Tags=$_POST["newelementTags"];} else {$Tags="";}
  
  $sentenceauthor=$database->prepare("SELECT authorID FROM authors WHERE Surname=:authorSurname;");
  $sentenceauthor->bindParam(':authorSurname',$Author[0]);
  if($sentenceauthor->execute()){
    $resultauthor = $sentenceauthor->fetch(PDO::FETCH_BOTH);
    $AuthorID = $resultauthor[0];
  }
  else{echo 'error sentence authors';}

  $sentencelanguage=$database->prepare("SELECT languageID FROM languages WHERE language=:language;");
  $sentencelanguage->bindParam(':language',$Language);
  if($sentencelanguage->execute()){
    $resultlanguage = $sentencelanguage->fetch(PDO::FETCH_BOTH);
    $LanguageID = $resultlanguage[0];
  }
  else{echo 'error sentence language';}
  
  $sentencesupports=$database->prepare("SELECT supportID FROM supports WHERE support=:support;");
  $sentencesupports->bindParam(':support',$Support);
  if($sentencesupports->execute()){
    $resultsupports = $sentencesupports->fetch(PDO::FETCH_BOTH);
    $SupportID = $resultsupports[0];
  }
  else{echo 'error sentence supports';}

  $StarsID = $Stars;

  $sentence=$database->prepare("INSERT INTO base (Title,Author,Language,Support,StartDate,EndDate,Abstract,Stars)
   VALUES(:Title,:AuthorID,:LanguageID,:SupportID,:StartDate,:EndDate,:Abstract,:Stars);");

 
  if (!$sentence) {
  echo "\nPDO::errorInfo():\n";
  print_r($sentence->errorInfo());
  }  
  
  $sentence->bindParam(':Title',$Title);
  $sentence->bindParam(':AuthorID',$AuthorID);
  $sentence->bindParam(':LanguageID',$LanguageID);
  $sentence->bindParam(':SupportID',$SupportID);
  $sentence->bindParam(':StartDate',$StartDate);
  $sentence->bindParam(':EndDate',$EndDate);
  $sentence->bindParam(':Abstract',$Abstract);
  $sentence->bindParam(':Stars',$Stars);
 
  
  $sentence->execute();
    
  $sentence3=$database->query("SELECT MAX(ID) FROM base;");
  $result = $sentence3->fetch(PDO::FETCH_BOTH);
  $productID = $result[0];
  $targetDir = "media/" . $productID;
    
  if(!file_exists($targetDir)){
    mkdir($targetDir, 0777, true); 
       echo 'Folders Created';
      } else
      {
        echo 'Folders Already Created';
      }
   
  $sentence2=$database->query("SELECT MAX(ID) FROM base;");
  $maxID = $sentence2->fetch(PDO::FETCH_BOTH);
  $elementID = $maxID[0];

  if(!empty($Tags)){
    $N = count($Tags);
    for($i=0; $i < $N; $i++)
    {
      $sentencetagselements=$database->prepare("INSERT INTO tags_elements (elementID,tagID) VALUES(:elementID,:tagID);");
      if (!$sentencetagselements) {
       echo "\nPDO::errorInfo():\n";
        print_r($sentencetagselements->errorInfo());
      }  
      $sentencetagselements->bindParam(':elementID',$elementID);
      $sentencetagselements->bindParam(':tagID',$Tags[$i]);

      $sentencetagselements->execute();
      
      
    }
  }


  return header("Location:index.php");
?>