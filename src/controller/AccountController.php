<?php

class AccountController{

private $title;

public function __construct()
{
    $this->title="Mon compte";
}


function manage(){

    include(__DIR__."./../view/account.php");


}
}