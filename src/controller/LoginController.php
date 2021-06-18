<?php

class LoginController{

    private $userRepository;

public function __construct()
{
    $this->userRepository=new UserRepository;
}


function manage(){

   if (isset($_POST['submit']))
   {
    $email=$_POST['email'];
    $pass=$_POST['password'];


    $tab=$this->userRepository->findUserByEmail($email);

    
if  (password_verify($pass, $tab[0]->getPassword()))
    {
        echo 'Connexion effectuée';
        $_SESSION['email']=$email;
        
        $_SESSION['id']=$tab[0]->getId();
        
        header('Location: index.php');
    }

   }

    
    include(__DIR__."./../view/login.php");



}
}