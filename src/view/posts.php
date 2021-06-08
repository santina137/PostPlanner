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


<?php
echo $this->title;?>


<?php $posts=$this->postsList;

foreach($posts as $post):?>

<div class="post">
  <p><?=$post['post_text']?></p>
  <p><?=$post['post_datetime']?></p>
</div>
<?php endforeach;?>


<?php
include(__DIR__."./footer.php");