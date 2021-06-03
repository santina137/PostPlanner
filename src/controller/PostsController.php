<?php

class PostsController{

private $title;
private $model;
private $postsList;


public function __construct()
{
    $this->title="Publications";
    $this->model=new Model();
    
}


function manage()
{


    $this->postsList=$this->model->getAllPosts();
    include(__DIR__."./../view/posts.php");
    

}


}