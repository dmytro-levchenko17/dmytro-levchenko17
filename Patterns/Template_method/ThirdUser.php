<?php

declare(strict_types=1);

class ThirdUser extends FirstUser
{
    function AddFirstName()
    {
        echo 'Write user first name<br>';
    }

    function AddSecondName() 
    {
        echo 'Write user first name instead of second name<br>';
    }

    function AddUserPhoto()
    {    
        echo 'Not upload user photo<br>';
    }

    function AddNetworkLinks() {
        echo 'Add facebook link<br>';
    }
}