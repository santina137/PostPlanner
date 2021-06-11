<?php

class NewPostController{

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


    if (isset($_POST['text']) && isset($_POST['datetime']) && isset($_POST['savePost']))
        {
            $this->model->addNewPost($_POST['text'],$_POST['image'],$_POST['video'],$_POST['datetime'],$_POST['spellingValidation'],$_POST['archiving']);
        
        }


    include(__DIR__."./../view/newPost.php");


}
}