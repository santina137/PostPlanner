<?php

class CreateAccountController{

   private $userRepository;
    

    public function __construct()
    {
    
    $this->userRepository=new UserRepository();
    }


    function manage()
    {

        

        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['status']))
        {

            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->userRepository->addNewUser($_POST['email'],$hashedPassword,$_POST['lastname'],$_POST['firstname'],$_POST['status']);
            
        }


    include(__DIR__."./../view/createAccount.php");


    }
}
