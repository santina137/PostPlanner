<?php

class HashtagsController{


private $hashtagRepository;
private $hashtagsList;

public function __construct()
{
   
    $this->hashtagRepository=new HashtagRepository();
}


function manage(){

    /***********************Liste des Hashtags **********************/
    $this->hashtagsList=$this->hashtagRepository->getAllHashtags();

     /***********************Ajouter un hashtag **********************/
    if (isset($_POST['name']))
    {
     $this->hashtagRepository->addNewHashtag($_POST['name']);
     header("Refresh:0");
    }

    /**********************Supprimer un hashtag**********************/
    if (isset($_POST['id'])&& isset($_POST['delete'])){
    $this->hashtagRepository->deleteHashtag($_POST['id']);
    header("Refresh:0");
    }

    /***********************Modifier un hashtag***********************/

    if(isset($_POST['name1'])){
    $this->hashtagRepository->updateHashtag($_POST['name1'],$_POST['id']);
    header("Refresh:0");
    }

    include(__DIR__."./../view/hashtags.php");

    }
}