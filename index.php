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
require 'src/controller/LogoutController.php';
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
    "createAccount"=>CreateAccountController::class,
    "logout"=>LogoutController::class
);


if (($_SESSION) && $_SESSION['status']==="1")
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
    if (!isset($controller))
    {
        $controller= new PostsController();
        $controller->manage();
    }
    
}

else if ($_SESSION && ($_SESSION['status']==="2"))
    {

        switch($page)
        {
            case 'login':
                $controller=new LoginController();
                $controller->manage();
                break;
            case 'account':
                $controller=new AccountController();
                $controller->manage();
                break;
            case 'posts':
                $controller=new PostsController();
                $controller->manage();
                break;
            case 'publishedPosts':
                $controller=new PublishedPostsController();
                $controller->manage();
                break;
            case 'archivedPosts':
                $controller=new ArchivedPostsController();
                $controller->manage();
                break;
            case 'logout';
                $controller=new LogoutController();
                $controller->manage();
        }
        
        if (!isset($controller))
        {
            $controller= new PostsController();
            $controller->manage();
        }
        



    }

else
{
$controller= new LoginController();
$controller->manage();
}


