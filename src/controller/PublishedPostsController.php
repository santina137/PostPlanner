<?php

class PublishedPostsController{

    private $postRepository;
    private $publishedPostsList;

    public function __construct()
    {
        $this->postRepository=new PostRepository();
    }


    function manage(){

        $this->publishedPostsList=$this->postRepository->getAllPublishedPosts();

        include(__DIR__."./../view/publishedPosts.php");


    }   
}