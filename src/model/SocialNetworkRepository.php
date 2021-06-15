<?php

require 'src/model/SocialNetwork.php';

class SocialNetworkRepository{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }


    public function getAll(){
        try
        {
            $request=$this->handle->prepare('SELECT * FROM `social_network`');
            $request->execute();
        
            return $request->fetchAll(PDO::FETCH_FUNC, 'SocialNetwork::create');
            
        }
        catch(PDOException $e){
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
            
        }

    public function add($name,$icon){

        try{
            $request= $this->handle->prepare('INSERT INTO `social_network` (`social_network_name`, `social_network_icon`)
                                            VALUES (:social_network_name, :social_network_icon)');
             $request->execute([':social_network_name'=>$name,':social_network_icon'=>$icon]);
            }catch(PDOException $e){
                var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
            }
        
    }


    public function delete($id)
    {
        try{
        $request = $this->handle->prepare('DELETE FROM `social_network` WHERE `social_network_id` = :social_network_id');
        $request->execute([ ':social_network_id' => $id ]);
        }
        catch(PDOException $e){
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }

    
    }


    public function update($name,$icon,$id)
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


    
    public function findSocialNetworkById($id){

        try
        {
        $request=$this->handle->prepare('SELECT * FROM `social_network` WHERE social_network_id =:social_network_id');
        $request->execute([ ':social_network_id' => $id ]);
        $data=$request->fetchAll(PDO::FETCH_FUNC, 'SocialNetwork::create');
        return $data[0];
        }
        catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    }

  
}