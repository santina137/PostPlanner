<?php

require 'src/model/HashtagPost.php';

class HashtagPostRepository{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }


    public function addHashtagPost($idPost, $idHashtag){

        try
        {
        $request= $this->handle->prepare('INSERT INTO `hashtag_post` (`hashtag_post_id_post`, `hashtag_post_id_hashtag`)
                                        VALUES (:hashtag_post_id_post , :hashtag_post_id_hashtag)');
         $request->execute([':hashtag_post_id_post'=>$idPost,
                            ':hashtag_post_id_hashtag'=>$idHashtag]);
        }catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    
    }

    public function findHashtagByIdPost($idPost){

        try
        {
        $request=$this->handle->prepare('SELECT * FROM `hashtag_post` WHERE hashtag_post_id_post =:hashtag_post_id_post');
        $request->execute([ ':hashtag_post_id_post' => $idPost ]);
        $data=$request->fetchAll(PDO::FETCH_FUNC, 'HashtagPost::create');
        
        return $data;
        
        }
        catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    }

}