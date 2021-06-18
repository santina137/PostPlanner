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
         * Get the value of idPost
         */ 
        public function getIdPost()
        {
                return $this->idPost;
        }

        /**
         * Set the value of idPost
         *
         * @return  self
         */ 
        public function setIdPost($idPost)
        {
                $this->idPost = $idPost;

                return $this;
        }

        /**
         * Get the value of idSocialNetwork
         */ 
        public function getIdSocialNetwork()
        {
                return $this->idSocialNetwork;
        }

        /**
         * Set the value of idSocialNetwork
         *
         * @return  self
         */ 
        public function setIdSocialNetwork($idSocialNetwork)
        {
                $this->idSocialNetwork = $idSocialNetwork;

                return $this;
        }
}