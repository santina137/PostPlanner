<?php

class NewPostController {

private $title;
private $hashtagsList;
private $socialNetworksList;


public function __construct()
{
    $this->title="Créer une nouvelle publication";
    $this->model=new Model();
}


function manage(){

    $this->hashtagsList=$this->model->getAllHashtags();

    $this->socialNetworksList=$this->model->getAllSocialNetworks();


    if(isset($_POST['savePost']) && !empty($_FILES)){
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
          echo "Le fichier n'est pas une image.";
            }

        }

    }


    if (isset($_POST['text']) && !empty($_POST['text'])
    && isset($_POST['datetime']) && isset($_POST['savePost']))
        {
            $this->model->addNewPost($_POST['text'],$location.$fileName,$_POST['video'],$_POST['datetime'],$_POST['spellingValidation'],$_POST['archiving'],$_SESSION['id']);
        }


    include(__DIR__."./../view/newPost.php");

      
    

    }
}
