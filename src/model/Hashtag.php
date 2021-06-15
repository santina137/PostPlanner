<?php

class Hashtag{

    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id=$id;
        $this->name=$name;
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
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }


        public static function create($id, $name) {
                return new Hashtag($id, $name);
            }
        



}