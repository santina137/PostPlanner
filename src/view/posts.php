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

 
    <div>A publier le <?=$post->getDatetime()?> &nbsp; sur &nbsp;
    <?php foreach($socialNetworks as $socialNetwork):?>
      <ul class="socialNetworksPost">
        <li><img class="social-icon" src=<?=$socialNetwork->getIcon()?>></li>
      </ul>
    <?php endforeach?>
    </div>

    <div><p>Editée par <?=$post->getUser()->getFirstname()?></p>
    </div>
  


    <?php if (isset($_POST['spellingValidation']) || $post->getSpellingValidation() === "2" ):?>

    <form method="POST">
     <div>Statut: <span class="italic">Orthographe validé </br>
         &emsp;&emsp;&emsp;En attente de publication</span>
    </div>
    <button type="submit" class="publishButton" name="publishButton">Publier</button>
    <input type="hidden" name="postId" value=<?=$post->getId()?>>
    <input type="hidden" name="posted" value="2">
    </form>

    <?php else:?>

    <form method="POST">
      <div>Statut: <span class="italic">En attente de validation de l'orthographe</span></div>
    <button type="submit" class="spellingValidationButton" name="spellingValidationButton">Valider l'orthographe</button>
    <input type="hidden" name="postId" value=<?=$post->getId()?>>
    <input type="hidden" name="spellingValidation" value="2">
    </form>

    <?php endif?>

  </div>

</div>

<?php endforeach;
include(__DIR__."./footer.php");