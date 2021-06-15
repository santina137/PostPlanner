<?php



class NetworkPostRepository{

    public $handle;

    public function __construct()
    {
        $db= DbAccess::getInstance();
        $this->handle = $db->getHandle();
    }


    public function addNetworkPost($idPost, $idSocialNetwork){

        try
        {
        $request= $this->handle->prepare('INSERT INTO `network_post` (`network_post_id_post`, `network_post_id_social_network`)
                                        VALUES (:network_post_id_post , :network_post_id_social_network)');
         $request->execute([':network_post_id_post'=>$idPost,
                            ':network_post_id_social_network'=>$idSocialNetwork]);
        }catch(PDOException $e)
        {
            var_dump('Erreur lors de la requête sql:'.$e ->getMessage());
        }
    
    }


}