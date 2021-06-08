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
                                            VALUES (?,?)');
             $request->execute(array($name,$icon));
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
}

    

