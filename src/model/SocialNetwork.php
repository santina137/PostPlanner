<?php

class SocialNetwork{

    private $id;
    private $name;
    private $icon;

    public function __construct($id, $name, $icon){

        $this->id=$id;
        $this->name=$name;
        $this->icon=$icon;

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
         * Get the value of icon
         */ 
        public function getIcon()
        {
                return $this->icon;
        }

        /**
         * Set the value of icon
         *
         * @return  self
         */ 
        public function setIcon($icon)
        {
                $this->icon = $icon;

                return $this;
        }

        public static function create($id, $name, $icon) {
                return new SocialNetwork($id, $name, $icon);
            }
        

}