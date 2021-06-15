<?php

class PostsController{

private $postRepository;
private $hashtagPostRepository;
private $postsList;
private $hashtagsIdList;



public function __construct()
{

    $this->postRepository= new PostRepository();
    $this->hashtagPostRepository= new HashtagPostRepository();
    
}


function manage()
{


    
    $posts=$this->postsList=$this->postRepository->getAllPosts();
 

    

    $hashtags=$this->hashtagsIdList=$this->hashtagPostRepository->findHashtagByIdPost($post->getId());
    var_dump($hashtags);

    
    

    include(__DIR__."./../view/posts.php");

}


}