<?php

class PostsController{

    private $postRepository;
    private $postsList;
   



    public function __construct()
    {

        $this->postRepository= new PostRepository();
        
    }


   




    function manage()
    {
    
        $this->postsList=$this->postRepository->getAllPosts();
        
        if (isset($_POST['spellingValidation']) && $_POST['postId']){
        $this->post=$this->postRepository->updateSpellingValidationPost($_POST['postId'],$_POST['spellingValidation']);
        }

        include(__DIR__."./../view/posts.php");
    
    }

        

        
        

     

    


}