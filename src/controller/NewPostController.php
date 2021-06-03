<?php

class NewPostController{

private $title;

public function __construct()
{
    $this->title="Créer une nouvelle publication";
}


function manage(){

    include(__DIR__."./../view/newPost.php");


}
}