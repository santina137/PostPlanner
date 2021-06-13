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



<?php $posts=$this->postsList;
      
foreach ($posts as $post):?>

<div class="post">
  <div><p><?=$post['post_text']?></p></div>
  <div><img src=<?=$post['post_image']?>></div> 
</div>

<div class=statusPost>

<p>A publier le <?=$post['post_datetime']?></p> 
<p> sur </p>

<p>Editée par <?=$post['id_user']?></p>

<p>Statut:</p>
</div>

<?php endforeach?>



<?php
include(__DIR__."./footer.php");