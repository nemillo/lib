<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <style>
    .modal-fader {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      z-index: 99998;
      background: rgba(0,0,0,0.8);
    }
    .modal-fader.active {
      display: block;
    }
    .modal-window {
      display: none;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      z-index: 99999;
      background: #fff;
      padding: 20px;
      border-radius: 5px;
      top: 50px;
    }
    .modal-window.active {
      display: block;
    }
    .modal-window.active.faded {
      z-index: 99998;
    }
    .modal-window-nested {
      display: none;
      position: absolute;
      left: 50%;
      transform: translateX(-30%);
      z-index: 99999;
      background: #fff;
      padding: 20px;
      border-radius: 5px;
      top: 50px;
    }
    .modal-window-nested.active {
      display: block;
    }
    </style> 
    <title>My Library</title>
  </head>
 
  <body>
    <?php 
    include_once("dbconnect.php");

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
    ?>
    <h1>Base Library</h1>
      <nav>
        <a href="#" class="open-modal" data-target="modal-newelement">New Element</a> |
        <a href="#" class="open-modal" data-target="modal-newauthor">New Author</a>
      </nav>
    <br>
    <br>
     
    <div id="ElementsList">
    </div>
        
    <div id="modal-viewnotes" class="modal-window">
      <h2>Notes</h2>
      <div id="NotesList">
      </div> 
      <button class="modal-hide">Close</button>
    </div>

    <div id="modal-newnote" class="modal-window">
      <h2>New note</h2>
      <form accept-charset="utf-8" action="insertnote.php" method="POST">
      <label for="newNote">Note</label>
      <input type="text" name="newNote" id="newNote"><br>
      <label for="newNoteDate">Date</label>
      <input type="date" name="newNoteDate" id="newNoteDate"><br>
      <label for="newNoteElement">ElementID</label>
      <input type="text" name="newNoteElementID" id="newNoteElementID"><br>
      <br>
      <button type="submit" class="">Insert Note</button>
      <button type ="button" class="modal-hide">Close</button>
      </form>
    </div>

    <div id="modal-newelement" class="modal-window">
      <h2>Insert New Element</h2>
      <form accept-charset="utf-8" action="insertelement.php" method="POST">
      <label for="newelementTitle">Title</label>
      <input type="text" name="newelementTitle" id="newelementTitle"><br>
      <label for="newelementAuthor">Author</label>
      <select name="newelementAuthor" id="newelementAuthor">
        <?php foreach($authors as $author) {?>
        <option><?php echo $author->Surname?> ,  <?php echo $author->Name?></option>
        <?php }?>
      </select><br>
      <label for="newelementLanguage">Language</label>
      <select name="newelementLanguage" id="newelementLanguage">
        <?php foreach($languages as $language) {?>
        <option><?php echo $language->language?></option>
        <?php }?>
      </select><br>
      <label for="newelementSupport">Support</label>
      <select name="newelementSupport" id="newelementSupport">
        <?php foreach($supports as $support) {?>
        <option><?php echo $support->support?></option>
        <?php }?>
      </select><br>
      <label for="newelementStartDate">Start Date</label>
      <input type="date" name="newelementStartDate" id="newelementStartDate"><br>
      <label for="newelementEndDate">End Date</label>
      <input type="date" name="newelementEndDate" id="newelementEndDate"><br>
      <label for="newelementAbstract">Abstract</label>
      <textarea type="text" name="newelementAbstract" id="newelementAbstract"></textarea><br>
      <label for="newelementStars">Stars</label>
      <select name="newelementStars" id="newelementStars">
        <?php foreach($stars as $star) {?>
        <option><?php echo $star->stars?>  <?php echo $star->comments?></option>
        <?php }?>
      </select><br><br><hr>
      <label for="newelementTags">Tags</label><br>
      <?php foreach($newelementtags as $newelementtag) {?>
        <input type="checkbox" name="newelementTags[]" value="<?php echo $newelementtag->tagID?>"><?php echo $newelementtag->tag?>
      <?php }?>
      <button type ="button" name="newtag" class="open-modal-nested" data-target="modal-newtag">New Tag</button>
      <br><br>
      <button type="submit" class="">Insert Element</button>
      <button type ="button" class="modal-hide">Close</button>
      </form>
    </div>

    <div id="modal-newauthor" class="modal-window">
      <h2>Insert New Author</h2>  
      <form accept-charset="utf-8" action="insertauthor.php" method="POST">
      <label for="newauthorName">First Name</label>
      <input type="text" name="newauthorName" id="newauthorName"><br>
      <label for="newauthorLastName">Last Name</label>
      <input type="text" name="newauthorLastName" id="newauthorLastName"><br>
      <label for="newauthorComments">Comments</label>
      <input type="text" name="newauthorComments" id="newauthorComments"><br>
      <button type="submit" class="">Insert Author</button>
      <button type ="button" class="modal-hide">Close</button>
      </form>
    </div>

    <div id="modal-editnote" class="modal-window-nested">
      <h2>Edit note</h2>
      <form action="editnote.php" method="POST">
      <label for="">Global Note ID</label>
      <input type="text" name="editnotesnoteID" id="editnoteID">
      <label for="">Element ID</label>
      <input type="text" name="editnoteselementID" id="editnoteelementID">
      <label for="">Note</label>
      <input type="text" name="editnotesNote" id="editnoteNote">
      <label for="">Date</label>
      <input type="date" name="editnotesNoteDate" id="editnoteNoteDate">
      <button type="submit" class="">Save Changes</button>
      <button type ="button" class="modal-hide-nested">Close</button>
      </form>
    </div>

    <div id="modal-removenote" class="modal-window-nested">
      <h2>Are you sure?</h2>
      <form action="removenote.php" method="POST">
      <label for="">Global Note ID</label>
      <input type="text" name="removenotesnoteID" id="removenoteID">
      <button type="submit" class="">Yes, remove note</button>
      <button type ="button" class="modal-hide-nested">No</button>
      </form>
    </div>

    <div id="modal-newtag" class="modal-window-nested">
      <h2>New Tag</h2>
      <form action="inserttag.php" method="POST">
      <label for="">Tag</label>
      <input type="text" name="newtagtag" id="newtagtag">
      <label for="">Comments</label>
      <input type="text" name="newtagcomments" id="newtagcomments">
      <button type="submit" class="">Insert Tag</button>
      <button type ="button" class="modal-hide-nested">Close</button>
      </form>
    </div>

    <div class="modal-fader"></div>

<script>
function showModalWindow (buttonEl) {
    var modalTarget = "#" + buttonEl.getAttribute("data-target");
    
    document.querySelector(".modal-fader").className += " active";
    document.querySelector(modalTarget).className += " active";
}

function showModalNestedWindow (buttonEl) {
    var modalTarget = "#" + buttonEl.getAttribute("data-target");
    var modalActiveWindows = document.querySelectorAll(".modal-window.active");
    
    modalActiveWindows.forEach(function (modalActiveWindow) {
        modalActiveWindow.className += " faded";
    });

    document.querySelector(".modal-fader").className += " active";
    document.querySelector(modalTarget).className += " active";
}

function hideAllModalWindows () {
    var modalFader = document.querySelector(".modal-fader");
    var modalWindows = document.querySelectorAll(".modal-window");
    
    if(modalFader.className.indexOf("active") !== -1) {
        modalFader.className = modalFader.className.replace("active", "");
    }
    
    modalWindows.forEach(function (modalWindow) {
        if(modalWindow.className.indexOf("active") !== -1) {
            modalWindow.className = modalWindow.className.replace("active", "");
        }
    });
}

function hideAllModalNestedWindows () {
    var modalFader = document.querySelector(".modal-fader");
    var modalNestedWindows = document.querySelectorAll(".modal-window-nested");
    var modalActiveWindows = document.querySelectorAll(".modal-window.active");

    if(modalFader.className.indexOf("active") !== -1) {
        modalFader.className = modalFader.className.replace("active", "");
    }
    
    modalNestedWindows.forEach(function (modalNestedWindow) {
        if(modalNestedWindow.className.indexOf("active") !== -1) {
            modalNestedWindow.className = modalNestedWindow.className.replace("active", "");
        }
    });

    modalActiveWindows.forEach(function (modalActiveWindow) {
        if(modalActiveWindow.className.indexOf("faded") !== -1) {
            modalActiveWindow.className = modalActiveWindow.className.replace("faded", "");
        }
    });
}

document.querySelectorAll(".open-modal").forEach(function (trigger) {
  trigger.addEventListener("click", function () {
    hideAllModalWindows();
    showModalWindow(this);
  });
});

document.querySelectorAll(".open-modal-nested").forEach(function (trigger) {
  trigger.addEventListener("click", function () {
    showModalNestedWindow(this);
  });
});
    
document.querySelectorAll(".modal-hide").forEach(function (closeBtn) {
  closeBtn.addEventListener("click", function () {
    hideAllModalWindows();
  });
});

document.querySelectorAll(".modal-hide-nested").forEach(function (closeBtn) {
  closeBtn.addEventListener("click", function () {
    hideAllModalNestedWindows();
  });
});
    
document.querySelector(".modal-fader").addEventListener("click", function () {
  hideAllModalNestedWindows();  
  hideAllModalWindows(); 
});

document.addEventListener("DOMContentLoaded", function(){
  var request = new XMLHttpRequest();
  request.open('POST', 'listelements.php', true);
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  request.onreadystatechange = function() {
    if (this.status >= 200 && this.status < 400) {
    // Success!
    var resp = this.response;
    document.getElementById("ElementsList").innerHTML = resp
    } else {
    // We reached our target server, but it returned an error
    }
  };
  request.onerror = function() {
    console.log("Request error");
   // There was a connection error of some sort
  };
  request.send('orderBy='+event.target.name);
});

document.addEventListener('click', function(event) {
  if (event.target.name == "editnotebtn") {
    showModalNestedWindow(event.target);
    var tr=event.target.closest('tr');
    var data=tr.children;
    document.getElementById("editnoteID").value = data[0].innerText;
    document.getElementById("editnoteelementID").value = data[1].innerText;
    document.getElementById("editnoteNoteDate").value = data[2].innerText;
    document.getElementById("editnoteNote").value = data[3].innerText;
  }

  if (event.target.name == "removenotebtn") {
    showModalNestedWindow(event.target);
    var tr=event.target.closest('tr');
    var data=tr.children;
    document.getElementById("removenoteID").value = data[0].innerText;
  }
  if (event.target.name == "viewnotesbtn") {
    showModalWindow(event.target);
    var tr=event.target.closest('tr');
    var data=tr.children;
    var request = new XMLHttpRequest();
    request.open('POST', 'viewnotes.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function() {
      if (this.status >= 200 && this.status < 400) {
      // Success!
      var resp = this.response;
      document.getElementById("NotesList").innerHTML = resp;
      } else {
      // We reached our target server, but it returned an error
      }
    };
    request.onerror = function() {
      console.log("Request error");
      // There was a connection error of some sort
    };
    request.send('viewnoteselementID='+data[0].innerText);
  }
  if (event.target.name == "newnotebtn") {
    showModalWindow(event.target);
    var tr=event.target.closest('tr');
    var data=tr.children;
    document.getElementById("newNoteElementID").value = data[0].innerText;
  }
  if (event.target.classList.contains("ordercol")){
    var name = event.target.getAttribute('name')
    var request = new XMLHttpRequest();
    request.open('POST', 'listelements.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function() {
      if (this.status >= 200 && this.status < 400) {
     // Success!
      var resp = this.response;
      document.getElementById("ElementsList").innerHTML = resp
      } else {
      // We reached our target server, but it returned an error
      }
    };
    request.onerror = function() {
    console.log("Request error");
    // There was a connection error of some sort
    };
    request.send('orderBy='+name);
  }
});
 
</script>
</body>
</html>
