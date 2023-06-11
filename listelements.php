<?php
  include_once("dbconnect.php");
  
  $orderBy = $_POST["orderBy"];
  
  if($orderBy==undefined){
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

  $sentencetags=$database->query("SELECT tags_elements.elementID,tags_elements.tagID,tags.tag
  FROM tags_elements
  INNER JOIN tags ON tags_elements.tagID = tags.tagID");
  $tags=$sentencetags->fetchAll(PDO::FETCH_OBJ);

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
          <th>Author</th>
          <th>Language</th>
          <th>Support</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Abstract</th>
          <th>Stars</th>
          <th>Tags</th>
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
           <td><button name="viewnotesbtn" class="open-modal ViewNotes" data-target="modal-viewnotes">View Notes</button></td>
           <td><button name="newnotebtn" class="open-modal NewNote" data-target="modal-newnote">New Note</button></td>
        </tr>
    ';
    }
    $output .= '
    </tbody>
    </table><br>
    ';
    echo $output;
       
?>