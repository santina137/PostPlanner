<?php
include(__DIR__."./header.php");?>


<nav class="nav flex-column">
    <a class="nav-link active" aria-current="page" href="?page=newPost">Créer une nouvelle publication</a>
  <a class="nav-link active" aria-current="page" href="?page=posts">Publications</a>
  <a class="nav-link" href="?page=publishedPosts">Publications postées</a>
  <a class="nav-link" href="?page=archivedPosts">Publications archivées</a>
</nav>


<?php
echo $this->title;
include(__DIR__."./footer.php");