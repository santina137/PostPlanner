<?php

class LoginController{

    private $model;
    private $tableau;

public function __construct()
{
    $this->model=new Model();
}


function manage(){

   if (isset($_POST['submit']))
   {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $tab=$this->model->findUser($email);

    if ($tab[0]['user_password']=== $password)
    {
        echo 'Connexion effectuée';
        $_SESSION['email']=$email;
        header('Location: index.php');
    }

   }

    
    include(__DIR__."./../view/login.php");



}
}