<?php

declare(strict_types=1);

class SecondUser extends UserInfo
{
    function AddFirstName()
    {
        echo 'Write user first name<br>';
    }

    function AddSecondName() 
    {
        echo 'Write user patronymic instead of second name<br>';
    }

    function AddUserPhoto()
    {    
        echo 'Upload user photo<br>';
    }
}