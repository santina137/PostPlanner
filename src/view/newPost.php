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


<?php $hashtags=$this->hashtagsList;
$socialNetworks=$this->socialNetworksList?>


<div class="newPost">
<form method="POST">

<textarea name="text"></textarea>


<form method="post" enctype="multipart/form-data">
<input type="file" name="uploaded-file" id="file"><br><br>
<input type="submit" name="upload">
</form>

<?php 
    if(isset($_POST['upload'])&& !empty($_FILES)){
        $fileName = $_FILES['uploaded-file']['name'];  
        $fileExtension = strtolower(strrchr($_FILES['uploaded-file']['name'],"."));
        $fileTmpName= $_FILES['uploaded-file']['tmp_name'];  
        $validExtension=array('.jpg','.jpeg','.png','.gif');
        $location = 'src/public/uploads/'; 


        if(in_array($fileExtension,$validExtension))
        {
           
            if(move_uploaded_file($fileTmpName, $location.$fileName))
            {
            echo 'Image envoyé avec succès';
            }
            else 
            {
            echo 'Une erreur est survenue lors de l\'envoi du fichier';
            }

        } else
        {
          echo "Le fichier n'est pas une image.";
        }

      }

      
?>

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




<label>Url vidéo :</label>
<input type="url" name="video">

</div>




<div class="saveNewPost">
A publier le <input type="datetime-local" name="datetime"> sur

<input type="hidden" name="spellingValidation" value="0">
<input type="hidden" name="archiving" value="0">
<button type="submit" name="savePost">Enregistrer la publication</button>

</form>


</div>






<select multiple size=4>
<?php foreach($hashtags as $hashtag):?>
<option><?=$hashtag['hashtag_name']?></option>
<?php endforeach;?>
</select>

<?php foreach($socialNetworks as $socialNetwork):?>
<input type="checkbox" id="socialNetworkIcons" name="scales">
<label for="socialNetworkIcons"><img class="social-icon" src="<?=$socialNetwork['social_network_icon']?>"></label>
<?php endforeach;?>









<?php
echo $this->title;

include(__DIR__."./footer.php");