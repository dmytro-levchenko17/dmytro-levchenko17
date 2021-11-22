<?php

declare(strict_types=1);

abstract class UserInfo
{
    function AddFirstName()
    {
        echo 'Write user first name<br>';
    }
    
    function AddSecondName() 
    {
        echo 'Write user second name<br>';
    }

    function AddNetworkLinks() {
    }

    abstract function AddUserPhoto();
    
    function AddUserData()
    {
        $this->AddFirstName();
        $this->AddSecondName();
        $this->AddNetworkLinks();
        $this->AddUserPhoto();
    }
}