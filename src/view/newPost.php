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
$socialNetworks=$this->socialNetworksList?>

<div class="newPostContainer">


  <div class="newPostContent">

    <form method="POST" enctype="multipart/form-data">

    <div><textarea name="text" placeholder="Nouvelle publication..."></textarea></div>

    <div>
        <label for="hashtags-select">Hashtags :</label>
        <select name="hashtags-select" multiple size=4>
        <?php foreach($hashtags as $hashtag):?>
        <option><?=$hashtag['hashtag_name']?></option>
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
      <input type="checkbox" id="socialNetworkIcons" name="socialNetworkIcons">
      <label for="socialNetworkIcons"><img class="social-icon" src="<?=$socialNetwork['social_network_icon']?>"></label>
      <?php endforeach;?>
      </div>

      <div> 
      <input type="hidden" name="spellingValidation" value="1">
      <input type="hidden" name="archiving" value="1">
      <button type="submit" name="savePost">Enregistrer la publication</button>
      </div> 
  </form>

  </div>


<?php
/*<form method="POST" enctype="multipart/form-data">
<input type="file" name="file"/>
<input type="submit" name="upload"/>
</form>

<?php if (isset($_POST['upload'])){
$name=$_FILES['file']['name'];
$temp_name  = $_FILES['file']['tmp_name'];  
if(isset($name) and !empty($name)){
    $location = 'src/public/upload/';      
    if(move_uploaded_file($temp_name, $location.$name)){
        echo 'File uploaded successfully';
    }
} else {
    echo 'You should select a file to upload !!';
}
}


 $maxSize=50000;
  $validExt=array('.jpg','.jpeg','.png','.gif');

  if($_FILES['uploaded_file']['error']>0)
  {
    echo "Erreur lors du transfert";
    die;
  }

$fileSize=$_FILES['uploaded_file']['size'];
echo $fileSize;
}

if($fileSize>$maxSize){
  echo "Le fichier est trop grand!";
  die;
}



$fileExt="." . strtolower(substr(strrchr($fileName,"."), 1));

if (!in_array($fileExt,$validExt)){
  echo "Le fichier n'est pas une image";
  die;
}
$tmpName=$_FILES['uploaded_file']['tmp_name'];
$uniqueName=md5(uniqid(rand(),true));
$fileName="src/public/upload/".$uniqueName.$fileExt;
$result=move_uploaded_file($tmpName,$fileName);

if($result)
{
echo "Transfert terminé!";
}
*/
?>









</div>
<?php
include(__DIR__."./footer.php");