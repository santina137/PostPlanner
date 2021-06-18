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

$userTab=$this->user;
$connectedUser=$userTab[0];


    if ($connectedUser->getStatus()==1){
        $this->status="Administrateur";

    }
    if ($connectedUser->getStatus()==2){
       $this->status="Lecteur";
    }

if (isset($_POST['email'])){
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $this->userRepository->updateUser($_POST['email'],$hashedPassword,$_POST['lastname'],$_POST['firstname'],$connectedUser->getStatus(),$_POST['id']);
    header("Refresh:0");
}



 include(__DIR__."./../view/account.php");


}
}