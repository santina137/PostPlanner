<?php

class CreateAccountController{

   private $UserRepository;
    

    public function __construct()
    {
    
    $this->UserRepository=new UserRepository();
    }


    function manage()
    {

        

        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['status']))
        {

            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->UserRepository->add($_POST['email'],$hashedPassword,$_POST['lastname'],$_POST['firstname'],$_POST['status']);
            
        }


    include(__DIR__."./../view/createAccount.php");


    }
}
