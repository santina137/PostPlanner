<?php

require 'src/model/User.php';

class UserRepository{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }


    public function findUserByEmail($email){

        try
        {
        $request=$this->handle->prepare('SELECT * FROM `user` WHERE user_email =:user_email');
        $request->execute([ ':user_email' => $email ]);
        $data=$request->fetchAll(PDO::FETCH_FUNC, 'User::create');
        return $data;
        }
        catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    }
    
    public function findUserById($id){

        try
        {
        $request=$this->handle->prepare('SELECT * FROM `user` WHERE user_id =:user_id');
        $request->execute([ ':user_id' => $id ]);
        $data=$request->fetchAll(PDO::FETCH_FUNC, 'User::create');
        return $data[0];
        }
        catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    }



    public function addNewUser($email,$password,$lastname,$firstname,$status){

        try{
            $request= $this->handle->prepare('INSERT INTO `user` (`user_email`, `user_password` , `user_lastname` , `user_firstname` , `user_status`)
                                            VALUES (:user_email, :user_password, :user_lastname, :user_firstname, :user_status)');
             $request->execute([':user_email'=>$email,':user_password'=>$password, ':user_lastname'=>$lastname, ':user_firstname'=>$firstname, ':user_status'=>$status ]);
            }catch(PDOException $e){
                var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
            }
        
    }


    public function updateUser($email,$password,$lastname,$firstname,$status,$id)
    {
        try{
        $request = $this->handle->prepare('
        UPDATE `user`
        SET
            `user_email` = :user_email,
            `user_password` = :user_password,
            `user_lastname` = :user_lastname,
            `user_firstname` = :user_firstname,
            `user_status` = :user_status
        WHERE `user_id` = :user_id ');
    $request->execute([
        ':user_id' => $id,
        ':user_email' => $email,
        ':user_password' => $password,
        ':user_lastname' => $lastname,
        ':user_firstname' => $firstname,
        ':user_status'=> $status
        ]);
       }
    catch(PDOException $e){
        var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }

    }

   







}