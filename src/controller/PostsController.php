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
        
        if (isset($_POST['postId'])&& isset($_POST['spellingValidationButton']))
        {
            $this->post=$this->postRepository->updateSpellingValidationPost($_POST['postId'],$_POST['spellingValidation']);
        }

        if (isset($_POST['postId'])&& isset($_POST['publishButton']))
        {
            $this->post=$this->postRepository->updatePostingPost($_POST['postId'],$_POST['posted']);
            header("Refresh:0");
        }

        if (isset($_POST['postId'])&& isset($_POST['archive']))
        {
            $this->post=$this->postRepository->updateArchivingPost($_POST['postId'],$_POST['archived']);
            header("Refresh:0");
        }


        include(__DIR__."./../view/posts.php");
    
    }

        

        
        

     

    


}