<?php

class Post{

    private $id;
    private $text;
    private $image;
    private $video;
    private $datetime;
    private $spellingValidation;
    private $posting;
    private $archiving;
    private $idUser;

    public function __construct($id, $text, $image, $video, $datetime, $spellingValidation, $posting, $archiving, $idUser)
    {
        $this->id=$id;
        $this->text=$text;
        $this->image=$image;
        $this->video=$video;
        $this->datetime=$datetime;
        $this->spellingValidation=$spellingValidation;
        $this->posting=$posting;
        $this->archiving=$archiving;
        $this->idUser=$idUser;
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
         * Get the value of text
         */ 
        public function getText()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setText($text)
        {
                $this->text = $text;

                return $this;
        }

        /**
         * Get the value of image
         */ 
        public function getImage()
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }

        /**
         * Get the value of video
         */ 
        public function getVideo()
        {
               
              return $this->video;
        }


        /*Récupérer le code de la video youtube*/
        public function getCodeVideo()
        {
            if ($this->video!="")
            {
            $url=$this->video;
            $tableau=parse_url($url);
            $query=$tableau['query'];
            $code=explode("=",$query);
            return $code[1];
            }
        }

        /**
         * Set the value of video
         *
         * @return  self
         */ 
        public function setVideo($video)
        {
                $this->video = $video;

                return $this;
        }

        /**
         * Get the value of datetime
         */ 
        public function getDatetime()
        {
                return $this->datetime;
        }

        /**
         * Set the value of datetime
         *
         * @return  self
         */ 
        public function setDatetime($datetime)
        {
                $this->datetime = $datetime;

                return $this;
        }

        /**
         * Get the value of spellingValidation
         */ 
        public function getSpellingValidation()
        {
                return $this->spellingValidation;
        }

        /**
         * Set the value of spellingValidation
         *
         * @return  self
         */ 
        public function setSpellingValidation($spellingValidation)
        {
                $this->spellingValidation = $spellingValidation;

                return $this;
        }

    /**
         * Get the value of posting
         */ 
        public function getPosting()
        {
                return $this->posting;
        }

        /**
         * Set the value of posting
         *
         * @return  self
         */ 
        public function setPosting($posting)
        {
                $this->posting = $posting;

                return $this;
        }




        /**
         * Get the value of archiving
         */ 
        public function getArchiving()
        {
                return $this->archiving;
        }

        /**
         * Set the value of archiving
         *
         * @return  self
         */ 
        public function setArchiving($archiving)
        {
                $this->archiving = $archiving;

                return $this;
        }

     
        /**
         * Get User as User object
         */ 
        public function getUser():User
        {
            $user = new UserRepository();
            return $user->findUserById($this->idUser);


        }

        /**
         * Set User
         *
         * @return  self
         */ 
        public function setUser(User $user):self
        {
                $this->idUser = $user->getId();

                return $this;
        }






        public static function create($id, $text, $image, $video, $datetime, $spellingValidation, $posting, $archiving, $idUser) {
                return new Post($id, $text, $image, $video, $datetime, $spellingValidation, $posting, $archiving, $idUser);
            }


    
}