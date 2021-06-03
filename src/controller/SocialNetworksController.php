<?php

class SocialNetworksController{

private $title;

public function __construct()
{
    $this->title="Réseaux sociaux";
}


function manage(){

    include(__DIR__."./../view/socialNetworks.php");


}
}