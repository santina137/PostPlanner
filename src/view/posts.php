<?php
include(__DIR__."./header.php");?>

<nav class="nav flex-column">
    <a class="nav-link active" aria-current="page" href="?page=newPost">Créer une nouvelle publication</a>
  <a class="nav-link active" aria-current="page" href="?page=posts">Publications</a>
  <a class="nav-link" href="?page=publishedPosts">Publications postées</a>
  <a class="nav-link" href="?page=archivedPosts">Publications archivées</a>
</nav>


<?php
echo $this->title;?>


<?php $posts=$this->postsList;

foreach($posts as $post):?>
<div class=card style= width:40rem;margin-left:auto;margin-right:auto>
<div class=card-body>
  <p><?=$post['post_text']?></p>
  <p><?=$post['post_text']?></p>
  <p><?=$post['post_text']?></p>
</div>
</div>
<div style=padding-top:100px;padding-bottom:100px></div>
<?php endforeach;?>


<?php
include(__DIR__."./footer.php");