<?php

class AccountController{

        private $user;
        private $status;
        private $userRepository;
    
        
        public function __construct()
        {
       
        $this->userRepository=new UserRepository();
        }


        function manage()
        {

        $this->user=$this->userRepository->findUserByEmail($_SESSION['email']);


        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['status']))
        {
        $this->userRepository->update($_POST['email'],$_POST['password'],$_POST['lastname'],$_POST['firstname'],$_POST['status'],$_POST['id']);
        header("Refresh:0");
        }



        $userTab=$this->user;
        $connectedUser=$userTab[0];
       
      
            if ($connectedUser->getStatus()==1){
                $this->status="administrateur";
                
            }
            if ($connectedUser->getStatus()==2){
               $this->status="lecteur";
            }
        

         include(__DIR__."./../view/account.php");


    }
}