<?php

class AccountController{

        private $user;
        private $status;
        
        public function __construct()
        {
        $this->title="Mon compte";
        $this->model=new Model();
        }


        function manage()
        {

        $this->user=$this->model->findUser($_SESSION['email']);

 

        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['status']))
        {
        $this->model->updateUser($_POST['email'],$_POST['password'],$_POST['lastname'],$_POST['firstname'],$_POST['status'],$_POST['id']);
        header("Refresh:0");
        }



        $userTab=$this->user;
        $connectedUser=$userTab[0];
       
      
            if ($connectedUser['user_status']==1){
                $this->status="administrateur";
                
            }
            if ($connectedUser['user_status']==2){
               $this->status="lecteur";
            }
        

         include(__DIR__."./../view/account.php");


    }
}