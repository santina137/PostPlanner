<?php

class NetworkPost{

    private $id;
    private $idPost;
    private $idSocialNetwork;

    public function __construct($id, $idPost, $idSocialNetwork)
    {
        $this->id=$id;
        $this->idPost=$idPost;
        $this->idSocialNetwork=$idSocialNetwork;
    }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


        /**
         * Get Post as Post object
         */ 
        public function getPost():Post
        {
            $post = new PostRepository();
            return $post->findPostById($this->idPost);


        }

        /**
         * Set Post
         *
         * @return  self
         */ 
        public function setPost(Post $post):self
        {
                $this->idPost = $post->getId();

                return $this;
        }



        
        /**
         * Get SocialNetwork as SocialNetwork  object
         */ 
        public function getSocialNetwork():SocialNetwork
        {
            $socialNetwork = new SocialNetworkRepository(); 
            return $socialNetwork->findSocialNetworkById($this->idSocialNetwork);


        }

        /**
         * Set SocialNetwork
         *
         * @return  self
         */ 
        public function setSocialNetwork(SocialNetwork $socialNetwork):self
        {
                $this->idSocialNetwork = $socialNetwork->getId();

                return $this;
        }




}