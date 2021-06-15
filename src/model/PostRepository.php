<?php

require 'src/model/Post.php';

class PostRepository{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }


    public function getAllPosts(){

        try
        {
            $request=$this->handle->prepare('SELECT * FROM `post`');
            $request->execute();
        
            return $request->fetchAll(PDO::FETCH_FUNC, 'Post::create');
            
        }
        catch(PDOException $e){
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
            
        }


        public function addNewPost($text,$image,$video,$datetime,$spellingValidation,$archiving,$idUser){

            try{
                $request= $this->handle->prepare('INSERT INTO `post` (`post_text`, `post_image` , `post_video` , `post_datetime` , `post_spelling_validation` , `post_archiving`, `id_user`)
                                                VALUES (?,?,?,?,?,?,?)');  
                                     
                 $request->execute(array($text,$image,$video,$datetime,$spellingValidation,$archiving,$idUser));
                }catch(PDOException $e){
                    var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
                }
            
        }



        public function findPostById($id){

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


       
        public function lastInsertId(){
            $request = $this->handle->query('SELECT LAST_INSERT_ID()');
            $data=$request->fetchAll();
            return $data[0][0];
        }


        public function getPosts(){

            try
            {
                $request=$this->handle->prepare('SELECT * FROM `post`');
                $request->execute();
            
                return $request->fetchAll(PDO::FETCH_FUNC, 'Post::create');
                
            }
            catch(PDOException $e){
                var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
            }
                
            }
    



        

    


}