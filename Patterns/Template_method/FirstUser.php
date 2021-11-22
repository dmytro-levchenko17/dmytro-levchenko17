<?php

declare(strict_types=1);

class FirstUser extends UserInfo
{
    function AddSecondName() 
    {
        echo 'Write user second name<br>';
    }
    
    function AddUserPhoto()
    {    
        echo 'Upload user photo<br>';
    }
}