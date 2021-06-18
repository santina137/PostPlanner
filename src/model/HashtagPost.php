<?php

class HashtagPost{

    private $id;
    private $idPost;
    private $idHashtag;

    public function __construct($id, $idPost, $idHashtag){

        $this->id=$id;
        $this->idPost=$idPost;
        $this->idHashtag=$idHashtag;
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
         * Get the value of idHashtag
         */ 
        public function getIdHashtag()
        {
                return $this->idHashtag;
        }

        /**
         * Set the value of idHashtag
         *
         * @return  self
         */ 
        public function setIdHashtag($idHashtag)
        {
                $this->idHashtag = $idHashtag;

                return $this;
        }
}