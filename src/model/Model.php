<?php 

class Model{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }


    /*********************** requête vers la table post ***************************/
    public function getAllPosts(){

        try
        {
            $request=$this->handle->prepare('SELECT * FROM `post`');
            $request->execute();
        
            return $request->fetchAll();
            
        }
        catch(PDOException $e){
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
            
        }


        public function addNewPost($text,$image,$video,$datetime,$spellingValidation,$archiving,$idUser){

            try{
                $request= $this->handle->prepare('INSERT INTO `post` (`post_text`, `post_image` , `post_video` , `post_datetime` , `post_spelling_validation` , post_archiving)
                                                VALUES (?,?,?,?,?,?)');
                 $request->execute(array($text,$image,$video,$datetime,$spellingValidation,$archiving));
                }catch(PDOException $e){
                    var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
                }
            
        }




        /*********************** requête vers la table user ***************************/
    public function findUser($email){

        try
        {
        $request=$this->handle->prepare('SELECT * FROM `user` WHERE user_email =:user_email');
        $request->execute([ ':user_email' => $email ]);
        $data=$request->fetchAll();
        return $data;
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
        ':user_email'=> $email,
        ':user_password' => $password,
        ':user_lastname' => $lastname,
        ':user_firstname' => $firstname,
        ':user_status' => $status
         ]);
         }
    catch(PDOException $e){
        var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }

    }














/*********************** requête vers la table social network ***************************/
    public function getAllSocialNetworks(){
        try
        {
            $request=$this->handle->prepare('SELECT * FROM `social_network`');
            $request->execute();
        
            return $request->fetchAll();
            
        }
        catch(PDOException $e){
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
            
        }

    public function addSocialNetwork($name,$icon){

        try{
            $request= $this->handle->prepare('INSERT INTO `social_network` (`social_network_name`, `social_network_icon`)
                                            VALUES (:social_network_name, :social_network_icon)');
             $request->execute([':social_network_name'=>$name,':social_network_icon'=>$icon]);
            }catch(PDOException $e){
                var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
            }
        
    }


    public function deleteSocialNetwork($id)
    {
        try{
        $request = $this->handle->prepare('DELETE FROM `social_network` WHERE `social_network_id` = :social_network_id');
        $request->execute([ ':social_network_id' => $id ]);
        }
        catch(PDOException $e){
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }

    
    }


    public function updateSocialNetwork($name,$icon,$id)
    {
        try{
        $request = $this->handle->prepare('
        UPDATE `social_network`
        SET
            `social_network_name` = :social_network_name,
            `social_network_icon` = :social_network_icon
        WHERE `social_network_id` = :social_network_id ');
    $request->execute([
        ':social_network_id' => $id,
        ':social_network_name' => $name,
        ':social_network_icon' => $icon,
        ]);
         }
    catch(PDOException $e){
        var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }

    }

/*********************** requête vers la table hashtag ***************************/

    public function getAllHashtags()
    {
        try
        {
        $request=$this->handle->prepare('SELECT * FROM `hashtag`');
        $request->execute();
    
        return $request->fetchAll();
        
         }
        catch(PDOException $e){
        var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
        
    }

    public function addHashtag($name){

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
}





    

