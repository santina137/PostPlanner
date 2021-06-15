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
require 'src/controller/CreateAccountController.php';
require 'src/model/SocialNetworkRepository.php';
require 'src/model/HashtagRepository.php';
require 'src/model/UserRepository.php';
require 'src/model/PostRepository.php';
require 'src/model/NetworkPostRepository.php';
require 'src/model/HashtagPostRepository.php';



$page=filter_input(INPUT_GET, "page");

$route=array(
    "login"=>LoginController::class,
    "account"=>AccountController::class,
    "newPost"=>NewPostController::class,
    "posts"=>PostsController::class,
    "publishedPosts"=>PublishedPostsController::class,
    "archivedPosts"=>ArchivedPostsController::class,
    "socialNetworks"=>SocialNetworksController::class,
    "hashtags"=>HashtagsController::class,
    "createAccount"=>CreateAccountController::class
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


