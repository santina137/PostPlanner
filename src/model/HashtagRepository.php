<?php

require 'src/model/Hashtag.php';

class HashtagRepository{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }


    public function getAllHashtags()
    {
        try
        {
        $request=$this->handle->prepare('SELECT * FROM `hashtag`');
        $request->execute();
    
        return $request->fetchAll(PDO::FETCH_FUNC, 'Hashtag::create');
        
         }
        catch(PDOException $e){
        var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
        
    }

    public function addNewHashtag($name){

        try
        {
        $request= $this->handle->prepare('INSERT INTO `hashtag` (`hashtag_name`)
                                        VALUES (:hashtag_name)');
         $request->execute([':hashtag_name'=>$name]);
        }catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    
    }


    public function deleteHashtag($id)
    {
        try
        {
        $request = $this->handle->prepare('DELETE FROM `hashtag` WHERE `hashtag_id` = :hashtag_id');
         $request->execute([ ':hashtag_id' => $id ]);
        }
        catch(PDOException $e)
        {
        var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }


    }


    public function updateHashtag($name,$id)
    {
        try
        {
        $request = $this->handle->prepare('
        UPDATE `hashtag`
         SET
        `hashtag_name` = :hashtag_name
         WHERE `hashtag_id` = :hashtag_id ');
        $request->execute([
        ':hashtag_id' => $id,
        ':hashtag_name' => $name
        ]);
        }
        catch(PDOException $e)
        {
        var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }

    }


    public function findHashtagById($id){

        try
        {
        $request=$this->handle->prepare('SELECT * FROM `post` WHERE post_id =:post_id');
        $request->execute([ ':post_id' => $id ]);
        $data=$request->fetchAll(PDO::FETCH_FUNC, 'Post::create');
        return $data[0];
        }
        catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    }

    

    }









