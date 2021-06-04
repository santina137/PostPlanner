<?php

session_start();


require 'src/service/DbAccess.php';
require 'src/controller/AccountController.php';
require 'src/controller/PostsController.php';
require 'src/controller/PublishedPostsController.php';
require 'src/controller/ArchivedPostsController.php';
require 'src/controller/SocialNetworksController.php';
require 'src/controller/HashtagsController.php';
require 'src/controller/NewPostController.php';
require 'src/controller/LoginController.php';
require 'src/model/Model.php';


$page=filter_input(INPUT_GET, "page");

$route=array(
    "login"=>LoginController::class,
    "account"=>AccountController::class,
    "newPost"=>NewPostController::class,
    "posts"=>PostsController::class,
    "publishedPosts"=>PublishedPostsController::class,
    "archivedPosts"=>ArchivedPostsController::class,
    "socialNetworks"=>SocialNetworksController::class,
    "hashtags"=>HashtagsController::class
    
);

if ($_SESSION)
{
    foreach($route as $routeValue=>$className)
    {
    if ($page===$routeValue)
        {
        $controller= new $className;
        $controller->manage();
        break;
        }   
    }
}
else
{
$controller= new LoginController();
$controller->manage();
}

if (!isset($controller))
{
    $controller= new PostsController();
    $controller->manage();
}


