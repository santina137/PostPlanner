<?php
include(__DIR__."./header.php");?>

<nav class=left-menu>
  <ul class=left-menu-items>
  <li><a href="?page=newPost">Créer une nouvelle publication</a></li> 
  <li><a href="?page=posts">Publications</a></li> 
  <li><a href="?page=publishedPosts">Publications postées</a></li> 
  <li><a href="?page=archivedPosts">Publications archivées</a></li> 
  </ul>
</nav>


 

  
<?php foreach ($posts as $post):?>

  <?php $hashtagsId=$this->$hashtagsIdList;?> 

<div class="post">
  <div><p><?=$post->getText()?></p></div>
  <div><p></p></div>
  <div><img src=<?=$post->getImage()?>></div> 
  
</div>

<div class=statusPost>

<p>A publier le <?=$post->getDatetime()?></p> 
<p> sur </p>
<p>Editée par <?=$post->getUser()->getFirstname()?></p>

<p>Statut:</p>
</div>
<?php endforeach?>




<?php
include(__DIR__."./footer.php");