<?php

class SocialNetworksController{

private $title;
private $model;
private $socialNetworksList;

public function __construct()
{
    $this->title="Réseaux sociaux";
    $this->model=new Model();
}


function manage(){
    /***********************Liste des réseaux sociaux **********************/
    $this->socialNetworksList=$this->model->getAllSocialNetworks();

    /***********************Ajouter un réserau social **********************/
    if (isset($_POST['name']) && $_POST['icon']!='' )
        {
            $this->model->addSocialNetwork($_POST['name'],$_POST['icon']);
            header("Refresh:0");
        }
    /**********************Supprimer un réseau social **********************/
    if (isset($_POST['id'])&& isset($_POST['delete'])){
        $this->model->deleteSocialNetwork($_POST['id']);
        header("Refresh:0");
    }

    /***********************Modifier un réseau social***********************/

    if(isset($_POST['name1']) && isset($_POST['icon1'])){
        $this->model->updateSocialNetwork($_POST['name1'],$_POST['icon1'],$_POST['id']);
        header("Refresh:0");
    }




    include(__DIR__."./../view/socialNetworks.php");


}
}