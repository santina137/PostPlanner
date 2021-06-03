<?php

class HashtagsController{

private $title;

public function __construct()
{
    $this->title="Hashtags";
}


function manage(){

    include(__DIR__."./../view/hashtags.php");


}
}