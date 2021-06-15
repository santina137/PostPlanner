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
         * Get Hashtag as Hashtag object
         */ 
        public function getHashtag():Hashtag
        {
            $hashtag = new HashtagRepository(); 
            return $hashtag->findHashtagById($this->idHashtag);


        }

        /**
         * Set Hashtag
         *
         * @return  self
         */ 
        public function setHashtag(Hashtag $hashtag):self
        {
                $this->idHashtag = $hashtag->getId();

                return $this;
        }


        public static function create($id, $idPost, $idHashtag) {
                return new HashtagPost($id, $idPost, $idHashtag);
            }


}