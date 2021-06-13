<?php

class PostsController{

private $title;
private $model;
private $postsList;
private $user;


public function __construct()
{

    $this->model=new Model();
    
}


function manage()
{


    $this->postsList=$this->model->getAllPosts();
    

    

    include(__DIR__."./../view/posts.php");

}


}