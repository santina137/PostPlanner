<?php

class LogoutController{



    public function manage(){
    
    session_destroy();
    


    include(__DIR__."./../view/login.php");

    }



}