<?php

require 'src/model/User.php';

class UserRepository{

    private $handle;

    public function __construct()
    {
        $db=DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }
    

    public function getAllUsers()
    {
    $request=$this->handle->query('SELECT * FROM `user`');
    return $request->fetchAll(PDO::FETCH_FUNC, 'User::create');
    }
   
    
    public function findUser($email)
    {

        try{
            $request= $this->handle->prepare('SELECT user_email FROM `user` WHERE `user_email` = :user_email');
            $request->execute(array(`user_email`=>$email));
            return $request->fetch();
            }
            catch(PDOException $e)
            {
                var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
            }
        
        }



    }

