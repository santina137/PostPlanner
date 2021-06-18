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


        public function addNewPost($text,$image,$video,$datetime,$spellingValidation,$posting,$archiving,$idUser){

            try{
                $request= $this->handle->prepare('INSERT INTO `post` (`post_text`, `post_image` , `post_video` , `post_datetime` , `post_spelling_validation` ,`post_posting`, `post_archiving`, `id_user`)
                                                VALUES (?,?,?,?,?,?,?,?)');  
                                     
                 $request->execute(array($text,$image,$video,$datetime,$spellingValidation,$posting,$archiving,$idUser));
                }catch(PDOException $e){
                    var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
                }
            
        }


        public function updateSpellingValidationPost($id,$spellingValidation)
        {
            try
            {
            $request = $this->handle->prepare('
            UPDATE `post`
             SET
            `post_spelling_validation` = :post_spelling_validation
             WHERE `post_id` = :post_id ');
            $request->execute([
            ':post_id' => $id,
            ':post_spelling_validation' => $spellingValidation
            ]);
            }
            catch(PDOException $e)
            {
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


        public function findHashtagByPost($idPost){
            try
            {
            $request=$this->handle->prepare('SELECT `hashtag_id`,`hashtag_name` FROM `hashtag`
                                             INNER JOIN `hashtag_post` ON `hashtag`.`hashtag_id`=`hashtag_post`.`hashtag_post_id_hashtag`
                                             INNER JOIN `post` ON `hashtag_post`.`hashtag_post_id_post`=`post`.`post_id`
                                             WHERE `post_id`='. $idPost);
                     
             $request->execute([$idPost]);
             $data = $request->fetchAll(PDO::FETCH_FUNC, 'Hashtag::create');
             return $data;
            
        }
            catch(PDOException $e)
            {
                var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
            }
        }
    

        public function findSocialNetworkByPost($idPost){
            try
            {
            $request=$this->handle->prepare('SELECT `social_network_id`,`social_network_name`,`social_network_icon`
                                             FROM `social_network` INNER JOIN `network_post` ON `social_network`.`social_network_id`=`network_post`.`network_post_id_social_network`
                                             INNER JOIN `post` ON `network_post`.`network_post_id_post`=`post`.`post_id` WHERE `post_id`='.$idPost);
                     
             $request->execute([$idPost]);
             $data = $request->fetchAll(PDO::FETCH_FUNC, 'SocialNetwork::create');
             return $data;
            
        }
            catch(PDOException $e)
            {
                var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
            }
        }
            
    



        

    


}