<?php

class NewPostController {

private $socialNetworkRepository;
private $hashtagRepository;    
private $postRepository;
private $hashtagPostRepository;
private $networkPostRepository;
private $hashtagsList;
private $socialNetworksList;
private $lastId;


public function __construct()
{

    $this->postRepository= new PostRepository();
    $this->socialNetworkRepository= new SocialNetworkRepository;
    $this->hashtagRepository= new HashtagRepository;
    $this->hashtagPostRepository= new HashtagPostRepository;
    $this->networkPostRepository= new NetworkPostRepository;

}


function manage(){

    $this->hashtagsList=$this->hashtagRepository->getAllHashtags();

    $this->socialNetworksList=$this->socialNetworkRepository->getAllSocialNetworks();


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
    && isset($_POST['datetime']) && isset($_POST['socialNetworkIcons']) && isset($_POST['savePost']))
        {
           
            if ($fileName!="")
            {
                $image=$location.$fileName;
                
            } else
            {
                $image='';
            }
        

            $this->postRepository->addNewPost($_POST['text'],$image,$_POST['video'],$_POST['datetime'],$_POST['spellingValidation'],$_POST['posting'],$_POST['archiving'],$_SESSION['id']);
        }

    $lastId=$this->lastId=$this->postRepository->lastInsertId();

 
    
    if (isset($_POST['hashtagSelect']))
    {
        foreach($_POST['hashtagSelect'] as $hashtagSelect)
        {
            $this->hashtagPostRepository->addHashtagPost($lastId,$hashtagSelect);
        } 
    }

    if (isset($_POST['socialNetworkIcons']))
    {
        foreach($_POST['socialNetworkIcons'] as $socialNetworkIcon)
        $this->networkPostRepository->addNetworkPost($lastId,$socialNetworkIcon);
    }






    include(__DIR__."./../view/newPost.php");

      
    

    }
}
