<?php

class HashtagsController{

private $title;
private $model;
private $hashtagsList;

public function __construct()
{
    $this->title="Hashtags";
    $this->model=new Model();
}


function manage(){

    /***********************Liste des Hashtags **********************/
    $this->hashtagsList=$this->model->getAllHashtags();

     /***********************Ajouter un hashtag **********************/
    if (isset($_POST['name']))
    {
     $this->model->addHashtag($_POST['name']);
     header("Refresh:0");
    }

    /**********************Supprimer un hashtag**********************/
    if (isset($_POST['id'])&& isset($_POST['delete'])){
    $this->model->deleteHashtag($_POST['id']);
    header("Refresh:0");
    }

    /***********************Modifier un réseau social***********************/

    if(isset($_POST['name1'])){
    $this->model->updateHashtag($_POST['name1'],$_POST['id']);
    header("Refresh:0");
    }

    include(__DIR__."./../view/hashtags.php");

    }
}