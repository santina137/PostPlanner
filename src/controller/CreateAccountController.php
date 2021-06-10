<?php

class CreateAccountController{

   
    

    public function __construct()
    {
    
    $this->model=new Model();
    }


    function manage()
    {

        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['status']))
        {
            $this->model->addNewUser($_POST['email'],$_POST['password'],$_POST['lastname'],$_POST['firstname'],$_POST['status']);
            
        }


    include(__DIR__."./../view/createAccount.php");


    }
}
