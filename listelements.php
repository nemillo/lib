<?php
  include_once("dbconnect.php");
  
  $orderBy = $_POST["orderBy"];
  $orderTag = $_POST["orderTag"];
  
  if($orderBy=="undefined"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.ID;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }
  
  if($orderBy=="base.ID"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.ID;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="base.Title"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.Title;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="base.Author"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY authors.Surname;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="base.Language"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.Language;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="base.Support"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.Support;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="base.StartDate"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.StartDate;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="base.EndDate"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.EndDate;");
  
    if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="base.Stars"){
    $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
    authors.Name,authors.Surname ,supports.support,languages.language
    FROM base 
    INNER JOIN authors ON base.Author = authors.authorID
    INNER JOIN languages ON base.Language = languages.languageID
    INNER JOIN supports ON base.Support = supports.supportID
    ORDER BY base.Stars;");
  
    if($sentence->execute()){
      $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        echo 'error sentence authors';
    }
  }

  if($orderBy=="selecttags"){
    if($orderTag=="All tags"){
      $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
      authors.Name,authors.Surname ,supports.support,languages.language
      FROM base 
      INNER JOIN authors ON base.Author = authors.authorID
      INNER JOIN languages ON base.Language = languages.languageID
      INNER JOIN supports ON base.Support = supports.supportID
      ORDER BY base.ID;");
  
      if($sentence->execute()){
          $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
      }
      else{
          echo 'error sentence authors';
      }
    }
    else{
      $sentence=$database->prepare("SELECT base.ID,base.Title,base.Stars,base.StartDate,base.EndDate,base.Abstract,
      authors.Name,authors.Surname ,supports.support,languages.language,tags_elements.elementID,tags_elements.tagID,tags.tag
      FROM base 
      INNER JOIN authors ON base.Author = authors.authorID
      INNER JOIN languages ON base.Language = languages.languageID
      INNER JOIN supports ON base.Support = supports.supportID
      INNER JOIN tags_elements ON base.ID = tags_elements.elementID
      INNER JOIN tags ON tags_elements.tagID = tags.tagID
      WHERE tags.tag = '$orderTag'
      ;");
  
      if($sentence->execute()){
        $elements=$sentence->fetchAll(PDO::FETCH_OBJ);
      }
      else{
        echo 'error sentence authors';
      }
    } 
  }  

  $sentencetags=$database->query("SELECT tags_elements.elementID,tags_elements.tagID,tags.tag
  FROM tags_elements
  INNER JOIN tags ON tags_elements.tagID = tags.tagID");
  $tags=$sentencetags->fetchAll(PDO::FETCH_OBJ);

  $sentencetags2=$database->query("SELECT tags.tag
  FROM tags");
  $taglist=$sentencetags2->fetchAll(PDO::FETCH_OBJ);

  $sentenceauthors=$database->query("SELECT * FROM authors;");
  $authors=$sentenceauthors->fetchAll(PDO::FETCH_OBJ);

  $sentencelanguages=$database->query("SELECT * FROM languages;");
  $languages=$sentencelanguages->fetchAll(PDO::FETCH_OBJ);

  $sentencesupports=$database->query("SELECT * FROM supports;");
  $supports=$sentencesupports->fetchAll(PDO::FETCH_OBJ);

  $sentencestars=$database->query("SELECT * FROM stars;");
  $stars=$sentencestars->fetchAll(PDO::FETCH_OBJ);

  $sentencetags=$database->query("SELECT * FROM tags;");
  $newelementtags=$sentencetags->fetchAll(PDO::FETCH_OBJ);

  $output = '
  <table>
      <thead>
        <tr>
          <th name="base.ID" class="ordercol">ID</th>
          <th name="base.Title" class="ordercol">Title</th>
          <th name="base.Author" class="ordercol">Author</th>
          <th name="base.Language" class="ordercol">Language</th>
          <th name="base.Support" class="ordercol">Support</th>
          <th name="base.StartDate" class="ordercol">Start Date</th>
          <th name="base.EndDate" class="ordercol">End Date</th>
          <th name="base.Abstract">Abstract</th>
          <th name="base.Stars" class="ordercol">Stars</th>
          <th name="base.Tags">Tags:<select class="filtertags" name="selecttags"><option value="" selected disabled hidden>Choose here</option>
            <option class="filtertags" value="alltags">All tags</option>';
            foreach($taglist as $tagitem){
              $output .= '<option  class="filtertags" value='.$tagitem->tag.'>';
              $output .= $tagitem->tag;
              $output .= '</option>';
            }
            $output .= '</select></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
  ';
  
       
    foreach($elements as $element) {
        $image = 'img/'.$element->Stars.'.png';
        $output .= '
        <tr>
           <td>'.$element->ID.'</td>
           <td>'.$element->Title.'</td>
           <td>'.$element->Surname.', '.$element->Name.'</td>
           <td>'.$element->language.'</td>
           <td>'.$element->support.'</td>
           <td>'.$element->StartDate.'</td>
           <td>'.$element->EndDate.'</td>
           <td>'.$element->Abstract.'</td>
           <td><img src="'.$image.'"width = "101" height = "20"></td>
           <td>';
           foreach($tags as $tag) {
            if ($element->ID == $tag->elementID){
                $output .=  $tag->tag .= ' ';
            } 
            }
           $output .= '</td>
           <td><button name="viewmediabtn" class="open-modal ViewMedia" data-target="modal-viewmedia">View Media</button></td>
           <td><button name="uploadmediabtn" class="open-modal UploadMedia" data-target="modal-uploadmedia">Upload Media</button></td>
           <td><button name="viewnotesbtn" class="open-modal ViewNotes" data-target="modal-viewnotes">View Notes</button></td>
           <td><button name="newnotebtn" class="open-modal NewNote" data-target="modal-newnote">New Note</button></td>
           <td><button name="removeelementbtn" class="open-modal RemoveElement" data-target="modal-removeelement">Remove Element</button></td>
        </tr>
    ';
    }
    $output .= '
    </tbody>
    </table><br>
    ';
  
    echo $output;
    
?>