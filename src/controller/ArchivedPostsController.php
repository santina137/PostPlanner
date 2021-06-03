<?php

class ArchivedPostsController{

private $title;

public function __construct()
{
    $this->title="Publications archivées";
}


function manage(){

    include(__DIR__."./../view/archivedPosts.php");


}
}