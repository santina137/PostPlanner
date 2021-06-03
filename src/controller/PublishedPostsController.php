<?php

class PublishedPostsController{

private $title;

public function __construct()
{
    $this->title="Publications postées";
}


function manage(){

    include(__DIR__."./../view/publishedPosts.php");


}
}