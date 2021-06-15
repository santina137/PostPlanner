<?php
include(__DIR__."./header.php");?>

<nav class="left-menu">
  <ul class="left-menu-items">
  <li><a href="?page=newPost">Créer une nouvelle publication</a></li> 
  <li><a href="?page=posts">Publications</a></li> 
  <li><a href="?page=publishedPosts">Publications postées</a></li> 
  <li><a href="?page=archivedPosts">Publications archivées</a></li> 
  </ul>
</nav>


<?php $hashtags=$this->hashtagsList;
$socialNetworks=$this->socialNetworksList;
$lastId=$this->lastId;?>

<div class="newPostContainer">


  <div class="newPostContent">

    <form method="POST" enctype="multipart/form-data">

    <div><textarea name="text" placeholder="Nouvelle publication..."></textarea></div>

    <div>
        <label for="hashtagSelect[]">Hashtags :</label>
        <select name="hashtagSelect[]" multiple size=4>
        <?php foreach($hashtags as $hashtag):?>
        <option value="<?=$hashtag->getId()?>"><?=$hashtag->getName()?></option>
        <?php endforeach;?>
        </select>
    </div>

    <div>
    <label for="file">Image :</label>
    <input type="file" name="uploaded-file" id="file">
    </div>


    <div>
      <label for id="urlVideo">Url vidéo :</label>
      <input type="url" name="video" id="urlVideo">
    </div>

  </div>




  <div class="statusNewPost">

      <div>    
      A publier le <input type="datetime-local" name="datetime">
      </div>
      
      <div class="checkbox">
      sur 
      <?php foreach($socialNetworks as $socialNetwork):?>
      <input type="checkbox" id="socialNetworkIcons" name="socialNetworkIcons[]" value="<?=$socialNetwork->getId()?>">
      <label for="socialNetworkIcons"><img class="social-icon" src="<?=$socialNetwork->getIcon()?>"></label>
      <?php endforeach;?>
      </div>

      <div> 
      <input type="hidden" name="spellingValidation" value="1">
      <input type="hidden" name="archiving" value="1">
      <input type="hidden" name="lastId" value="<?=$lastId?>">
      <button type="submit" name="savePost">Enregistrer la publication</button>
      </div> 
  </form>

  </div>

</div>
<?php
include(__DIR__."./footer.php");