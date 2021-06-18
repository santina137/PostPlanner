<?php

class ArchivedPostsController{

    private $postRepository;
    private $archivedPostsList;

    public function __construct()
    {
        $this->postRepository=new PostRepository();
    }


    function manage(){

        $this->archivedPostsList=$this->postRepository->getAllArchivedPosts();

        include(__DIR__."./../view/archivedPosts.php");


    }
}