<?php
include(__DIR__."./header.php");?>

<?php if ($_SESSION['status']==="1"):?>
<nav class=left-menu>
  <ul class=left-menu-items>
  <li><a href="?page=newPost">Créer une nouvelle publication</a></li> 
  <li><a href="?page=posts">Publications</a></li> 
  <li><a href="?page=publishedPosts">Publications postées</a></li> 
  <li><a href="?page=archivedPosts">Publications archivées</a></li> 
  </ul>
</nav>
<?php elseif ($_SESSION['status']==="2"):?>
  <nav class=left-menu>
  <ul class=left-menu-items>
  <li><a href="?page=posts">Publications</a></li> 
  <li><a href="?page=publishedPosts">Publications postées</a></li> 
  <li><a href="?page=archivedPosts">Publications archivées</a></li> 
  </ul>
</nav>
<?php endif?>


<?php $posts=$this->publishedPostsList;
foreach($posts as $post):
$hashtags=$this->postRepository->findHashtagByPost($post->getId());
$socialNetworks=$this->postRepository->findSocialNetworkByPost($post->getId())?>


<div class=postContainer>
  <div class="postContent">

    <div><p><?=$post->getText()?></p></div>

    <div>
     <?php foreach($hashtags as $hashtag):?>
      <ul class="hashtagsPost">
        <li><?=$hashtag->getName()?></li>
      </ul>
     <?php endforeach?>
     </div>  

     <div><img src=<?=$post->getImage()?>></div> 
 
     <?php if ($post->getVideo()!=""):?>
     <div><iframe width="560" height="315" src=<?="https://www.youtube.com/embed/".$post->getCodeVideo()?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
     <?php endif;?>

  </div>


  <div class="statusPost">

 
    <div>Publié le <?=$post->getDatetime()?> &nbsp; sur &nbsp;
    <?php foreach($socialNetworks as $socialNetwork):?>
      <ul class="socialNetworksPost">
        <li><img class="social-icon" src=<?=$socialNetwork->getIcon()?>></li>
      </ul>
    <?php endforeach?>
    </div>

    <div><p>Editée par <?=$post->getUser()->getFirstname()?></p>
    </div>

  </div>

</div>

<?php endforeach;?>






<?php
include(__DIR__."./footer.php");