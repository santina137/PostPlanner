<?php 

class Model{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }

    public function getAllPosts(){

        try{
            $request=$this->handle->prepare('SELECT * FROM `post`');
            $request->execute();
        
            return $request->fetchAll();
            
        }
        catch(PDOException $e){
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
            
        }


    public function findUser($email){

        $request=$this->handle->prepare('SELECT * FROM `user` WHERE user_email =:user_email');
        $request->execute([ ':user_email' => $email ]);
        $data=$request->fetchAll();
        return $data;
    }
    



}